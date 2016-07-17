<?php
/**
 * @class TreeModel
 * @namespace models
 */

namespace models\tree;

use app\App;
use PDO;

class Tree extends BaseTreeElement
{
    /**
     * @var array
     */
    public $errorRecords =[];

    /**
     * @return string
     */
    public static function tableName()
    {
        return 'tree';
    }

    /**
     * @param BaseTreeElement $parent
     *
     * @return bool
     */
    public function setParentModel(BaseTreeElement $parent)
    {
        return false;
    }

    /**
     * For purposes of storage trees in DB it's better use "Nested sets", but, unfortunately, the task specify
     * just simple DB structure and there is no mention if I can change DB structure as I wish, so this is
     * "dumb"-version of tree storage.
     *
     * @return Tree
     */
    public function getTree()
    {
        $this->errorRecords = [];

        $tableName = self::tableName();

        $sql = "SELECT id, name, parent FROM $tableName ORDER BY parent, id";

        $connection = App::instance()->getDB();
        $stmnt = $connection->prepare($sql);
        $stmnt->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, '\models\tree\TreeElement', []);
        $stmnt->execute();

        $dbResult = $stmnt->fetchAll();

        foreach ($dbResult as $element) {
            if (!$this->appendElement($element)) {
                $this->errorRecords[] = $element;
            }
        }

        return $this;
    }
}

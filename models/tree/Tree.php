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
     * For purposes of storage trees in DB it's better to use "Nested sets". Here will be get all tree, so DB request
     * does not need nested sets related fields.
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

    public function getRootElementsWithDescenders($minDescendersQuantity)
    {
        $tableName = self::tableName();
        $diff = 2 * $minDescendersQuantity + 1;

        $sql = "SELECT id, name, parent FROM $tableName
                WHERE parent IS NULL AND (right_key - left_key) > :diff ORDER BY id";

        $connection = App::instance()->getDB();
        $stmnt = $connection->prepare($sql);
        $stmnt->bindValue(':diff', $diff);
        $stmnt->setFetchMode(PDO::FETCH_ASSOC);
        $stmnt->execute();

        $dbResult = $stmnt->fetchAll();

        return $dbResult;
    }

    public function getElementsWithoutDescenders($ancestorsQuantity)
    {
        $tableName = self::tableName();
        $level = $ancestorsQuantity + 1;

        $sql = "SELECT id, name, parent FROM $tableName
                WHERE level = :level AND (right_key - left_key) = 1 ORDER BY id";

        $connection = App::instance()->getDB();
        $stmnt = $connection->prepare($sql);
        $stmnt->bindValue(':level', $level);
        $stmnt->setFetchMode(PDO::FETCH_ASSOC);
        $stmnt->execute();

        $dbResult = $stmnt->fetchAll();

        return $dbResult;
    }
}

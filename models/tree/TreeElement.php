<?php
/**
 * @class TreeElement
 * @namespace models
 */

namespace models\tree;

class TreeElement extends BaseTreeElement
{
    /** @var  integer */
    protected $_id = null;
    /** @var  string */
    protected $_name;
    /** @var integer  */
    protected $_parentId;

    /**
     * @param array $configuration
     *
     * @throws \Exception
     */
    public function __construct(array $configuration = [])
    {
        if (!empty($configuration) &&
            (
                !isset($configuration['id']) ||
                !is_int($configuration['id']) ||
                !isset($configuration['name']) ||
                !is_string($configuration['name']) ||
                !isset($configuration['parent']) ||
                !is_int($configuration['parent'])
            )
        ) {
            throw new \Exception('Tree element wrong configuration!');
        } else {
            $this->_id = (int)$configuration['id'];
            $this->_name = $configuration['name'];
            $this->_parentId = (int)$configuration['parentId'];
        }
    }

    /**
     * @return int
     */
    public function getId()
    {
        return $this->_id;
    }

    /**
     * @param int $id
     *
     * @return int
     */
    public function setId($id)
    {
        return $this->_id = (int)$id;
    }

    /**
     * @return int
     */
    public function getName()
    {
        return $this->_name;
    }

    /**
     * @param string $name
     *
     * @return string
     */
    public function setName($name)
    {
        return $this->_name = $name;
    }

    /**
     * @return int
     */
    public function getParent()
    {
        return $this->_parentId;
    }

    /**
     * @param integer $id
     *
     * @return int
     */
    public function setParent($id)
    {
        return $this->_parentId =(int)$id;
    }

    /**
     * @param BaseTreeElement $parent
     *
     * @return bool
     */
    public function setParentModel(BaseTreeElement $parent)
    {
        if ($this->_parentId != $parent->getId()) {
            return false;
        }

        $this->_parent = $parent;
        $this->_level = $parent->getLevel() + 1;

        return true;
    }
}

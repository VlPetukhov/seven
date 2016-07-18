<?php
/**
 * @class BaseTreeElement
 * @namespace models\tree
 */

namespace models\tree;

abstract class BaseTreeElement
{
    /** @var array  */
    protected $_children = [];
    /** @var array  */
    protected $_descendantsIds = [];
    /** @var  integer */
    protected $_level = 0;
    /** @var BaseTreeElement|null  */
    protected $_parent = null;

    /**
     * Getter
     * @param $varName
     *
     * @throws \Exception
     */
    public function __get($varName)
    {
        if (is_string($varName)) {
            $methodName = 'get' . ucfirst($varName);

            if (method_exists( $this, $methodName )) {
                return $this->$methodName();
            }
        }

        throw new \Exception("Error! Property $varName not found.");
    }

    /**
     * Setter
     * @param $varName
     * @param $value
     * @throws \Exception
     */
    public function __set($varName, $value)
    {
        if (is_string($varName)) {
            $methodName = 'set' . ucfirst($varName);

            if (method_exists($this, $methodName)) {
                return $this->$methodName($value);
            }
        }

        throw new \Exception("Error! Property $varName not found.");
    }

    /**
     * @return null
     */
    public function getId()
    {
        return null;
    }

    /**
     * @return int
     */
    public function getLevel()
    {
        return $this->_level;
    }

    /**
     * @param BaseTreeElement $parent
     *
     * @return bool
     */
    abstract public function setParentModel(BaseTreeElement $parent);

    /**
     * @return BaseTreeElement|null
     */
    public function getParent()
    {
        return $this->_parent;
    }

    /**
     * @param TreeElement $element
     *
     * @return bool
     */
    public function appendElement(TreeElement $element)
    {
        //if this is an element parent append element to it
        if ($this->getId() == $element->getParent()) {
            $this->_children[$element->getID()] = $element;
            $this->appendDescenderId($element->_id);

            return $element->setParentModel($this);
        }

        //if element's parent id is not in this descenders so this is the lost element
        if (!in_array($element->getParent(), $this->_descendantsIds)) {

            return false;
        }

        //search parent branch
        /** @var TreeElement $child */
        foreach ($this->_children as $child) {
            if ($element->getParent() == $child->getId() ||
                in_array($element->getParent(), $child->getDescendantsIds())
            ) {

                return $child->appendElement($element);
            }
        }

        return false;
    }

    /**
     * @param $id
     */
    protected function appendDescenderId($id)
    {
        $this->_descendantsIds[] = $id;

        if ($this->_parent) {
            $this->_parent->appendDescenderId($id);
        }
    }

    /**
     * @return array
     */
    public function getDescendantsIds()
    {
        return $this->_descendantsIds;
    }

    /**
     * @return array
     */
    public function getChildrenIds()
    {
        return array_keys($this->_children);
    }

    public function toArray()
    {
        $result = [];

        /** @var BaseTreeElement $child */
        foreach ($this->_children as $child) {
            $result[] = [
                'name' => $child->name,
                'children' => $child->toArray(),
            ];
        }

        return $result;
    }
} 
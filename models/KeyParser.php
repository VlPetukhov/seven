<?php
/**
 * @class KeyParser
 * @namespace models
 */

namespace models;

class KeyParser extends BaseParser
{
    protected $_keysData = [];

    /**
     * @return array
     */
    public function getKeys()
    {
        return [
            'raz',
            'dva',
            'tri',
        ];
    }

    /**
     * Parser
     */
    protected function parse()
    {
        $this->_keysData = [];

        $keysStr = implode('|', $this->getKeys());

        //tags description parser
        preg_match_all("/(?P<key>($keysStr):)(?P<text>.*)(?=($keysStr):|$)/imU", $this->_text, $matches);

        if (!empty($matches['key'])) {
            foreach (array_combine($matches['key'], $matches['text']) as $key => $value) {
                $this->_keysData[$key] = $value;
            }
        }
    }

    /**
     * @return array
     */
    public function getData()
    {
        return $this->_keysData;
    }
}

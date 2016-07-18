<?php
/**
 * @class TagParser
 * @namespace models
 */

namespace models;

class TagParser extends BaseParser
{
    protected $_tagsDatum = [];
    protected $_tagsDescriptions = [];

    /**
     * Parser
     */
    protected function parse()
    {
        $this->_tagsDatum = [];
        $this->_tagsDescriptions = [];

        //tags description parser
        preg_match_all('/\[(?P<tag>[^\]:]+)(:(?P<desc>[^\]]+))?\](?P<data>[^\[]*)\[\/(?P>tag)\]/im', $this->_text, $matches);

        if (!empty($matches['tag'])) {
            $this->_tagsDatum = array_combine($matches['tag'], $matches['data']);
            $this->_tagsDescriptions = array_combine($matches['tag'], $matches['desc']);
        }
    }

    /**
     * @return array
     */
    public function getDatum()
    {
        if ($this->_tagsDatum) {
            return $this->_tagsDatum;
        }

        return [];
    }

    /**
     * @return array
     */
    public function getDescriptions()
    {
        if ($this->_tagsDescriptions) {
            return $this->_tagsDescriptions;
        }

        return [];
    }
}

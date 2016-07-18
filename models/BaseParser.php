<?php
/**
 * @class BaseParser
 * @namespace models
 */

namespace models;

abstract class BaseParser
{
    protected $_text;

    /**
     * @param string|null $text
     */
    public function __construct($text = null)
    {
        if ($text) {
            $this->load($text);
        }
    }

    /**
     * @param string $text
     */
    public function load($text)
    {
        $this->_text = $text;
        $this->parse();
    }

    /**
     * Parser implementation
     * @return void
     */
    abstract protected function parse();
} 
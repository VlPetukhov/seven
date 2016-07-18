<?php
/**
 * @class ComboProcessor
 * @namespace models
 */

namespace models;

class ComboProcessor
{
    protected $array = [
        ['а1', 'а2', 'а3'],
        ['b1', 'b2'],
        ['c1', 'c2', 'c3'],
        ['d1'],
    ];

    /**
     * @param array $input
     */
    public function __construct($input = [])
    {
        if (!empty($input)) {
            $this->array = $input;
        }
    }

    /**
     * @return array
     */
    public function getResult()
    {
        return [];
    }
}

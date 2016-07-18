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
        return $this->combineWithArray($this->array);
    }

    /**
     * @param array $arr
     * @return array
     */
    protected function combineWithArray( array $arr)
    {
        $result = [];

        $line = array_shift($arr);

        if (count($arr) === 1) {

            $lineArray = array_shift($arr);

            foreach ($line as $element) {
                foreach ($lineArray as $secondElement) {
                    $result[] = [$element, $secondElement];
                }
            }

            return $result;
        }

        foreach ($line as $element) {
            foreach ($this->combineWithArray($arr) as $lineArray) {
                array_unshift($lineArray, $element);
                $result[] = $lineArray;
            }
        }

        return $result;
    }
}

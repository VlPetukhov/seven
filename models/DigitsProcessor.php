<?php
/**
 * @class DigitsProcessor
 * @namespace models
 */

namespace models;

class DigitsProcessor
{
    const MIN_RANGE_VALUE = 100000;
    const MAX_RANGE_VALUE = 1500000;
    const NUMBER_QTY = 1000000;
    /** @var \SplFixedArray  */
    protected $array;

    public function __construct()
    {
        $this->array = new \SplFixedArray(self::NUMBER_QTY);
        $this->fillArray();
    }

    protected function fillArray()
    {
        $qty = $this->array->count();

        for ($i=0; $i < $qty; $i++) {
            $this->array[$i] = mt_rand(self::MIN_RANGE_VALUE, self::MAX_RANGE_VALUE);
        }
    }

    /**
     * @return \StdClass
     */
    public function getRepeatableValues()
    {
        $auxArray = [];
        $result = new \StdClass();

        $startTime = microtime(true);

        foreach ($this->array as $value) {
            if (isset($auxArray[$value]) && $auxArray[$value] > 0) {
                $auxArray[$value]++;
                continue;
            }

            $auxArray[$value] = 1;
        }

        $resultArray = [];

        foreach ($auxArray as $key=>$value) {
            if ($value < 2) {
                continue;
            }
            $resultArray[] = $key;
        }

        $executionTime = microtime(true) - $startTime;

        $result->originalSize = $this->array->count();
        $result->executionTime = $executionTime;
        $result->repeatedCnt = count($resultArray);
        $result->resultArray = $resultArray;

        return $result;
    }
}

<?php

namespace Tests\Logic;

use Logic\CountPairsSumEqualsZero;

class CountPairsSumEqualsZeroTest extends \PHPUnit_Framework_TestCase
{
    public function testCaseFromRecruitmentTask()
    {
        $countPairsSumEqualsZero = new CountPairsSumEqualsZero();
        $input      = array(3, 6, -3, 5, -10, 3, 10, 1, 7, -1, -9, -8, 7, 7, -7, -2, -7);
        $result     = $countPairsSumEqualsZero->count($input);

        static::assertEquals(5, $result);
    }

    public function testSinglePair()
    {

        $countPairsSumEqualsZero = new CountPairsSumEqualsZero();
        $input      = array(1, -1);
        $result     = $countPairsSumEqualsZero->count($input);

        static::assertEquals(1, $result);
    }

    public function testNoPairs()
    {

        $countPairsSumEqualsZero = new CountPairsSumEqualsZero();
        $input      = array(1, 2);
        $result     = $countPairsSumEqualsZero->count($input);

        static::assertEquals(0, $result);
    }

    public function testEmptyNumbersArray()
    {

        $countPairsSumEqualsZero = new CountPairsSumEqualsZero();
        $input      = array();
        $result     = $countPairsSumEqualsZero->count($input);

        static::assertEquals(0, $result);
    }
}

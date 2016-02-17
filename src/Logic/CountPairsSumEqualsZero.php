<?php

namespace Logic;

class CountPairsSumEqualsZero
{
    private $numbers = [];

    public function count(array $numbers): int
    {
        $this->numbers = $numbers;

        return $this->executeCountAlgorithm();
    }

    /**
     * @return int
     */
    private function executeCountAlgorithm(): int
    {
        $pairsCount = 0;

        while ($number = array_pop($this->numbers)) {
            if ($this->isOppositeNumberFound($number)) {
                $pairsCount++;
                $this->removeOppositeNumber($number);
            }
        }

        return $pairsCount;
    }

    /**
     * Opposite numbers are -25 and 25, -5 and 5.
     *
     * @param $number
     *
     * @return int|bool
     */
    private function getArrayKeyOfOppositeNumber(int $number)
    {
        return array_search(0 - $number, $this->numbers, true);
    }

    private function removeArrayKeyFromNumbers($arrayKey)
    {
        unset($this->numbers[$arrayKey]);
    }

    private function isOppositeNumberFound(int $number): bool
    {
        $oppositeNumberFound = false;
        $arrayKeyOfOppositeNumber = $this->getArrayKeyOfOppositeNumber($number);
        if (false !== $arrayKeyOfOppositeNumber) {
            $oppositeNumberFound = true;
        }

        return $oppositeNumberFound;
    }

    private function removeOppositeNumber(int $number)
    {
        $arrayKeyOfOppositeNumber = $this->getArrayKeyOfOppositeNumber($number);
        $this->removeArrayKeyFromNumbers($arrayKeyOfOppositeNumber);
    }
}

<?php

namespace DTO\Product;

use Interfaces\Order\OrderElementInterface;

class SpecialOffer implements OrderElementInterface
{
    /**
     * @var MainCourse
     */
    private $mainCourse;

    /**
     * @var int
     */
    private $priceAfterDiscount;

    public function getMainCourse(): MainCourse
    {
        return $this->mainCourse;
    }

    public function setMainCourse(MainCourse $mainCourse)
    {
        $this->mainCourse = $mainCourse;
    }

    public function getPrice()
    {
        return array_sum([
            $this->getMainCourse()->getPrice()
        ]);
    }

    /**
     * @return mixed
     */
    public function getPriceAfterDiscount()
    {
        return $this->priceAfterDiscount;
    }

    /**
     * @param mixed $priceAfterDiscount
     */
    public function setPriceAfterDiscount($priceAfterDiscount)
    {
        $this->priceAfterDiscount = $priceAfterDiscount;
    }
}

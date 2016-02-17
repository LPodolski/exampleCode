<?php

namespace DTO\Product;

use Interfaces\Order\OrderElementInterface;

class Lunch implements OrderElementInterface
{
    /**
     * @var MainCourse
     */
    private $mainCourse;

    /**
     * @var Dessert
     */
    private $dessert;

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

    public function getDessert(): Dessert
    {
        return $this->dessert;
    }

    public function setDessert(Dessert $dessert)
    {
        $this->dessert = $dessert;
    }

    public function getPrice()
    {
        return array_sum([
            $this->getMainCourse()->getPrice(),
            $this->getDessert()->getPrice(),
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

<?php

namespace DTO\Product;

use Interfaces\Order\OrderElementInterface;

class Dessert implements OrderElementInterface
{
    /**
     * @var int
     */
    private $price;

    /**
     * @var int
     */
    private $priceAfterDiscount;

    /**
     * 25.50 is 2500
     * 0.73 is 73
     * to avoid float numbers problems
     *
     * @return int
     */
    public function getPrice(): int
    {
        return $this->price;
    }

    /**
     * 25.50 is 2500
     * 0.73 is 73
     * to avoid float numbers problems
     *
     * @param int $price
     */
    public function setPrice(int $price)
    {
        $this->price = $price;
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

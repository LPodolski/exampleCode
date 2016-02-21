<?php

namespace DTO\Order;

use Interfaces\Order\OrderElementInterface;

class Order implements OrderElementInterface
{
    /**
     * @var OrderElementInterface[]
     */
    private $elements = [];

    /**
     * @var int
     */
    private $price;

    /**
     * @var int
     */
    private $priceAfterDiscount;

    public function addElement(OrderElementInterface $orderElement)
    {
        $this->elements[] = $orderElement;
    }

    /**
     * @return OrderElementInterface[]
     */
    public function getElements(): array
    {
        return $this->elements;
    }

    /**
     * @return int
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * @param int $price
     */
    public function setPrice($price)
    {
        $this->price = $price;
    }

    /**
     * @return int
     */
    public function getPriceAfterDiscount()
    {
        return $this->priceAfterDiscount;
    }

    /**
     * @param int $priceAfterDiscount
     */
    public function setPriceAfterDiscount($priceAfterDiscount)
    {
        $this->priceAfterDiscount = $priceAfterDiscount;
    }
}

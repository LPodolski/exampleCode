<?php

namespace DTO\Order;

use Interfaces\Order\OrderElementInterface;

class Order
{
    private $elements = [];

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
}

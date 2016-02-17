<?php

namespace Logic\Order\Discount;

use DTO\Product\Lunch;
use Interfaces\Order\Discount\LunchDiscountInterface;
use Interfaces\Order\OrderElementInterface;

class LunchDiscount implements LunchDiscountInterface
{
    public function canBeApplied(OrderElementInterface $orderElement)
    {
        return $orderElement instanceof Lunch;
    }

    public function apply(OrderElementInterface $orderElement)
    {
        $price = $orderElement->getPrice();
        $orderElement->setPriceAfterDiscount($price * (1 - $this->getDiscountPercentage()/100));
    }

    private function getDiscountPercentage()
    {
        return 20;
    }
}

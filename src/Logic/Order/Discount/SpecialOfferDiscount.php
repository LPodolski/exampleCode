<?php

namespace Logic\Order\Discount;

use DTO\Product\SpecialOffer;
use Interfaces\Order\Discount\LunchDiscountInterface;
use Interfaces\Order\OrderElementInterface;

class SpecialOfferDiscount implements LunchDiscountInterface
{
    public function canBeApplied(OrderElementInterface $orderElement)
    {
        return $orderElement instanceof SpecialOffer;
    }

    public function apply(OrderElementInterface $orderElement)
    {
        $price = $orderElement->getPrice();
        $orderElement->setPriceAfterDiscount($price * (1 - $this->getDiscountPercentage()/100));
    }

    private function getDiscountPercentage()
    {
        return 5;
    }
}

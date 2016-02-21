<?php

namespace Logic\Order\Discount;

use DTO\Order\Order;
use Interfaces\Order\Discount\LunchDiscountInterface;
use Interfaces\Order\OrderElementInterface;

class OrderAboveSpecifiedAmountDiscount implements LunchDiscountInterface
{
    public function canBeApplied(OrderElementInterface $orderElement)
    {
        return
            $orderElement instanceof Order
            && $this->isOrderAmountEligibleForDiscount($orderElement);
    }

    public function isOrderAmountEligibleForDiscount(Order $order)
    {
        return $order->getPrice() >= 10000;
    }

    public function apply(OrderElementInterface $orderElement)
    {
        $total = $orderElement->getPrice();
        $orderElement->setPriceAfterDiscount($total * (1 - $this->getDiscountPercentage()/100));
    }

    private function getDiscountPercentage()
    {
        return 15;
    }
}

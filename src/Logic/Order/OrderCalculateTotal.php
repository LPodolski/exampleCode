<?php

namespace Logic\Order;

use DTO\Order\Order;

class OrderCalculateTotal
{
    /**
     * @var ApplyDiscount
     */
    private $applyDiscount;

    public function __construct(ApplyDiscount $applyDiscount)
    {
        $this->applyDiscount = $applyDiscount;
    }

    public function getTotalWithDiscounts(Order $order): int
    {
        $this->applyDiscounts($order);

        return $this->getTotal($order);
    }

    public function getTotal(Order $order): int
    {
        $sum = 0;
        foreach ($order->getElements() as $orderElement) {
            $sum += $orderElement->getPriceAfterDiscount();
        }

        return $sum;
    }

    private function applyDiscounts(Order $order)
    {
        $this->applyDiscount->applyDiscountToOrder($order);
    }
}

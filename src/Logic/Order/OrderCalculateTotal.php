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
        $this->setOrderPriceAfterDiscounts($order);

        return $order->getPriceAfterDiscount();
    }

    private function setOrderPriceAfterDiscounts(Order $order)
    {
        $this->setPriceWithoutDiscountsForOrder($order);
        $this->applyDiscountsToOrderElements($order);

        $this->setPriceWithDiscountsForOrder($order);
        $this->applyDiscountsToOrder($order);
    }

    private function setPriceWithoutDiscountsForOrder(Order $order)
    {
        $order->setPrice($this->getTotalWithoutDiscountsOfOrderElements($order));
    }

    private function getTotalWithoutDiscountsOfOrderElements(Order $order)
    {
        $sum = 0;
        foreach ($order->getElements() as $orderElement) {
            $sum += $orderElement->getPrice();
        }

        return $sum;
    }

    private function setPriceWithDiscountsForOrder(Order $order)
    {
        $order->setPriceAfterDiscount($this->getTotalOfOrderElements($order));
    }

    public function getTotalOfOrderElements(Order $order): int
    {
        $sum = 0;
        foreach ($order->getElements() as $orderElement) {
            $sum += $orderElement->getPriceAfterDiscount();
        }

        return $sum;
    }

    private function applyDiscountsToOrderElements(Order $order)
    {
        $this->applyDiscount->applyDiscountToOrderElements($order);
    }

    private function applyDiscountsToOrder(Order $order)
    {
        $this->applyDiscount->applyDiscountToOrder($order);
    }
}

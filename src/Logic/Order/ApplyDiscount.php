<?php

namespace Logic\Order;

use DTO\Order\Order;
use Interfaces\Order\OrderElementInterface;
use Logic\Order\Discount\LunchDiscount;

class ApplyDiscount
{
    private $discounts = [];

    public function __construct(array $discounts)
    {
        $this->discounts = $discounts;
    }

    public function applyDiscountToOrder(Order $order)
    {
        $this->applyDiscountToOrderElement($order);
    }

    /**
     * @param Order $order
     */
    public function applyDiscountToOrderElements(Order $order)
    {
        foreach ($order->getElements() as $orderElement) {
            $this->applyDiscountToOrderElement($orderElement);
        }
    }

    public function applyDiscountToOrderElement(OrderElementInterface $orderElement)
    {
        foreach ($this->getDiscounts() as $discount) {
            if ($discount->canBeApplied($orderElement)) {
                $discount->apply($orderElement);
            }
        }

        if ($this->isPriceAfterDiscountEmpty($orderElement)) {
            $orderElement->setPriceAfterDiscount($orderElement->getPrice());
        }
    }

    /**
     * @param OrderElementInterface $orderElement
     *
     * @return bool
     */
    public function isPriceAfterDiscountEmpty(OrderElementInterface $orderElement)
    {
        return $orderElement->getPriceAfterDiscount() === null;
    }

    /**
     * @return LunchDiscount[]
     */
    public function getDiscounts()
    {
        return $this->discounts;
    }
}

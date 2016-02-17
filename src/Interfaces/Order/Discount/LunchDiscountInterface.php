<?php

namespace Interfaces\Order\Discount;

use Interfaces\Order\OrderElementInterface;

interface LunchDiscountInterface
{
    public function canBeApplied(OrderElementInterface $orderElement);

    public function apply(OrderElementInterface $orderElement);
}

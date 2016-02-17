<?php

namespace Factory;

use Logic\Order\OrderCalculateTotal;

class OrderCalculateTotalFactory
{
    public function make()
    {
        $applyDiscountFactory = new ApplyDiscountFactory;
        $applyDiscount = $applyDiscountFactory->make();

        return new OrderCalculateTotal($applyDiscount);
    }
}

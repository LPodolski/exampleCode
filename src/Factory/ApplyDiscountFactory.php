<?php

namespace Factory;

use Logic\Order\ApplyDiscount;
use Logic\Order\Discount\LunchDiscount;

class ApplyDiscountFactory
{
    public function make()
    {
        $discounts = [];
        $discounts[] = new LunchDiscount();

        return new ApplyDiscount($discounts);
    }
}

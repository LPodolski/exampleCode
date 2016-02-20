<?php

namespace Factory;

use Logic\Order\ApplyDiscount;
use Logic\Order\Discount\LunchDiscount;
use Logic\Order\Discount\SpecialOfferDiscount;

class ApplyDiscountFactory
{
    public function make()
    {
        $discounts = [];
        $discounts[] = new LunchDiscount();
        $discounts[] = new SpecialOfferDiscount();

        return new ApplyDiscount($discounts);
    }
}

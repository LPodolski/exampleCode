<?php

namespace Factory;

use Logic\Order\ApplyDiscount;
use Logic\Order\Discount\LunchDiscount;
use Logic\Order\Discount\OrderAboveSpecifiedAmountDiscount;
use Logic\Order\Discount\SpecialOfferDiscount;

class ApplyDiscountFactory
{
    public function make()
    {
        $discounts = [];
        $discounts[] = new LunchDiscount();
        $discounts[] = new SpecialOfferDiscount();
        $discounts[] = new OrderAboveSpecifiedAmountDiscount();

        return new ApplyDiscount($discounts);
    }
}

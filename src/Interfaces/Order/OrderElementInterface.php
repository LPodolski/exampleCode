<?php

namespace Interfaces\Order;

interface OrderElementInterface
{
    public function getPrice();

    public function setPriceAfterDiscount($priceAfterDiscount);

    public function getPriceAfterDiscount();
}

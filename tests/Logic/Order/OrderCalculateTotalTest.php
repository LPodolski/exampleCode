<?php

namespace Tests\Logic\Order;

use DTO\Order\Order;
use DTO\Product\Dessert;
use DTO\Product\Lunch;
use DTO\Product\MainCourse;
use DTO\Product\SpecialOffer;
use Factory\OrderCalculateTotalFactory;

class OrderCalculateTotalTest extends \PHPUnit_Framework_TestCase
{
    public function testOrderWithOneItem()
    {
        $order = new Order();

        $mainCourse = new MainCourse();
        $mainCourse->setPrice(2500);
        $order->addElement($mainCourse);

        static::assertEquals(2500, $this->getTotalWithDiscounts($order));
    }

    public function testIfLunchDiscountDeducted()
    {
        $order = new Order();

        $lunch = new Lunch();
        $mainCourse = new MainCourse();
        $mainCourse->setPrice(3000);
        $lunch->setMainCourse($mainCourse);
        $dessert = new Dessert();
        $dessert->setPrice(2000);
        $lunch->setDessert($dessert);
        $order->addElement($lunch);

        static::assertEquals(4000, $this->getTotalWithDiscounts($order));
    }

    public function testIfLunchDiscountDeductedOnlyFromLunch()
    {
        $order = new Order();

        $lunch = new Lunch();
        $mainCourse = new MainCourse();
        $mainCourse->setPrice(3000);
        $lunch->setMainCourse($mainCourse);
        $dessert = new Dessert();
        $dessert->setPrice(2000);
        $lunch->setDessert($dessert);
        $order->addElement($lunch);

        $mainCourse = new MainCourse();
        $mainCourse->setPrice(2500);
        $order->addElement($mainCourse);

        static::assertEquals(6500, $this->getTotalWithDiscounts($order));
    }

    public function testIfEmptyOrderReturnsZero()
    {
        $order = new Order();

        static::assertEquals(0, $this->getTotalWithDiscounts($order));
    }

    public function testIfCorrectSumWhenWithoutDiscounts()
    {
        $order = new Order();

        $mainCourse = new MainCourse();
        $mainCourse->setPrice(3000);
        $order->addElement($mainCourse);
        $dessert = new Dessert();
        $dessert->setPrice(2000);
        $order->addElement($dessert);

        static::assertEquals(5000, $this->getTotalWithDiscounts($order));
    }

    public function testOnlySpecialOfferDiscount()
    {
        $order = new Order();

        $lunch = new SpecialOffer();
        $mainCourse = new MainCourse();
        $mainCourse->setPrice(3000);
        $lunch->setMainCourse($mainCourse);
        $order->addElement($lunch);

        static::assertEquals(2850, $this->getTotalWithDiscounts($order));
    }

    public function testSpecialOfferWithElementWithoutDiscount()
    {
        $order = new Order();

        $lunch = new SpecialOffer();
        $mainCourse = new MainCourse();
        $mainCourse->setPrice(3000);
        $lunch->setMainCourse($mainCourse);
        $order->addElement($lunch);

        $mainCourse = new MainCourse();
        $mainCourse->setPrice(2500);
        $order->addElement($mainCourse);

        static::assertEquals(5350, $this->getTotalWithDiscounts($order));
    }

    public function testOrderAmountDiscount()
    {
        $order = new Order();

        $mainCourse = new MainCourse();
        $mainCourse->setPrice(10000);
        $order->addElement($mainCourse);

        static::assertEquals(8500, $this->getTotalWithDiscounts($order));
    }

    private function getTotalWithDiscounts(Order $order)
    {
        $orderCalculateTotal = (new OrderCalculateTotalFactory())->make();
        return $orderCalculateTotal->getTotalWithDiscounts($order);
    }
}

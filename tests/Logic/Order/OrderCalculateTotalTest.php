<?php

namespace Tests\Logic\Order;

use DTO\Order\Order;
use DTO\Product\Dessert;
use DTO\Product\Lunch;
use DTO\Product\MainCourse;
use Factory\OrderCalculateTotalFactory;

class OrderCalculateTotalTest extends \PHPUnit_Framework_TestCase
{
    public function testOrderWithOneItem()
    {
        $order = new Order();

        $mainCourse = new MainCourse();
        $mainCourse->setPrice(2500);
        $order->addElement($mainCourse);

        $orderCalculateTotal = $this->getOrderCalculateTotal();
        $total = $orderCalculateTotal->getTotalWithDiscounts($order);

        static::assertEquals(2500, $total);
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

        $orderCalculateTotal = $this->getOrderCalculateTotal();
        $total = $orderCalculateTotal->getTotalWithDiscounts($order);

        static::assertEquals(4000, $total);
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

        $orderCalculateTotal = $this->getOrderCalculateTotal();
        $total = $orderCalculateTotal->getTotalWithDiscounts($order);

        static::assertEquals(6500, $total);
    }

    public function testIfEmptyOrderReturnsZero()
    {
        $order = new Order();

        $orderCalculateTotal = $this->getOrderCalculateTotal();
        $total = $orderCalculateTotal->getTotalWithDiscounts($order);

        static::assertEquals(0, $total);
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

        $orderCalculateTotal = $this->getOrderCalculateTotal();
        $total = $orderCalculateTotal->getTotalWithDiscounts($order);

        static::assertEquals(5000, $total);
    }

    private function getOrderCalculateTotal()
    {
        return (new OrderCalculateTotalFactory())->make();
    }
}

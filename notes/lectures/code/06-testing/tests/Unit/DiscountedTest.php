<?php

namespace Unit\ECommerce;

use ECommerce\Discounted;
use ECommerce\Product;
use PHPUnit\Framework\TestCase;

class DiscountedTest extends TestCase
{
    /**
     * @dataProvider getDataForPriceCalculation
     * @param float $originalPrice
     * @param $discount
     * @param float $expectedPrice
     */
    public function testDiscountedProductPriceCalcuation(float $originalPrice, float $discount, float $expectedPrice)
    {
        // Arrange
        $product = $this->buildProductMock($originalPrice);
        $discounted = new Discounted($product, $discount);

        // Act
        $discountedPrice = $discounted->getPrice();

        // Assert
        $this->assertEquals($expectedPrice, $discountedPrice);
    }

    public function getDataForPriceCalculation()
    {
        return [
            [10, 0, 10],
            [10, 1, 9],
            [10, 9, 1],
            [10, 10, 0],
        ];
    }

    /**
     * @dataProvider getDataForInvalidDiscount
     * @expectedException Assert\InvalidArgumentException
     *
     * @param float $originalPrice
     * @param $discount
     */
    public function testInvalidDiscountSetup(float $originalPrice, float $discount)
    {
        // Arrange
        $product = $this->buildProductMock($originalPrice);
        $discounted = new Discounted($product, $discount);
    }

    public function getDataForInvalidDiscount()
    {
        return [
            [10, -1],
            [10, 11],
        ];
    }

    private function buildProductMock(float $price)
    {
        $product = $this->prophesize(Product::class);

        $product->getPrice()->willReturn($price);

        return $product->reveal();
    }
}
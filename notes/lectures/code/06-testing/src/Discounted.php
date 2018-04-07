<?php

namespace ECommerce;

use Assert\Assert;
use Assert\Assertion;

class Discounted implements Product
{
    /**
     * @var Product
     */
    private $product;

    /**
     * @var float
     */
    private $discount;

    /**
     * Discounted constructor.
     * @param Product $product
     * @param float $discount
     */
    public function __construct(Product $product, float $discount)
    {
        Assertion::range($discount, 0, $product->getPrice(), 'Discoinut cant be bigger than product price');

        $this->product = $product;
        $this->discount = $discount;
    }

    public function getName(): string
    {
        return $this->product->getName();
    }

    public function getPrice(): float
    {
        return $this->product->getPrice() - $this->discount;
    }
}
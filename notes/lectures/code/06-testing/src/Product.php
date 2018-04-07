<?php

namespace ECommerce;

interface Product
{
    public function getName(): string;

    public function getPrice(): float ;
}
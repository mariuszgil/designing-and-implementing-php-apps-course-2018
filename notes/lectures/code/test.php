<?php

use Company\ProjectAnother\Money;

trait MyTrait
{

}

namespace Company\Project {

    class Money
    {
        private $amount;
        private $currency;
    }
}

namespace Company\ProjectAnother {

    class Money
    {
        private $amount;
        private $currency;
    }
}

$obj = new Money(1, 'PLN');
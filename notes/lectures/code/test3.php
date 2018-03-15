<?php

class Wallet implements Countable
{
    private $moneys = [];

    public function addToWallet(Money $money)
    {
        $this->moneys[] = $money;
    }

    public function count()
    {
        return count($this->moneys);
    }
}

count($wallet);



try {
    throw new Exception();
} catch (\Exception $e) {

}



class Money
{
    /**
     * @var int
     */
    private $amount;

    /**
     * @var string
     */
    private $currency;

    /**
     * Money constructor.
     * @param int $amount
     * @param string $currency
     */
    public function __construct(int $amount, string $currency)
    {
        $this->amount = $amount;
        $this->currency = $currency;
    }

    /**
     * @return int
     */
    public function getAmount(): int
    {
        return $this->amount;
    }

    /**
     * @return string
     */
    public function getCurrency(): string
    {
        return $this->currency;
    }

    public function __toString()
    {
        return $this->getAmount() . ' ' . $this->getCurrency();
    }

    public function __get($name)
    {
        echo 'KTOS PROBUJE UZYC WLASCIWOSCI ' . $name . PHP_EOL;
    }

    public function __clone()
    {
        // TODO: Implement __clone() method.
    }


}

$a = new Money(10, 'PLN');
$b = clone $a;



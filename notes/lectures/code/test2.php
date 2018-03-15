<?php


class Singleton
{
    static private $instance = null;
    static public $counter = 0;

    private function __construct()
    {
        self::$counter++;
    }

    public static function getInstance()
    {
        if (self::$instance == null) {
            self::$instance = new self();
        }

        return self::$instance;
    }
}

$singleton = Singleton::getInstance();
$singleton = Singleton::getInstance();
$singleton = Singleton::getInstance();
$singleton = Singleton::getInstance();

echo Singleton::$counter . PHP_EOL;
exit;


class MyClass
{
    static public $val = 1;

    public static function format(int $value): string
    {
        return 'formatted: ' . $value;
    }
}

echo MyClass::format(100);



trait MyTrait {
    public function doSomething() {
        echo 'HELLO!';
    }
}

trait MyTrait2 {
    public function doSomethingElse() {
        echo 'HELLO ELSE!';
    }
}

class MyClass {
    use MyTrait;
    use MyTrait2;
}

$object = new MyClass();



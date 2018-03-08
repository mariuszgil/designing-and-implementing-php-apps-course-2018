# Projektowanie i implementacja zaawansowanych aplikacji PHP

## Wykład 2: Obiektowość w języku PHP

### Zakres:

- Rys historyczny w kontekście:
    - PHP 4
    - PHP 5
    - PHP 7
- Obiektowość (część I)
    - Klasy i obiekty
    - Właściwości, properties
    - Metody
    - Modyfikatory widoczności
        - private
        - protected
        - public
    - Konstruktory i destruktory
    - Dziedziczenie i polimorfizm
    - Przeciążanie metod
    - Klasy i metody abstrakcyjne
    - Klasy finalne
    - Deklaracja typów argumentów metody
    - Deklaracja typu zwracanego przez metodę
    - Słowo kluczowe $this
    - Interfejsy
- Object-oriented Design
    - Reguły SOLID (wstęp)
        - Single Responsiblity Principles
            - Zasada pojedynczej odpowiedzialności
            - "The single responsibility principle is a computer programming principle that states that every module or class should have responsibility over a single part of the functionality provided by the software, and that responsibility should be entirely encapsulated by the class."
            - "A class should have only one reason to change", Robert C. Martin
        - Open-close Principle
        - Liskov Substitution Principle
        - Interface Segregation Principle
        - Dependency Inversion Principle
    - Reguły GRASP (wstęp)
        - Controller
        - Creator
        - High cohesion
        - Indirection
        - Information Expert
        - Low coupling
        - Polymorphism
        - Protected variations
            - "The protected variations pattern protects elements from the variations on other elements (objects, systems, subsystems) by wrapping the focus of instability with an interface and using polymorphism to create various implementations of this interface."
        - Pure fabrication
     
### Przykładowe programy

Przykład: klient i anonimizacja danych

```php
interface ICustomer
{
    public function getName(): string;
    public function getLastName(): string;
}

class Customer implements ICustomer
{
    private $name;
    private $lastName;
    
    public function __construct(string $name, string $lastName)
    {
        $this->name = $name;
        $this->lastName = $lastName;
    }

    public function getName(): string
    {
        return $this->name;
    }
    
    public function getLastName(): string
    {
        return $this->lastName;
    }
}

class AnonymizedCustomer implements ICustomer
{
    private $customer;
    
    public function __construct(ICustomer $customer)
    {
        $this->customer = $customer;
    }

    public function getName(): string
    {
        return $this->customer->getName();
    }

    public function getLastName(): string
    {
        return $this->customer->getLastName()[0] . '.';
    }
}

$customer = new Customer('Jan', 'Kowalski');
$customer = new AnonymizedCustomer($customer);

echo $customer->getName() . ' ' . $customer->getLastName() . PHP_EOL;
```

Przykład: Raporty

```php
interface DataProvider {
    public function getData(array $params): array;
}

class DBDataProvider implements DataProvider { /* ... */ }
class FileDataProvider implements DataProvider { /* ... */ }
class APIDataProvider implements DataProvider { /* ... */ }
class HadoopDataProvider implements DataProvider { /* ... */ }

interface Formatter {
    public function format(array $data): string;
}

class CSVFormatter implements Formatter { /* ... */ }
class ExcelFormatter implements Formatter { /* ... */ }
class JSONFormatter implements Formatter { /* ... */ }

interface Writer {
    public function write(string $data): void;
}

class LocalOutputWriter implements Writer {}

final class ReportingService {
    private $dataProvider;
    private $formatter;
    private $writer;

    /**
     * ReportFlow constructor.
     * @param DataProvider $dataProvider
     * @param Formatter $formatter
     * @param Writer $writer
     */
    public function __construct(
        DataProvider $dataProvider,
        Formatter $formatter,
        Writer $writer)
    {
        $this->dataProvider = $dataProvider;
        $this->formatter = $formatter;
        $this->writer = $writer;
    }

    public function run(array $arguments): void
    {
        $this->writer->write(
            $this->formatter->format(
                $this->dataProvider->getData($arguments)
            )
        );
    }
}

$service = new ReportingService(
    new APIDataProvider(),
    new CSVFormatter(),
    new LocalOutputWriter()
);

$service = new ReportingService(
    new HadoopDataProvider(),
    new ExcelFormatter(),
    new LocalOutputWriter()
);
```

Przykład: dziedziczenie

```php
class Foo
{
    public function baz(): void
    {
        // doSomething
    }
}

class Bar extends Foo
{
    public function baz(): void
    {
        parent::baz();
        
        // doSomethingMore
    }
}

```

### Materiały uzupełniające

- [Obiektość w PHP, dokumentacja](http://php.net/manual/en/language.oop5.php)
- [Video, Robert C. Martin "Uncle Bob", SOLID Principles of Object Oriented and Agile Design](https://www.youtube.com/watch?v=TMuno5RZNeE)
- [Principles of Object-oriented Design](http://butunclebob.com/ArticleS.UncleBob.PrinciplesOfOod)



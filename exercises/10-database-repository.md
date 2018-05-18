# Projektowanie i implementacja zaawansowanych aplikacji PHP

## Database repository


### Zadanie

Dany jest obiekt o następującej strukturze:

```php
class Transaction
{
    /**
     * @var Uuid 
     *
     * Klasa Uuid pochodzi z biblioteki ramsey/uuid
     */ 
    private Uuid;
    
    /**
     * @var Money
     *
     * Klasa Money pochodzi z biblioteki moneyphp/money
     */
    private $amount;
    
    /**
     * @var string
     */
    private $fromAccount;
    
    /**
     * @var string
     */
    private $toAccount;
    
    /**
     * @var Status
     *
     * Klasa Status rozszerza klasę Enum z biblioteki myclabs/php-enum i reprezentuje jeden ze statusów konta:
     * - ACTIVE
     * - BLOCKED
     * - SUSPENDED
     * - CLOSED
     */
    private $status;
    
    // ...
}
```

oraz repozytorium obiektów `Transaction`:

```php
interface TransactionRepository
{
    public function get(Uuid $transactionId): Transaction;
    
    public function save(Transaction $transaction): void
}
```

a także finder, przeznaczony do pobierania danych (zwraca obiekty DTO):

```php
interface TransactionFinder
{
    public function findAll(int $limit = 10, int $offset = 0);
}
```

Korzystając z wybranej przez Ciebie bazy danych, np. MySQL lub PostgreSQL, zaprojektuj tabelę do przechowywania danych o zachodzących transakcjach oraz zaimplementuj __jedną__ z poniższych wersji interfejsów:

- `PDOTransactionRepository` oraz `PDOTransactionFinder` wykorzystując wbudowany mechanizm PDO (PHP Data Objects)
- `DoctrineTransactionRepository` oraz `DoctrineTransactionFinder` wykorzystując bibliotekę Doctrine ORM

Przygotuj skrypt demonstracyjny, który:
 
- utworzy przykładowy obiekt transakcji i zapisze go w repozytorium
- pobierze utworzony obiekt z repozytorium, zmodyfikuje go, a następnie ponownie zapisze
- wyświetli na standardowe wyjście dane zwrócone przez finder


### Uwagi

Program będzie uruchamiany z lini poleceń.

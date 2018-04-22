# Projektowanie i implementacja zaawansowanych aplikacji PHP

## Command Bus


### Zadanie

Dane są następujące szkielety klas i interfejsów:

```php
abstract class Command
{
    /**
     * @var \DateTime
     */
    private $created;
    
    // ...
}

class PingCommand extends Command { /* ... */ }
class PongCommand extends Command { /* ... */ }

class PingHandler
{
    public function __invoke(PingCommand $command)
    {
        // ...
    }
}

class PongHandler
{
    public function __invoke(PongCommand $command)
    {
        // ...
    }
}

interface Router
{
    // ...
}

class CommandBus
{
    // ...

    /**
     * @throws NoRouteFoundException
     */
    public function dispatch(Command $command)
    {
        // ...
    }
}
```

stanowiące podstawę mechanizmu szyny komend systemu. 

- Klasy `PingCommand` oraz `PongCommand` to przykładowe commandy, które publikować może aplikacja
- Klasy `PingHandler` oraz `PongHandler` to klasy przeznaczone do obsługi opublikowanych commandów
- Interfejs `Router` to kontrakt dla klas zajmujących się przekierowywaniem commandów do właściwych im handlerów
- Klasy CommandBus, przyjmującej obiekt commandu i orkiestrującej całe flow wykonania

Uzupełnij powyższy schemat do działającej implementacji, dostarczając implementację interfejsu `Router`, pozwalającą wstrzyknąć mapowanie command -> handler w następujący sposób:

```php
$router = new DirectRouter([
    PingCommand::class => PingHandler::class,
    PongCommand::class => PongHandler::class,
]);
```

Przygotuj skrypt `command-bus.php` demonstrujący działanie zaimplementowanego rozwiązania. Powinien on publikować obiekt commandu na szynę w następujący sposób:

```php
$commandBus->dispatch(new PingCommand());
$commandBus->dispatch(new PongCommand());

```

### Informacje dodatkowe

- Struktura klas oraz interfejsów może być zmieniana, przy zachowaniu funkcjonalności rozwiązania


### Przykład

Wywołanie programu:

```
php command-bus.php
```

Wynik:

```
PONG!
PING!
```


### Uwagi

Program będzie uruchamiany z lini poleceń.

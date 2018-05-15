# Projektowanie i implementacja zaawansowanych aplikacji PHP

## Process Manager


### Zadanie

Podczas sesji Event Stormingu zamodelowany został proces wypożyczenia książki, opisany m.in . następującymi zdarzenianami:

- `WypożyczonoKsiążkę` (book_instance_id, account_id, date, date_to) 
    - wymagane
    - zdarzenie rozpoczyna proces wypożyczenina
- `PrzekroczonoTerminOddaniaKsiążki` (book_instance_id, account_id, date) 
    - opcjonalne
- `ZwróconoKsiążkę` (book_instance_id, account_id, date) 
    - wymagane
- `ObliczonoOpłatęKarną` (book_instance_id, account_id, amount, date) 
    - opcjonalne
- `ZarejestrowanoWpłatęKary` (book_instance_id, account_id, amount, date)
- `RozliczonoWypożyczenieKsiążki` (book_instance_id, account_id, date) 
    - wymagane
    - kończy cały proces, zdarzenie to powinno być wyzwalane automatycznie przez system

Możliwe są więc 2 wersje flow:

- `WypożyczonoKsiążkę` → `ZwróconoKsiążkę` → automatycznie: `RozliczonoWypożyczenieKsiążki`
- `WypożyczonoKsiążkę` → `PrzekroczonoTerminOddaniaKsiążki` → `ObliczonoOpłatęKarną` → `ZarejestrowanoWpłatęKary` → `ZwróconoKsiążkę` → automatycznie: `RozliczonoWypożyczenieKsiążki`

Korzystając z obiektów EventBus (oraz powiązannych) z biblioteki prooph/service-bus (https://github.com/prooph/service-bus) przygotuj implementację klasy modelującej powyższy proces. Powinna ona nasłuchiwać na zdarzenia pojawiające się na EventBusie, przechowywać aktualny stan wypożyczenia, a w przypadku stwierdzenia kompletności zdarzeń, generować do EventBusa zdarzenie `RozliczonoWypożyczenieKsiążki`.

Pojawienie się na EventBusie zdarzenia `RozliczonoWypożyczenieKsiążki` powinno skutkować wypisaniem na standardowe wyjście komunikatu:

```
PROCESS COMPLETED!
```

Obiektu modelujący proces powininen przetrzymywać stan w zewnętrznym storage, np. w pliku tekstowym, aby możliwe było wielokrotne uruchamianie skryptu i dostarczanine do niego różnych zdarzeń. Powinien onn także obsługiwać wiele równoległych wypożyczeń różnych książek przez różne osoby.

Przygotuj skrypt `library.php`, za pomocą którego do twojego rozwiązania dostarczane będą zdarzenia, wraz z powiązanymi parametrami (jako argumenty wywołania skryptu).


### Przykład 1

Wywołanie programu:

```
php library.php WypozyczonoKsiazke 1 1 2018-01-01 2018-01-14
php library.php ZwróconoKsiazke 1 1 2018-01-10
```

Wynik:

```
PROCESS COMPLETED!
```

### Przykład 2

Wywołanie programu:

```
php library.php WypozyczonoKsiazke 1 1 2018-01-01 2018-01-14
php library.php PrzekroczonoTerminOddaniaKsiazki 1 1 2018-01-14
php library.php ObliczonoOplateKarna 1 1 100 2018-01-20
php library.php ZarejestrowanoWplateKary 1 1 100 2018-01-20
php library.php ZwroconoKsiazke 1 1 2018-01-20
```

Wynik:

```
PROCESS COMPLETED!
```

### Informacje pomocnicze

- Pomocne będą tu obiekty EventBus, EventRouter oraz mechanizm handlerów, zajmujący się faktyczną obsługą zdarzeń z szyny
- Zdarzenia mogą zostać zaimplementowane zarówno we własnych klasach, lub (zalecane) rozszerzając https://github.com/prooph/common/blob/master/src/Messaging/DomainEvent.php z biblioteki prooph/common
- Przykładowy setup: https://robertbasic.com/blog/prooph-event-bus/ 
- Zdarzenia można nazwać po angielsku ;)

### Uwagi

Program będzie uruchamiany z lini poleceń.

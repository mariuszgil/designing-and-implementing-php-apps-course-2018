# Projektowanie i implementacja zaawansowanych aplikacji PHP

## Wykład 6: Testy jednostkowe, Test Driven Development

### Zakres:

- Wprowadzenie do testowania
    - Rodzaje i strategie testowania
    - Piramida testów
    - Dobór strategii testowania 
- Idea Test FIRST
    - Test FIST vs Test AFTER
        - Różnie i konswekwencje implementacji testów przed i po właściwej implementacji kodu
    - Testy jednostkowe powinny być:
        - Fast, szybkie
        - Independent, niezależne
        - Repeatable, powtarzalne
        - Self-validating, samo-walidujące się
        - Timely, pisane we właściwym momencie
- Testy jednostkowe
    - Czym jest jednostka i test jednostkowy?
    - Struktura testu jednostkowego
        - Arrange
        - Act 
        - Assert
    - Strategie nazewnictwa metod testowych
    - Przygotowanie stanu
    - Weryfikacja rezultatu
        - Asercje
    - "Uprzątnięcie" po teście
    - Organizacja kodu testowego
        - Wzorce organizacji
            - Testcase Class per Class
            - Testcase Class per Feature
            - Testcase Superclass
            - Parametrized Test
            - ...
    - Odcinanie zależności
        - Test Doubles
            - Dummies
            - Mocki
            - Stuby
            - Spies
            - Fakes
    - Narzędzia
        - PHPUnit
        - Prophecy
        - TestDox
- Testability kodu
    - Antywzorce i czynniki wpływające na trudność testowania kodu
        - Wysokie sprzężenie, coupling
        - Źle wykorzystany wzorzec projektowy Singleton
        - Wysoka złożoność cyklomatyczna kodu
        - Wywołania statyczne
- Test Driven Development
    - 3 prawa TDD Roberta "Uncle Boba" Martina
        - "You are not allowed to write any production code unless it is to make a failing unit test pass."
        - "You are not allowed to write any more of a unit test than is sufficient to fail; and compilation failures are failures."
        - "You are not allowed to write any more production code than is sufficient to pass the one failing unit test."
    - Cykl red-green-refactor

     
### Przykładowe programy


```php
...
```


### Narzędzia

- [PHPUnit, dokumentacja](https://phpunit.readthedocs.io/en/latest/)
- [Prophecy, mocking framework](https://github.com/phpspec/prophecy)
- [Infection, framework dla testów mutacyjnych, bazujących na AST](https://github.com/infection/infection)
- [Humbug, framework dla testów mutacyjnych](https://github.com/humbug/humbug)


### Materiały uzupełniające

- [XUnitPatters](http://xunitpatterns.com)
- [PHP The Right Way, Testing](http://www.phptherightway.com/#testing) 
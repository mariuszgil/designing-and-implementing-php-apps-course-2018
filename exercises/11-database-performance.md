# Projektowanie i implementacja zaawansowanych aplikacji PHP

## Database performance


### Zadanie

Dana jest tabela `transactions` o następującej strukturze:

- identyfikator transakcji, licza całkowita, auto-increment, klucz główny
- identyfikator punktu sprzedaży, liczba całkowita
- data i czas transakcji, (daty z zakresu kilku lub kilkunastu lat)
- kwota transakcji, liczba zmienno przecinkowa, nieujemna
- tytuł transakcji, niepusty ciąg znaków

Wykorzystując wybraną przez Ciebie bazę (MySQL lub PostgreSQL) napisz zapytanie tworzące powyższą tabelę, a następnie:

- wykorzystując Alice, generator danych fixture, przygotuj skrypt PHP `data-gen.php` wstawiający zadaną liczbę rekordów do tabeli, liczba ta będzie podawana jako parametr wywołania programu
- przygotuj tabelę `transactions_partitioned`, gdzie dane zostaną spartycjonowane na X partycji względem daty transakcji
    - dobierz właściwy dla wygenerowanych danych rozmiar partycji, np. miesiąc, kwartał, rok, dekada  
- wykorzystując polecenie EXPLAIN ... oraz dokumentację (link poniżej), przeanalizuj plan wykonania zapytań, zapisz je do pliku tekstowego:
    - `SELECT id FROM transactions WHERE created >= '...''`
    - `SELECT * FROM transactions WHERE created >= '...''`


### Przykład

Wywołanie programu:

```
php data-gen.php 10000
```


# Informacje pomocnicze

- [Alice, generator fixture dannych](https://github.com/nelmio/alice)
- [EXPLAIN dla MySQL](https://dev.mysql.com/doc/refman/8.0/en/explain-output.html)
- [EXPLAIN dla PostgreSQL](https://www.postgresql.org/docs/10/static/sql-explain.html)


### Uwagi

Program będzie uruchamiany z lini poleceń.

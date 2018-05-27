# Projektowanie i implementacja zaawansowanych aplikacji PHP

## Wykład 11: Bazy danych, kontynuacja

### Zakres:

- Model ACID
    - Atomicity
    - Consistency
    - Isolation
        - 4 poziomy izolacji transakcji
    - Durability
- Plan wykonaina zapytania
    - Uzyskiwanie informacji o planie wykonania zapytania za pomocą EXPLAIN ...
- Przykładowa ścieżka przyśpieszania i skalowania relacyjnej bazy danych
    - Etap 1: Tuning ustawień systemowych
        - Domyślne ustawienia dowolnego oprogramowania wymagają tuningu i skonfigurowania pod konkretny use-case lub hardware
        - Przykładowo:
            - Domyślne ustawienia stosu TCP/IP w systemach Linux udostępniają jedynie ok. 50% dostępnych portów, nie są także dedykowane do pracy z systemami high-performance  
    - Etap 2: Tuning zapytań oraz schematu bazy danych
        - Zapytania wykonywane zbyt wolno przez serwer powinny podlegać logowaniu do tzw. slow-loga, oraz być poddawane analizie przez zespół DBA (Database Administrators) oraz developerów
        - Slow-queries często są wynikiem:
            - braku właściwych indeksów
            - zbyt wolną warstwą storage danych (dyski)
            - analizowaniem zbyt dużych ilości rekordów
        - Celem indeksu jest optymalizacja dotarcia do właściwych rekordów w możliwe najkrótszym czasie, powinien być on możliwe jak najbardziej selektywny
            - Kolumny o największej selektywności powinny być umieszczane na pierwszych pozycjach w indeksie (ogólna zasada)
            - Indeks (A, B, C) przyśpiesza wykonanie zapytań zawierających odwołania do:
                - A
                - A oraz B
                - A oraz B oraz C
    - Etap 3: Scale Up
        - Strategia Scale Up to zwiększanie możliwości pojedynczego serwera, często metoda ta ma ograniczenia ekonomiczne (ceny komponentów)
            - Szybsze CPU
            - Więcej pamięci RAM
            - Szybsze lub większe dyski, przykładowo:
                - HDD 5.4k 
                - HDD 7.2k
                - HDD 15k
                - SSD
                - SSD Write Intensive
    - Etap 4: Partycjonowanie funkcjonalne
        - Strategia polegająca na zidentyfikowaniu, a następnie przeniesieniu na osobny serwer (serwery) grup tabel, które są używane rozłącznie
        - Każdy serwer obsługuje osobną grupę tabel, zwiększona jest więc wydajność całego rozwiązania
        - Wady:
            - Często oznacza to konieczność zrezygnowania z pewnych więzów integralności danych, np. niektórych kluczy obcych
    - Etap 5: Partycjonowanie tabeli
        - Strategia polegająca na podziale 1 tabeli logicznej, na N tabel fizycznych, utrzymywanych i zarządzanych przez serwer bazy danych
        - Podział danych pomiędzy partycje następuje w oparciu o tzw. klucz partycjonujący, tzn. funkcję, która na podstawie rekordu zwraca numer partycji
        - W przypadku obsługi zapytania wykorzystującego w klauzuli WHERE odwołania do kolumn klucza partycjonującego, baza danych może wykonać tzw. partition pruning, czyli uniknięcie analizowania danych z partycji, w których na pewno nie ma poszukiwanych danych
        - Typowe strategie partycjonowania
            - HASH
            - KEY
            - RANGE
            - COLUMN
            - LIST
    - Etap 6: Replikacja Master-Slave
        - Strategia polegająca na utworzeniu replik bazy danych tylko do odczytu, z których może korzystać aplikacja
        - Baza Master przyjmuje zapytania typu:
            - INSERT ...
            - UPADTE ...
            - DELETE ...
            - CREATE / TRUNCATE / DROP / ALTER ...
            - SELECT - tylko wybrane zapytania, gdzie wymagany jest dostęp do najbardziej aktualnej wartości
        - Baza Slave przyjmuje zapytania typu:
            - SELECT
        - Replika może być aktualizowana:
            - synchronicznie
            - aynchronicznie
            - semi-synchronicznie
        - Wątki replikacyjne
            - I/O Thread dla kopiowania danych pomiędzy serwerami
            - SQL Thread dla aktualizacji danych w bazie Slave
        - Pomiędzy bazami danych może wystąpić tzw. replication lag, czyli opóźnienie replikacyjne
    - Etap 7: Replikacja Master-Master
        - Strategia zwiększająca dostępność danych, nie skaluje odczytu ani zapisu
        - Replikacja może być:
            - synchroniczna
            - asynchroniczna
    - Etap 8: Sharding
        - Strategia zwiększająca możliwość zapisu, stosowana gdy ilość danych przekracza możliwość 1 serwera
        - Grupa N serwerów utrzymuje tabelę o jednakowej strukturze, każdy węzeł posiada 1/N zbioru danych
        - Rozłożenie danych pomiędzy serwerami odbywa się w oparciu o funkcję shardującą, która na podstawie rekordu zwraca numer sharda, węzła przechowującego konkretny rekord
        - Sharding ma istotny wpływ na warstwę persystencji aplikacji 
- Bazy SQL vs NoSQL
    - CAP Theorem
        - Consistency
        - Availability
        - Partitioning
    - Model ACID vs BASE
- Przegląd rozwiązań zastosowanych w znanych portalach i aplikacjach webowych


### Materiały uzupełniające

- [Sharding Pinterest: How we scaled our MySQL fleet](https://medium.com/@Pinterest_Engineering/sharding-pinterest-how-we-scaled-our-mysql-fleet-3f341e96ca6f)
- [Model ACID vs BASE](http://www.dataversity.net/acid-vs-base-the-shifting-ph-of-database-transaction-processing/)
- [Partycjonowanie danych w MySQL](https://dev.mysql.com/doc/refman/8.0/en/partitioning.html)
- [Partycjonowanie danych w PostgreSQL](https://www.postgresql.org/docs/10/static/ddl-partitioning.html)


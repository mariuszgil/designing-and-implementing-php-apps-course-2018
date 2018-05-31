# Projektowanie i implementacja zaawansowanych aplikacji PHP

## Wykład 12: Wydajnóść i skalowalność aplikacji

### Zakres:

- Zasada wykonywania kodu PHP
    - Parsowanie, translacja i wykonanie
    - Opcode caching
        - APC
        - xCache
        - eAccelerator
        - OPcache
    - Monitoring działania
    - Inwalidacja cache
    - Przykłady zastosowania opcode caching z produkcyjnych systemów
- Przyśpieszanie działania aplikacji PHP, wybrane metody
    - Cache wbudowany w bazę danych
        - Zasada działania QueryCache
        - Wyzwania związane z inwalidacją wpisów w QueryCache
    - Cache ponad warstwą bazy danych
        - Cache'owanie wyników zapytań
        - Mechanizmy ekspiracji cache
            - TTL
            - LRU
        - Cache'owanie zapytań typu JOIN vs "JOIN" danych na poziomie aplikacji
        - Wyzwania związane z inwalidacją wpisów w cache
        - Rozwiązania serwerowe
            - Memcached
            - Redis
            - Aerospike
        - Monitorowanie skuteczności cache, hit-ratio
        - Przykłady zastosowania cache z produkcyjnych systemów
    - Cache na warstwie HTTP
        - Nagłówki cache'ujące HTTP
        - Wysyłanie nagłówków z poziomu aplikacji PHP
            - Mechanizm setcookie
            - Mechanizm PSR-7 Message Interface
        - Wykorzystanie cache HTTP w celu uniknięcia wielokrotnego odpytywania serwera o ten sam zasób
        - Cache HTTP po stronie klienta oraz serwera
        - Wyzwania związane z inwalidacją wpisów w cache po stronie klienta
        - Mechanizm ESI (Edge Side Includes)
        - Rozwiązania serwerowe
            - Varnish Cache
                - Idea działania
                - Varnish Configuration Language
                - Rozszerzenia VMODs, Varnish Modules
            - Content Delivery Networks
        - Monitorowanie skuteczności cache, hit-ratio
        - Przykłady zastosowania cache z produkcyjnych systemów
- Testowanie wydajnośćiowe i obiążeniowe aplikacji
    - Metodyka przeprowadzania testów wydajnościowych
    - Tworzenie stabilnego i odizolowanego środowiska na potrzeby testów
    - Narzędzia
        - Apache Benchmark
        - Siege
        - Tsung
        - JMeter
        - Gatling
    - Generowanie obciążenia punktowego vs odtwarzanie sesji prawdziwych użytkowników
    - Analiza i interpretacja wyników
- Skalowanie aplikacji
    - Stanowość vs bezstanowość serwera aplikacji
    - Mechanizmy balansowania obciążenia
        - Round-robin
        - Weight round-robin
        - Sticky sessions
    - Typowe mechanizmy PHP wymagające zmian w przypadku migracji na środowisko wieloserwerowe
        - Sesja
            - File Handler vs Memcache/Redis Handler 
        - Upload plików
            - Sieciowe systemy plików
            - Dedykowane serwery składowania danych
            - Cloud storage
    - Przykłady skalowania produkcyjnych systemów


### Materiały uzupełniające

- [OPcache, konfiguracja](http://php.net/manual/en/opcache.configuration.php)
- [High Scalability, blog, encyklopedia wiedzy o architekturze znanych aplikacji](http://highscalability.com/blog/category/example)
- [Varnish, web accelerator](https://varnish-cache.org)
- [Cache-Control header, dokumentacja](https://developer.mozilla.org/pl/docs/Web/HTTP/Headers/Cache-Control)
- [Edge Side Includes, dokumentacja](https://www.w3.org/TR/esi-lang)
- [PSR-6 Cache, dokumentacja](https://www.php-fig.org/psr/psr-6/)
- [PSR-16 Simple Cache, dokumentacja](https://www.php-fig.org/psr/psr-16/)

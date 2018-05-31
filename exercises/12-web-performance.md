# Projektowanie i implementacja zaawansowanych aplikacji PHP

## Web performance


### Zadanie

Wykorzystując dowolny framework lub microframework dla PHP, np. Silex, zaprojektuj aplikację implementującą endpoint:

```
GET /npb?currency=CURRENCY&date=DATE
```

pobierającą poprzez API Narodowego Banku Polskiego (link poniżej) kurs zadanej waluty na zadany dzień. Następnie:

- przeprowadź test wydajnościowy programem `ab`, zapisz i przeanalizuj wyniki
- korzystając z dowolnej biblioteki cache oraz serwera Memcached lub Redis, zaimplementuj cache pobieranych danych
- przeprowadź ponowny test wydajnościowy programem `ab`, zapisz i przeanalizuj wyniki oraz osiągnięty efekt


### Zadanie rozszerzone (+5 punktów)

W celu osiągnięcia bardzo wysokiej wydajności:

- zainstaluj, skonfiguruj oraz uruchom serwer Varnish
    - twoja aplikacja będzie tu serwerem backend uruchomionym np. na porcie 8080, Varnish nasłuchiwać będzie na porcie 80
- nie wysyłaj nagłówków związanych z cookie sesyjnym (!) 
- przeprowadź ponowny test wydajnościowy programem `ab`, zapisz i przeanalizuj wyniki oraz osiągnięty efekt


### Informacje pomocnicze

- [NBP-PHP, biblioteka](https://github.com/maciej-sz/nbp-php)
- [PHP-Cache, bibloteki](http://www.php-cache.com/en/latest/)
- [Packagist PSR-6, bilbioteki](https://packagist.org/?query=psr-6)


# Projektowanie i implementacja zaawansowanych aplikacji PHP

## Wykład 14/15: Monitoring aplikacji, tematy pozostałe, Q&A

### Zakres:

- Praca z aplikacją nie kończy się na zarejestrowaniu zmian w repozytorium, czy deploymencie kodu na produkcję
    - Działające oprogramowanie należy monitorować, aby szybko wykrywać i reagować na problemy
- Monitoring aplikacji
    - Monitoring powinien być możliwie jak najbardziej automatyczny
    - Monitoring powinien być prowadzony ciągle, 24x7
    - Przykładowe aspekty aplikacji podlegające monitoringowi
        - Obciążenie CPU
        - Wykorzystanie pamięci
        - Wykorzystanie sieci
        - Wykorzystanie zasobów dyskowych, zajętość oraz generowane IOPS'y
        - Liczba procesów w systemie operacyjnym
        - Liczba zapytań SQL
        - Liczba powolnych zapytań SQL obciążających bazę danych
        - Liczba obsługiwanych requestów HTTP
        - etc.
    - Monitoring powinien także obejmować integrację z aplikacją
        - Częstym rozwiązaniem jest wystawienie w sieci wewnętrznej endpointu np. /health-check, monitorowanego z zadaną rozdzielczością
        - Endpoint ten dokonuje sprawdzenia, czy dany host z aplikacją może obsługiwać ruch produkcyjny, np.
            - Czy możliwe jest nawiązanie połączenia z bazą danych?
            - Czy możliwe jest nawiązanie połączenia z systemami cache?
            - Czy możliwe jest nawiązanie połączenia z silnikiem wyszukiwania pełnotekstowego?
    - Wykrywane zagrożenia powinny być różnicowane
        - Typowa skala narzędzi monitorujących usługi i serwery
            - OK, wszystko jest w porządku, ingerencja zespołu nie jest wymagana
            - WARNING, ostrzeżenie, zespół powinien przyjrzeć się problemowi, zanim nastąpi jego eskalacja
            - CRITICAL, awaria, zespół powinien natychmiast przystąpić do usuwania awarii
    - Narzędzia
        - Nagios
        - Zabbix
- Observability
    - Metryka, wartość zmieniająca się w czasie
    - Wykorzystywane rozwiązania serwerowe oraz aplikację można opisać dziesiątkami/setkami danych metrycznych
    - Metryki można zbierać, agregować i wizualizować, dla lepszego zrozumienia działania aplikacji w runtime
    - Do przechowywania metryk świetnie nadają się dedykowane bazy typu time-series
    - Raportowanie metryk zazwyczaj następuje po protokole UDP (nie TCP), aby utrata podsystemu przetwarzania metryk nie powodowała awarii aplikacji 
    - StatsD
        - Prosty protokół do zbierania danych metrycznych
        - Opracowany przez firmę Etsy
        - Obsługuje następujące typy danych
            - Counters, modyfikowane przez inkrementację/dekrementację o zadaną wartość
            - Gauges, modyfikowane poprzez podanie aktualnej wartości, np. cyklicznie z poziomu crona
            - Timings, modyfikowane poprzez podanie kolejnego czasu
            - Sets, modyfikowane poprzez dodanie elementu do zbioru
    - Live demo
    - Narzędzia
        - StatsD
        - Grafana
        - TICK stack
            - Telegraf
            - InfluxDB
            - Chronograf
            - Kapacitor
        - ELK stack, zapewniający także funkcjonalności związane z obsługą logów
            - Elasticsearch
            - Logstash
            - Kibana
        - Bazy danych i storage time-series
            - InfluxDB
            - Prometheus
            - Graphite
- Security
    - Burp Suite
    - OWASP TOP 10
        - Zestawienie najczęstszych zagrożeń dla aplikacji
        - Zestawienie na 2017 rok
            - A1:2017-Injection
            - A2:2017-Broken Authentication
            - A3:2017-Sensitive Data Exposure
            - A4:2017-XML External Entities (XXE)
            - A5:2017-Broken Access Control
            - A6:2017-Security Misconfiguration
            - A7:2017-Cross-Site Scripting (XSS)
            - A8:2017-Insecure Deserialization
            - A9:2017-Using Components with Known Vulnerabilities
            - A10:2017-Insufficient Logging&Monitoring
     
    
### Przykładowy kod


```php
$connection = new \Domnikl\Statsd\Connection\UdpSocket('localhost', 8125);
$statsd = new \Domnikl\Statsd\Client($connection, "test.namespace");

$statsd->setNamespace("test");

$statsd->increment("foo.bar");
$statsd->decrement("foo.bar");

$statsd->timing("foo.bar", 320);
$statsd->time("foo.bar.bla", function() { /* ... */ });

$statsd->startTiming("foo.bar");
// more complex code here ...
$statsd->endTiming("foo.bar");

$statsd->gauge('foobar', 3);
```


### Materiały uzupełniające

- [StatsD](https://github.com/etsy/statsd)
- [Measure Anything, Measure Everything, artykuł odnośnie wprowadzenia StatsD przez Etsy](https://codeascraft.com/2011/02/15/measure-anything-measure-everything/)
- [TICK stack, kompletne rozwiązanie do zbierania, przechowywania i wyświetlania danych metrycznych](https://www.influxdata.com/time-series-platform/)
- [Grafana, narzędzie do wizualizacji danych](https://grafana.com)
- [Nagios](https://www.nagios.org)

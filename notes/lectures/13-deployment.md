# Projektowanie i implementacja zaawansowanych aplikacji PHP

## Wykład 13: Wdrażanie aplikacji

### Zakres:

- Testowanie wydajnośćiowe i obiążeniowe aplikacji (kontynuacja)
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
- Automatyzacja procesów
    - Typowe powody automatyzacji
        - Potrzeba przyśpieszenia wykonywania większej liczby zadań 
        - Chęć uniknięcia błędów przy powtarzalnych czynnościach
    - Przykładowe procesy możliwe do zautomatyzowania
        - Buildowanie aplikacji
        - Tworzenie środowiska developerskiego, testowego, produkcyjnego
        - Deployment aplikacji na serwery
        - Obsługa migracji bazy danych podczas deployment
        - Backupowanie baz danych
        - Usuwanie starszych logów
    - Narzędzia
        - Phing, odpowiednik systemu Ant dla środowiska języka Java
        - Robo
- Wdrażanie aplikacji
    - Przykładowe środowiska serwerowe
        - Serwery VPS, Virtual Private Server
        - Serwery dedykowane
        - Rozwiązania cloud
            - Amazon Web Services, usługa EC2
        - Konteneryzacja
            - Docker
            - Kubernetes
    - Przykładowe modele deploymentu aplikacji PHP
        - Update aplikacji "w miejscu"
            - git pull
            - Problem z obsługą ruchu użytkowników w momencie przepinania wersji
        - Deployment do osobnego folderu
            - Przypinanie linku symbolicznego do katalogu DOCUMENT ROOT webserwera
            - Wyniesienie plików współdzielonych poza katalog z rewizją aplikacji
                - shared/uploads
                - shared/logs
            - Rozwiązania
                - Capifony
                - Capistrano
        - Środowiska Blue/Green
            - Utworzenie kopii środowiska z nową wersją
            - Przepinanie ruchu na poziomie load-balansera
    - Wersjonowanie assetów aplikacji
        - Powiązannie wersji assetów CSS/JS z rewizją aplikacji na potrzeby odświeżenia cache po stronie klienta
    - Udostępnianie funkcjonalności aplikacji części użytkownikom
        - Feature Flags
  
    
### Przykładowy skrypt Phing

Plik build.xml (domyślna nazwa dla pliku Phinga)

```xml
<?xml version="1.0" encoding="UTF-8"?>
<project name="Example" default="build">
    <!-- ============================================  -->
    <!-- Target: prepare                               -->
    <!-- ============================================  -->
    <target name="prepare">
        <echo msg="Making directory ./build" />
        <mkdir dir="./build" />
        
        <!-- some tasks here -->
    </target>

    <!-- some targets here -->

    <!-- ============================================  -->
    <!-- (DEFAULT)  Target: dist                       -->
    <!-- ============================================  -->
    <target name="build" depends="prepare">
        <echo msg="Running dist task..." />
        
        <!-- some tasks here -->
    </target>
</project>
```

Wywołanie, po instalacji pakietu phing/phing z użyciem composera

```
$ ./vendor/bin/phing
Buildfile: /private/tmp/phing-demo/build.xml

Example > prepare:

     [echo] Making directory ./build
    [mkdir] Created dir: /private/tmp/test/build

Example > build:

     [echo] Running dist task...

BUILD FINISHED

Total time: 0.0634 seconds
```


### Materiały uzupełniające

- [Phing, PHP build system](https://www.phing.info)
- [Zestawienie dostępnych tasków Phing](https://www.phing.info/phing/guide/en/output/hlhtml/#app.coretasks)
- [Robo, PHP task runner](https://robo.li)
- [Feature Toggles, wpis na blogu Martina Fowlera](https://martinfowler.com/articles/feature-toggles.html)
- [FeatureFlags.io, Kompendium wiedzy na temat feature flags](http://featureflags.io)
- [FF4J, zaawansowany system kontroli feature flags](http://ff4j.org)
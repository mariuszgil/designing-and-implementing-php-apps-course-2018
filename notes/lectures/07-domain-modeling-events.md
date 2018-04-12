# Projektowanie i implementacja zaawansowanych aplikacji PHP

## Wykład 7: Modelowanie domeny

### Zakres:

- Podejście CRUD
    - Strategia rzeczowników, jako mechanizm odkrywania bytów i ich właściwości
    - Typowe operacje związane z zasobami
        - CREATE
        - RETRIEVE
        - UPDATE
        - DELETE
    - CRUD + REST
    - Zalety i wady modeli CRUD-owych (wybrane)
        - Łatwość i szybkość generowania szkieletów
        - Problematyczna implementacja procesów wychodzących poza typowe operacje
        - Problematyczne współbieżne zmiany obiektów
- Podejście zdarzeniowe
    - Strategia czasowników, jako mechanizm odkrywania zachowań obiektów
    - Event
        - Świetna reprezentacja zmiany zachodzącej w systemie, np. konsekwencja zachowania obiektu
        - Źródło informacji dla systemu oraz systemów zewnętrznych
    - Metody identyfikacji zdarzeń biznesowych
        - Event Storming
            - Struktura sesji modelowania
            - Role uczestników
            - Poziom Big Picture
                - Etap 1: Wild Exploration, odkrywanie zdarzeń biznesowych
                - Etap 2: Enforce The Timeline, porządkowanie zdarzeń w procesy
                - Etap 3: Reverse Narrative, kontrola spójności zdarzeń
                - Etap 4: Add Users & Systems, odkrywanie aktorów i systemów
                - Etap 5: Choose The Right Problem, podejmowanie decyzji projektowych
            - Prezentacja prawdziwych sesji modelowania z zespołami developerskimi
    - Event Sourcing
        - Event jako reprezentacja zmiany systemu/obiektu
        - Rejestrowanie zdarzeń generowanych w systemie/obiekcie
        - Odtwarzanie systemu/obiektu z historii zarejestrowanych zdarzeń 
        - Zalety i wady Event Sourcingu (wybrane)
            - Możliwość przeanalizowania i udowodnienia każdej zmiany systemu/obiektu
            - Możliwość rozszerzenia zachowań obiektów, w oparciu o zarejestrowane zarzenia
            - Potencjalne problemy związane z odczytem stanu wszystkich obiektów
            - Potencjalne problemy wydajnościowe związane z ilością zdarzeń
        - Przykładowe zastosowania Event Sourcingu w aplikacjach
- Wprowadzenie do Event-Driven Architecture
     
     
### Przykładowe programy


```
```


### Materiały uzupełniające

- [Event Sourcing, Martin Fowler](https://martinfowler.com/eaaDev/EventSourcing.html) 
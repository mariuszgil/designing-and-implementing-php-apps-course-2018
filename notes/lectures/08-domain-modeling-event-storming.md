# Projektowanie i implementacja zaawansowanych aplikacji PHP

## Wykład 8: Event Storming

### Zakres:

- Event Storming
    - Struktura sesji modelowania
    - Role uczestników
        - Facilitator, osoba prowadząca i koordynująca sesję
        - Zespół, osoby modelujące, prowadzące dyskusję nad domeną
    - Poziom Big Picture
        - Notacja
            - Event, zdarzenie, fakt
                - Opisuje zdarzenie domeny, które zaszło w domenie
                - Opisany czasem przeszłym, dokonanym
                - Istotny z perspektywy biznesowej 
            - Hot-spot
                - "Zaparkowana dyskusja"
                - Problemy i pytania, na które brak odpowiedzi w danej chwili
            - Aktor
                - Osoba biorąca udział w procesie
            - Polityka
                - Reaktywna logika biznesowa, proces
            - Zewnętrzny system
            - Głosowanie
                - Wskazywanie istotnych problemów z perspektywy poszczególnych osób
        - Etapy:
            - Etap 1: Wild Exploration, odkrywanie zdarzeń biznesowych
            - Etap 2: Enforce The Timeline, porządkowanie zdarzeń w procesy
            - Etap 3: Reverse Narrative, kontrola spójności zdarzeń
            - Etap 4: Add Users & Systems, odkrywanie aktorów i systemów
            - Etap 5: Choose The Right Problem, podejmowanie decyzji projektowych
        - Typowe zastosowanie
            - Modelowanie procesów
            - Odkrywanie zdarzeń domenowych
            - Odkrywanie bounded-contextów
            - Identyfikacja problematycznych miejsc
            - Uspójnianie wiedzy w zespole
    - Poziom Design Level
        - Notacja
            - Command
                - Decyzja / rozkaz dla systemu
                - Opisany trybem rozkazującym
            - Agregat
                - Obiekt biznesowy, posiada i kontroluje niezmienniki
            - Read Model
                - Model danych dedykowany do odczytu
                - Może być generowany na podstawie Eventów (CQRS)
                - Może być przechowywany w innym storage niż główny model zapisu (CQRS)
        - Typowe zastosowania
             - Modelowanie oprogramowania, w tym zgodnego z Domain Driven Design
    - Prezentacja prawdziwych sesji modelowania z zespołami developerskimi
- "Picture that explain (almost) everything"
- Aspekty implementacyjne
    - Warstwy integracyjne projektu
        - Command Bus, szyna wspomagająca rozdzielanie logiki aplikacyjnej do logiki biznesowej
        - Event Bus
        - Query Bus
    - Command & Command Handler pattern
    
#### Event Storming timelapse

![Event Storming timelapse](assets/08-domain-modeling-event-storming/event-storming-timelapse.gif)


#### CQRS architecture, Command & Command Handler Pattern

![CQRS](assets/08-domain-modeling-event-storming/cqrs.jpg)

https://www.codeproject.com/Articles/555855/Introduction-to-CQRS


#### Picture that explains (almost) everything

![Alberto CQRS](assets/08-domain-modeling-event-storming/alberto-cqrs.jpg)

https://engineering.skybettingandgaming.com/2015/04/14/ddd-cqrs-alberto-brandolini/

     
### Materiały uzupełniające

- [Introducing Event Storming](http://ziobrando.blogspot.com/2013/11/introducing-event-storming.html) 
- [Event Storming by Alberto Brandolini](http://eventstorming.com)
- [50 000 orange stickies later, prezentacja](https://www.slideshare.net/ziobrando/50000-orange-stickies-later)
- [50 000 orange stickies later, video](https://www.youtube.com/watch?v=1i6QYvYhlYQ)
- [Modeling reactive systems with Event Storming](https://blog.redelastic.com/corporate-arts-crafts-modelling-reactive-systems-with-event-storming-73c6236f5dd7)
- [Achieving Domain Driven Design with Event Storming](https://techbeacon.com/introduction-event-storming-easy-way-achieve-domain-driven-design)
- [Software Development Challenges](https://www.infoq.com/news/2016/05/software-development-challenges)

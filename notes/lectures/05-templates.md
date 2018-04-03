# Projektowanie i implementacja zaawansowanych aplikacji PHP

## Wykład 5: System szablonów

### Zakres:

- Wprowadzenie do systemów szablonów
    - Historyczne problemy aplikacji PHP, mieszanie warstw logiki aplikacyjnej z warstwami prezentacji
    - Rozdzielenie warstw aplikacji
    - Współpraca developerów aplikacji z designerami oraz frontend developerami
    - Wykorzystanie systemów szablonów do generowania treści HTML, TXT, etc. 
- Składnia alternatywna PHP
    - Instrukcje warunkowe:
        - if / else / elseif / endif
        - switch / case / endswitch
    - Pętle
        - while / endwhile
        - for / endfor
        - foreach / endforeach
- System szablonów Twig
    - Wprowadzenie do systemu Twig 
    - Składnia (wybrane elementy)
        - Wyświetlenie zmiennych z użyciem tagów ``{{ ... }}``
        - Instrukcje sterujące z użyciem tagów ``{% ... %}``
        - Tagi
            - block, definiowanie bloków w szablonie z opcją nadpisania w szablonach dziedziczących
            - extends, projektowanie hierarchi dziedziczenia szablonów
            - for, pętla 
            - if, instrukcja warunkowa
            - set, ustawienie wartości zmiennej
        - Filtry, modyfikacja wartości zmiennej
        - Funkcje
        - Testy, testowanie zmiennej w instrukcjach warunkowych
    - Wbudowane mechanizmy przeciwdziałania atakom typu XSS
        - Autoescape'owanie zmiennych przekazywanych do warstwy prezentacji
    - Przykładowa budowa strony portalu oparta o szablony Twig
    
Dodatkowo, w trakcie wykładu wróciliśmy do tematu namespace'ów oraz ich mapowania na strukturę katalogów:

- Konwencja: pliki źródłowe aplikacji trzymamy w katalogu `src/` projektu
- Konwencja: 1 klasa - 1 plik, nazwa klasy/interfejsu odpowiada 1:1 nazwie pliku
- Konwencja: [PSR-4 Autoloader](https://www.php-fig.org/psr/psr-4/)
- Konfiguracja autoloadingu powinna zostać określona w konfiguracji Composera, znajdującej się w pliku `composer.json`, w sekcji `autoload`
- Z pomocą `use` importujemy do bieżącego skryptu klasy z innych namespace'ów
- Klasy/interfejsy/traity z tego samego namespace nie muszą być importowane
  
     
### Przykładowe programy

#### Twig master-template i szablon po nim dziedziczący

master-template.html.twig:
```twig
<!DOCTYPE html>
<html>
    <head>
        <title>{% block title %}{% endblock %}</title>
    </head>
    <body>
        {% block nav %} 
            <ul id="navigation">
                {% for item in navigation %}
                    <li><a href="{{ item.href }}">{{ item.caption }}</a></li>
                {% endfor %}
            </ul>
        {% endblock %}
        
        ...
        
        {% block content %}{% endblock %} 
        
        ...
        
        {% block footer %}{% endblock %}
    </body>
</html>
```

page-template.html.twig:
```twig
{% extends "master-template.html.twig" %}
 
{% block title}Sample title{% endblock %}
 
{% block content %}
    Sample page content
{% endblock %}
 
{% block content %}
 Sample page content
{% endblock %}
 ```

#### Namespaces

composer.json, w którym namespace `ECommerce` został przemapowany na katalog `src/` z użyciem PSR-4

```json
{
    "autoload": {
        "psr-4": {
            "ECommerce\\": "src/"
        }
    }
}
```

test.php
```php
<?php
 
use ECommerce\Orders\Confirmation\Payment;
 
require_once 'vendor/autoload.php';
 
$payment = new Payment();
```

src/Orders/Confirmation/Payment.php
```php
<?php
 
namespace ECommerce\Orders\Confirmation;
 
class Payment
{
    // ...
}
```

src/Product/Product.php
```php
<?php
 
namespace ECommerce\Product;
 
interface Product
{
    // ...
}
```

src/Product/Bundle.php
```php
<?php
 
namespace ECommerce\Product;
 
class Bundle implements Product
{
    // ...
}
```

src/Product/Gift.php
```php
<?php
 
namespace ECommerce\Product;
 
class Gift implements Product
{
    // ...
}
```


### Dodatki do IDE

Dla PhpStorm istnieją bardzo dobre rozszerzenia, ułatwiające korzystanie zarówno w Composera jak i Twiga. Można je zainstalować bezpośrednio z poziomu IDE.

- [PHP composer.json support](https://github.com/psliwa/idea-composer-plugin)
- [Twig Support](https://plugins.jetbrains.com/plugin/7303-twig-support)


### Materiały uzupełniające

- [Alternatywna składnia PHP, wykorzystywana w szablonach opartych o czyste PHP](http://php.net/manual/en/control-structures.alternative-syntax.php)
- [PHP The Right Way, Templating](http://www.phptherightway.com/#templating)
- [Twig, dokumentacja](https://twig.symfony.com)
- [Integracja Twig-Silex, dokumentacja](https://silex.symfony.com/doc/2.0/providers/twig.html)

Składnia Twiga bazuje mocno na [Jinja2](http://jinja.pocoo.org), który z kolei jest bardzo popularnym narzędziem w ekosystemie Pythona. 



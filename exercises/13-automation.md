# Projektowanie i implementacja zaawansowanych aplikacji PHP

## Automation


### Zadanie

Korzystając z systemu [Phing](https://www.phing.info) przygotuj skrypt `build.xml` przeznaczony do przygotowania prostego buildu aplikacji [PHP-DI Demo](https://github.com/PHP-DI/demo) (lub innej aplikacji PHP dostępnej na GitHubie, w przypadku problemów z instalacją zależności).

Skrypt powinien obejmować następujące akcje:

- utworzenie katalogu `./build` 
    - jeśli katalog ten istniał w momencie wywołania Phinga, przed należy go usunąć; tak, aby każde uruchomienie było w pełni powtarzalne i pomiędzy uruchomieniami skryptu nie pozostawały artefakty 
- checkout brancha master repozytorium do katalogu `./build`
- instalację zależności aplikacji z użyciem composera
- przygotowanie artefaktu `build.zip` zawierającego wszystkie pliki aplikacji


### Uwagi

Program będzie uruchamiany z lini poleceń.

```
$ ./vendor/bin/phing
``` 


### Informacje pomocnicze

- System Phing można zainstalować composerem, jest to pakiet `phing/phing`
- [Zestawienie dostępnych tasków Phing](https://www.phing.info/phing/guide/en/output/hlhtml/#app.coretasks) 
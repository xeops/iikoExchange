[![Build Status](https://travis-ci.org/xeops/iiko-exchange.svg?branch=master)](https://travis-ci.org/xeops/iiko-exchange)
[![Total Downloads](https://poser.pugx.org/xeops/iiko-exchange/d/total.svg)](https://packagist.org/packages/xeops/iiko-exchange)
[![Latest Stable Version](https://poser.pugx.org/xeops/iiko-exchange/v/stable.svg)](https://packagist.org/packages/xeops/iiko-exchange)
[![License](https://poser.pugx.org/xeops/iiko-exchange/license.svg)](https://packagist.org/packages/xeops/iiko-exchange)
[![Latest Unstable Version](https://poser.pugx.org/xeops/iiko-exchange/v/unstable)](//packagist.org/packages/xeops/iiko-exchange)

## iiko data exchange library
Данная библиотека предназначена для реализации бандлов по обмену данными между
сторонней системой и iiko или наоборот.

        /-------------/         /----------------/
       /    iiko     / ----->  / 3d paty system /
      /-------------/         /----------------/

## Installation
```shell
composer require xeops/iiko-exchange
```

## Exchange
Обьект Exchange состоит из:
* Engine
* Extractor
* Loader
* Schedule

#### Create Exchange

```yaml
my_exchange:
    class: MyBundle\Exchange\MyExchange
    arguments: [ "EXCHANGE_CODE", "@event_dispatcher" ]
    tags:
        - { name: "exchange" }
    calls:
        - [ setEngines, [ [ "@my_exchange_engine_1" ] ] ]
        - [ setExtractor, [ "@exchange.provider.iiko.olap" ] ]
        - [ setLoader, [ "@my_exchange.provider" ] ]
        - [ setSchedules, [ [ "@exchange.schedule.cron" ] ] ]
```

### Engine
Engine - набор действий для формирования 1 цикла выгрузки:
* загрузить данные
* трансформировать - перевести поля и данные из формата источника в формат получателя
* форматировать - записать трансформированные данные в формат, установленный получаетелем ( json, csv, etc.)

#### Transformer

Transformer, он же адаптер, необходим для перевода полей системы А в поля системы В, т.е.
перевод данных из DTO системы А в DTO системы В.

#### Formatter
Formatter необходим для форматирования данных в конечный вид. Например, если
приемник данных принимает CSV, необходимо написать класс, который сложит данные в CSV файл.
Далее, если принимающая сторона поменяет формат на любой другой, нужно будет поменять лишь
данный класс Formatter.


### Extractor & Loader (Provider) 
Extractor, Loader или же Provider - класс для соединения c внешней системой или iiko,
служит для отправки запроса (Request).

#### Create Connection & Provider

```yaml
    my_exchange.connection:
        class: iikoExchangeBundle\Connection\Ftp\SftpConnection
        arguments: [ "MY_CONNECTION" ]

    my_exchange.provider:
        class: iikoExchangeBundle\Library\Provider\Provider
        arguments: [ "MY_PROVIDER", "@my_exchange.connection" ]
```
### Schedule
Schedule - класс для расписания. Основные виды расписаний
* Крон
* Крон с периодом

### How it works?

![plot](./docs/image/exchange.png)


### Mapping

Для того, чтобы данные из источкика (А) сопоставить в данные из приемника данных (В)
необходимо использовать маппинг (mapping).

Маппинг состоит из двух частей:
 - идентификаторы
 - значения.

Идентификаторы и значения могут быть во множественном числе, чтобы можно было использовать
маппинг вида например:
```
+--------------+--------------+--------------+--------------+
|            IIKO             |         3D party system     |   
+--------------+--------------+--------------+--------------+
|payment type  | order type   | account code | description  |
|--------------+--------------+--------------+--------------+
| Visa         | Dine In      | 300_001      | Dining in    |
|--------------+--------------+--------------+--------------+
| Cash         | Express      | 300_002      | Fast food    |
|--------------+--------------+--------------+--------------+
| Cash         | Dine In      | 300_002      | Dining in    |
|--------------+--------------+--------------+--------------+
```

Каждый элемент идентификатора или значения - это ConfigItemInterface.

Пример реализации
```yaml
    my_exchange.mapping.sample:
        class: MyBundle\Mapping\SampleMapping
```

Пример подключения
```yaml
    my_exchange.formatter.recipt:
        arguments: [ "FORMATTER_RECIPT" ]
        class: MyBundle\Formatter\SampleFormatter
        calls:
            - [ addMapping, [ "@my_exchange.mapping.sample" ] ]
```

Маппинг является расширением.


### Extension (Расширение)
Расширения нужны для использования однотипной функциональности на разных этапах формирования
выгрузки.
В коде реализации расширения представлены  [трейтами (Traits)](https://www.php.net/manual/ru/language.oop5.traits.php)

Список доступных расширений:
- период
- конфигурация
- маппинг
- ресторан.

**Период**
Позволяет получить период, заданный для выгрузки

**Конфигурация**
Позволяет передавать конфигурацию в UI и получать значения

**Маппинг**
Позволяет передавать маппинг в UI и получать значения маппинга

**Ресторан**
Позволяет получить текущий ресторан, заданный для выгрузки

[![Build Status](https://travis-ci.org/xeops/iiko-exchange.svg?branch=master)](https://travis-ci.org/xeops/iiko-exchange)
[![Total Downloads](https://poser.pugx.org/xeops/iiko-exchange/d/total.svg)](https://packagist.org/packages/xeops/iiko-exchange)
[![Latest Stable Version](https://poser.pugx.org/xeops/iiko-exchange/v/stable.svg)](https://packagist.org/packages/xeops/iiko-exchange)
[![License](https://poser.pugx.org/xeops/iiko-exchange/license.svg)](https://packagist.org/packages/xeops/iiko-exchange)
[![Latest Unstable Version](https://poser.pugx.org/xeops/iiko-exchange/v/unstable)](//packagist.org/packages/xeops/iiko-exchange)

## iiko data exchange library

Данная библиотека представляет собой [ETL](https://en.wikipedia.org/wiki/Extract,_transform,_load)
процесс для интеграции iiko c внешними системами посредством сервера iikoWeb.

Суть интеграции состоит в плановом **одностороннем** обмене данных между iiko и внешней системой.

```
        /-------------/         /----------------/
       /    iiko     / ----->  / 3d paty system /
      /-------------/         /----------------/
```

_Возможен обмен в обратном порядке ( 3d paty system -> iiko )_

Процесс разработки обмена следующий
1. Создается проект, использующий данную библиотеку
2. Проект проходит аудит и ревью разработчиками iikoWeb
3. Проект включается в продукт iikoWeb посредством [composer](https://getcomposer.org/)

Процесс работы обмена
1. Пользователь открывает frontend приложение Exchange, написанное на Angular
2. Приложение запрашивает все возможные типы обменов у сервера iikoWeb
3. Пользователь создает обмен, указывая имя и рестораны, для которых оно будет работать. На данном этапе 
рестораны могут быть не указаны, и тогда будут работать все, что есть в сети.
4. Пользователь вводит настройки подключения к внешней системе
5. Пользователь заполняет все настройки и сопоставления (мапинги) согласно документации и/или подсказкам.
6. Пользователь настраивает расписание
7. После сохранения расписания, согласно ему создается задание на сервере iikoWeb.
8. При наступлении времени исполнения, iikoWeb запускает процесс обмена, заполняя его всеми необходимыми
настройками и сопоставлениями.


## Первые шаги
### Создание проекта
Необходимо создать проект со следующей директорией папок
```bash
AcmeExchangeBundle
│
├── src
│   ├── Formatter
│   ├── Loader
│   ├── Mapping
│   ├── OptionSet(?)
│   ├── Request
│   ├── Resources
│   │   ├── config
│   │   │   └── services.yml
│   │   └── view
│   │       └── preview.html.twig
│   └── Transformer
├── Tests 
│   └── *****
└── README.md


```
### Инициализация проекта

Процесс инициализации проекта описан в [отдельной статье](./docs/iikoGitLabComposer.md)

### Подключение библиотеки

```shell
composer require xeops/iiko-exchange
```

### Реализация

#### 1. Инициализация сервиса Обмена
Первым делом необходимо в services.yml создать сервис [**обмена**](./docs/Exchange.md)
```yaml
    exchange.acme:
        # Собственный класс можно не создавать, базовый класс содержит всю необходимую реализацию
        class: iikoExchangeBundle\Exchange\Exchange
        # в качестве аргумента необходимо передать уникальный код обмена, который будет использоваться для переводов и получения настроек
        # чтобы гарантировать уникальность - используйте названия внешней системы, с которой вы интегрируетесь и способ
        arguments: [ 'ACME_OLAP_TO_FTP_EXCHANGE_CODE' ]
        calls:
            # задайте расписание, с помощью которого обмен будет запускать в автоматическом режиме
            - [ setSchedules,[ [ '@exchange.schedule.cron' ] ] ]
            # задайте шаблон, с помощью которого будет выводиться превью выгрузки
            - [ setPreviewTemplate, [ 'AcmeExchangeBundle::preview.html.twig' ] ]
        # без тегирования система не узнает о том, что вы подключили новый механизм обмена
        tags:
            - { name: "exchange" }
```
! не забудьте добавить первой строкой в services.yml
```yaml
services:
    # начиная от этого отступа объявляйте сервисы
```

#### 2. Создание соединения с внешней системой

Есть несколько типов подключения

- [iiko](./docs/iiko/IikoConnection.md)
- [OAuth2](./docs/connection/OAuth2Connection.md)
- [FTP/SFTP](./docs/connection/FTPConnection.md)

Для создания своего типа используйте [базовый класс](./src/Library/Connection/Connection.php)
После создайте сервис и подключите его к уже созданному сервису обмена
```yaml
# Создание соединения
    exchange.acme.connection:
        class: AcmeExchangeBundle\Loader\AcmeOAuth2Connection
        arguments: [ 'ACME_CONNECTION', '@exchange.storage.session', '@logger' ]
        tags:
            - { name: "exchange.connection" }
```

```yaml
# подключение соединения
    exchange.acme:
        class: iikoExchangeBundle\Exchange\Exchange
        .....
        calls:
            ......
            # для добавления соединения просто добавьте строчку ниже в уже существующий массив calls созданного сервиса обмена
            - [ setLoader, [ '@exchange.acme.connection' ] ]
            ......
        ........
```
Для подключения соединения с iiko просто подключите уже созданный сервис соединения
```yaml
# подключение соединения к iiko
    exchange.acme:
        class: iikoExchangeBundle\Exchange\Exchange
        .....
        calls:
            ......
            # для добавления соединения просто добавьте строчку ниже в уже существующий массив calls созданного сервиса обмена
            - [ setExtractor, [ '@exchange.connection.iiko' ] ]
            ......
        ........
```
В данном примере используется направление `iiko -> 3d party system`. Если нужна выгрузка в обратную сторону, соединения
нужно поменять местами.


#### 3. Создание движков
Под каждую задачу в рамках одного процесса выгрузки создайте [**движок**](./docs/Engines.md)
Создайте для каждого движка сервис

```yaml
    exchange.acme.engine:
        # Собственный класс можно не создавать, базовый класс содержит всю необходимую реализацию
        class: iikoExchangeBundle\Engine\ExchangeEngine
        # В качестве аргумента необходимо передать уникальный код движка
        arguments: [ 'ACME_SALES' ]
```

#### 3.1 Создание запросов
Каждый движок опеределяется уникальным набором [запросов](./docs/Request.md) и механизмом трансформации (
[трансформер](./docs/Transformer.md) и [форматор](./docs/Formatter.md)
)

```yaml
    exchange.acme.request.sales:
        class: Exchange\AcmeExchangeBundle\Request\SalesRequest
        arguments: [ 'ACME_SALES_REQUEST' ]
```

#### 3.2 Создание трансформера
После выполнения [запросов](./docs/Request.md) к внешней системе, данные должны быть очищены
и преобразованы в бизнес модель системы, в которую данные будут выгружены с помощью 
[трансформера](./docs/Transformer.md).

```yaml
    exchange.acme.transformer.sales:
        class: Exchange\AcmeExchangeBundle\Transformer\SalesTransformer
        arguments: [ 'ACME_TRANSFORMER_SALES']
```

#### 3.3 Создание форматера
После [трансформации](./docs/Transformer.md) данных в бизнес модель, эти данные необходимо отформатировать
в запрос, принимаемой принимающей стороной. Для этого необходимо реализовать [форматер](./docs/Formatter.md)

```yaml
    exchange.acme.formatter.sales:
        class: Exchange\AcmeExchangeBundle\Formatter\SalesFormatter
        arguments: [ 'ACME_FORMATTER_SALES' ]
```

#### 3.4 подключение модулей движка
После реализации [запросов](./docs/Request.md), [трансформера](./docs/Transformer.md) и [форматера](./docs/Formatter.md)
сервисы нужно подключить в качестве модулей в движок, который собирается их использовать

```yaml
    exchange.acme.engine:
        class: iikoExchangeBundle\Engine\ExchangeEngine
        ....
        calls:
            # Запросы подключаются массивом, т.к. данные от запросов аккумулируются и передаются массивом в трансформацию
            - [ setRequests, [ [ '@exchange.acme.request.sales' ] ] ]
            - [ setFormatter, [ '@exchange.acme.formatter.sales' ] ]
            - [ setTransformer, [ '@exchange.acme.transformer.sales' ] ]
```


### Создание и использование расширений

На каждом этапе выгрузки может потребоваться получить 
 - [ресторан](./docs/traits/Restaurant.md)
 - [период](./docs/traits/Periodical.md)
 - [конфигурация](./docs/traits/Configurable.md)
 - [сопоставление (маппинг)](./docs/traits/Mapping.md)

Для этого классы могут использовать механизм [трейтов](https://www.php.net/manual/ru/language.oop5.traits.php)
Каждое расширение подключается отдельно и используется тоже отдельно, прочитать подробнее можно по ссылкам сверху.

Далее механизм обмена, автоматически заполнит ваши сервисы маппингом, конфигурацией, рестораном, периодом, если они ему необходимы.



### Переводы

## Пример

Пример реализации доступен в проекте [песочницы](https://github.com/xeops/iikoExchangeApplication)

## Запуск проекта

Для запуска проекта используйте [песочницу](https://github.com/xeops/iikoExchangeApplication)
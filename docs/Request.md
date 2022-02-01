# Запросы

Под запросом подразумевается класс, который исполнит класс соединения. Сделана такая архитектура была для того, чтобы разработчики не писали запросы вручную. Данный подход позволяет 1 раз
проинициализировать подключение и выполнять несколько запросов.

Каждый запрос должен быть написан под тип соединения.

## iiko

Запросы в iiko пишутся разработчиками iikoweb. Есть несколько типов запросов

1. Olap
2. Справочники

### Olap

Типы olap запроса

- SALES (продажи)
- TRANSACTIONS (проводки)
- DELIVERIES (доставка)

Olap запрос состоит из трех частей

1. группировка
2. фильтрация
3. агрегация

##### Поля группировки.

Служат для секции `GROUP BY` в механизме получения данных. Добавляются в результат. Список полей для продаж, например, расположен в
класса [GroupFields.php](../src/Library/Request/iiko/Report/Sales/GroupFields.php)

##### Поля агрегации

Служат для секции `SELECT SUM(*)`. Добавляются в результат. Список полей для продаж, например, расположен в класса [AggregateFields.php](../src/Library/Request/iiko/Report/Sales/AggregateFields.php)

##### Поля фильтрации

Служат для секции `WHERE`. Не добавляютс в результат. Список полей для продаж, например, расположен в класса [FilterFields.php](../src/Library/Request/iiko/Report/Sales/FilterFields.php)
На сервере iiko (RMS\Chain) при запросе Olap отчета является обязательным фильтр по дате `OpenDate.Typed`

```json
"OpenDate.Typed": {
    "filterType": "DateRange",
    "periodType": "CUSTOM",
    "from": "2022-01-01",
    "to": "2022-01-17",
    "includeLow": true,
    "includeHigh": true
}
```

При не добавлении данного фильтра сервер вернет ошибку
`OLAP-запрос отклонен, поскольку в запросе не найден ни один из необходимых фильтров: Учетный день (OpenDate.Typed)`
Данное поле включено по умолчанию в базовый класс [iikoSalesOlapDSRequest](../src/Library/Request/iikoOlapRequest.php), поэтому все обмены, построенные с помощью Olap отчета должны использовать
расширение [период](./docs/traits/Periodical.md). Фильтр по времени необходимо добавлять отдельным полем.

Пример готового Olap отчета выглядит следующим образом.

```json
{
	"reportType": "SALES",
	"buildSummary": "false",
	"groupByRowFields": [
	
		
	],
	"aggregateFields": [
		"DishDiscountSumInt",
		"DishDiscountSumInt.withoutVAT",
		"GuestNum",
		"UniqOrderId.OrdersCount"
	],
	"filters": {
		"OpenDate.Typed": {
			"filterType": "DateRange",
			"periodType": "CUSTOM",
			"from": "2022-01-01",
			"to": "2022-01-17",
			"includeLow":true,
			"includeHigh":true
		},
		"DeletedWithWriteoff": {
			"filterType": "IncludeValues",
			"values": ["NOT_DELETED"]
		},
		"OrderDeleted": {
			"filterType": "IncludeValues",
			"values": ["NOT_DELETED"]
		},
		"Storned": {
			"filterType": "ExcludeValues",
			"values": ["TRUE"]
		}
	}
}
```

В данном примере мы получаем некоторый набор информации по чекам из продаж для заказов, которые
не были возвратными.

Для реализации своего класса запроса реализуйте базовый класс [iikoSalesOlapDSRequest](../src/Library/Request/iikoOlapRequest.php)

Справочники
//TODO
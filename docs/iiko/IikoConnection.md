# iikoConnection

Для соединения с системой iiko нельзя писать собственный класс, так как данный класс реализовывает необходимые
функции подключения и контроля запросов.

В системе iikoWeb уже содержатся все необходимые данные о всех RMS\Сhain клиентов, и 
iikoWeb подставляет данные в iikoConnection автоматически на основе созданных обменов и расписания.

Для подключения соединения с iiko используйте `iikoExchangeBundle\Connection\iiko\iikoConnection`

Для того, чтобы выгружать из iiko 
```yaml
    calls:
        - [ setExtractor, [ "@exchange.connection.iiko" ] ]
```
Для загрузки в iiko
```yaml
    calls:
        - [ setLoader, [ "@exchange.connection.iiko" ] ]
```
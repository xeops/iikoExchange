## Конфигурация

На любом этапе обмена можно запросить у пользователя настройку, которая будет заполнена
на этапе создания обмена и доступна на момент запуска.

Настройки в iikoWeb рисуются для пользователя в Angular приложении,
которому backEnd часть iikoWeb посредством **REST API** выдает в формате JSON.

Сохранением и заполнением настроек занимается iikoWeb. Все настройки заранее берутся из
базы данных и записываются в класс, чтобы их можно было получить. Таким образом
избегается необходимость обращения к хранилищу настроек.

### Типы настроек

- строка ([ConfigItemString](/src/Library/Configuration/ConfigType/ConfigItemString.php))
- массив ([ConfigItemTags](src/Library/Configuration/ConfigType/ConfigItemTags.php))
- одно из выбора значений ([ConfigItemSelect](src/Library/Configuration/ConfigType/ConfigItemSelect.php))
- период ([ConfigItemPeriod](src/Library/Configuration/ConfigType/ConfigItemPeriod.php))
- пароль ([ConfigItemPassword](src/Library/Configuration/ConfigType/ConfigItemPassword.php))
- несколько из выбора значений ([ConfigItemMultiSelect](src/Library/Configuration/ConfigType/ConfigItemMultiSelect.php))
- число ([ConfigItemInt](src/Library/Configuration/ConfigType/ConfigItemInt.php))
- выражение crontab ([ConfigItemCronExpression](src/Library/Configuration/ConfigType/ConfigItemCronExpression.php))
- булеан ([ConfigItemBoolean](src/Library/Configuration/ConfigType/ConfigItemBoolean.php)

### Определение настроек

Для того, чтобы класс смог выдать настройки пользователю, нужно использовать
интерфейс [ConfigurableExtensionInterface](src/Contract/Extensions/ConfigurableExtensionInterface.php)
и trait [ConfigurableExtensionTrait](src/Library/ExtensionTrait/ConfigurableExtensionTrait.php).

Т.к. внутри trait [ConfigurableExtensionTrait](src/Library/ExtensionTrait/ConfigurableExtensionTrait.php) есть
метод jsonSerialize, который и позволяет отдавать настройки через JSON, он
будет конфликтовать с вашим внутренним jsonSerialize. Чтобы решить эту проблему необходимо
использовать trait

```injectablephp
use ConfigurableExtensionTrait
{
	ConfigurableExtensionTrait::jsonSerialize as public configJsonSerialize;
}
```

и добавить в ваш метод jsonSerialize.
Например:

```injectablephp
public function jsonSerialize()
{
	return ['some_key' => 'some_value'] + $this->configJsonSerialize();
}
```

Далее необходимо определить (при подключенном trait ConfigurableExtensionTrait - переопределить)
метод `exposeConfiguration`.

```injectablephp
# Пример определения настроек

const CONFIG_SOMEVALUE = 'SOMEVALUE';

public function exposeConfiguration(): array
{
	return 
	[
	    new ConfigItemMultiSelect(self::CONFIG_SOMEVALUE, "ServiceProduct", null, false)];
	];
}
```

где

- `ServiceProduct` - это код [OptionSet](../OptionSet.md)
- null - значение по умолчанию
- false - признак того, что поле обязательно для заполнения

### Получение настройки

Получить настройку можно вызовом метода `getConfigValue`

```injectablephp
$this->getConfigValue(self::CONFIG_ITEM_VENDOR_ID)
```

# FTP\SFTP
Подключение к клиентским ftp серверам осуществляется с помощью двух классов [FtpConnection](../../src/Library/Connection/Ftp/FtpConnection.php) и
[SftpConnection](../../src/Library/Connection/Ftp/SftpConnection.php)

Для подключения необходимо получить сервис `exchange.connection.ftp` или `exchange.connection.sftp`

### Разделение одного функционала на 2 класса

Данное дробление необходимо, чтобы отделить разные по реализации соединения, из-за чего весь код в 1 классе
содержал бы слишком много условий и кода, который сложен к тестированию.

### Смена протокола пользователем

Проблема состоит в том, что если подключить класс [FtpConnection](../../src/Library/Connection/Ftp/FtpConnection.php) - невозможно
угадать, у все ли пользователей будет именно FTP протокол. 
Поэтому с помощью механизма [конфигураций](../Configuration.md) каждый из соединений имеет настройку протокола,
которая позволяет пользователю выбирать между FTP\SFTP протоколом.

Поэтому какой класс подключать совершенно неважно, пользователь сможет переключить "налету".

### Запрос

На вход оба соединения принимают `FtpRequestInterface` реализованный в классе [FtpRequest](../../src/Library/Connection/Ftp/FtpRequest.php).
Это означает, что на этапе [форматирования](../Formatter.md) необходимо сформировать именно [FtpRequest](../../src/Library/Connection/Ftp/FtpRequest.php)

```php
# Пример создания запроса на сохранение csv файла из бизнес модели
return new FtpRequest($this->getConfigValue(self::CONFIG_FILE_PATH), $fileName, $data);
```


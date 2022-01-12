###Composer with gitlab

Создаем пакет
```
composer init
```
Подробнее про инициализацию можно прочитать в [официальной документации](https://getcomposer.org/doc/03-cli.md#init)

Авторизуемся в gitlab с помощью personal api key на примере временного ключа
```shell
    composer config gitlab-token.gitlab.iiko.ru YOUR_TOKEN_HERE
```

Добавляем репозитории на примере groupID 187
```shell
composer config repositories.187 
composer https://gitlab.iiko.ru/api/v4/group/187/-/packages/composer/

```
Добавляем gitlab url
```shell 
composer config gitlab-domains gitlab.iiko.ru
```
При необходимости делаем req
```shell
composer req artwaga/deputy:v0.0.13
```
Пушим в repo
```shell
git add composer.json
git commit -m 'Composer package test'
git tag v1.0.0
git push origin v1.0.0
```

Настройки юзера
User уровень reporter. Personal API Key права read_api

##Gitlab-ci

Пример файла:
```yaml


stages:
    - build
publish:
  image: curlimages/curl:latest
  stage: build
  variables:
    URL:
  "$CI_SERVER_PROTOCOL://$CI_SERVER_HOST:$CI_SERVER_PORT/api/v4/projects/$
  CI_PROJECT_ID/packages/composer?job_token=$CI_JOB_TOKEN"
    script:
        - version=$([[ -z "$CI_COMMIT_TAG" ]] && echo "branch=$CI_COMMIT_REF_NAME" || echo "tag=$CI_COMMIT_TAG")
        - insecure=$([ "$CI_SERVER_PROTOCOL" = "http" ] && echo "--insecure" || echo "")
        - response=$(curl -s -w "\n%{http_code}" $insecure --data $version $URL)
        - code=$(echo "$response" | tail -n 1)
        - body=$(echo "$response" | head -n 1)
        # Output state information
        - if [ $code -eq 201 ]; then
            echo "Package created - Code $code - $body";
          else
            echo "Could not create package - Code $code - $body";
            exit 1;
          fi
```
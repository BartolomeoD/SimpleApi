#Тестовое задание GD Forge

Работа с API

Для всех запросов обязательны загаловки:
* Content-Type: application/json
* Accept: application/json

Авторизация происходит по токену, который можно получить запросом.

**POST /api/register**

Пример
```
{
	"name": "test1", 
	"email": "test1@test.ru", 
	"password": "123456", 
	"password_confirmation": "123456"
}
```

Вернувшийся токен нужно передавать в заголовке 

Пример:
```
Authorization: Bearer UMpiejZiEpo4fohVoLLVQPOym3gepIDJKdTZK1ZH7O0tHfJlHSk53PU42mad
```

Для всех запросов кроме регистрации и авторизации нужна авторизация

Запрос всех новостей

**GET /api/articles**

----

Создание новости 

**POST /api/articles/create**

Пример

```
{
	"title": "test title", 
	"text": "test text"
}
```

----

Создание Комментария 

**POST /api/articles/comments/create**

Пример

```
{
	"article_id" : "1",
	"text": "test text"
}
```

----

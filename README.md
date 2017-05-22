# MontrealDBaaS

## Example of JSON Requests

### Select
```json
{
  "select": {
    "expressions": [
      {
        "field": "name",
        "alias": "",
        "DISTINCT": true
      },
      {
        "field": "email",
        "alias": ""
      }
    ],
    "from": [
      "tableOne",
      {
        "tableTwo": "tableAlias"
      }
    ],
    "where": [
      {
        "field": "id",
        "operator": "!=",
        "value": null,
        "or": {
          "field": "id",
          "operator": "=",
          "value": "10"
        }
      },
      {
        "field": "name",
        "operator": "=",
        "value": "John"
      },
      {
        "not": true,
        "field": "age",
        "operator": ">",
        "value": "20"
      }
    ],
    "order_by":null,
    "limit":false
  }
}
```

### Insert
```json
{
  "insert": {
    "ignore": false,
    "table": "user",
    "on_duplicate_key_update": false,
    "expressions": {
      "fname": "name",
      "lname": ""
    }
  }
}
```

### Update
```json
{
  "update": {
    "ignore": false,
    "low_priority": false,
    "table": "user",

    "set": {
      "fname": "John",
      "lname": "Doe",
      "age": "DEFAULT"
    },
    "where": [
      {
        "field": "id",
        "operator": "!=",
        "value": null,
        "or": {
          "field": "id",
          "operator": "=",
          "value": "10"
        }
      },
      {
        "field": "name",
        "operator": "=",
        "value": "John"
      },
      {
        "not": true,
        "field": "age",
        "operator": ">",
        "value": "20"
      }
    ],
    "order_by":null,
    "limit":false
  }
}
```

### Delete
```json
{
  "delete": {
    "ignore": false,
    "low_priority": false,
    "quick": false,
    "table": "user",
    "where": [
      {
        "field": "id",
        "operator": "!=",
        "value": "NULL",
        "or": {
          "field": "id",
          "operator": "=",
          "value": "10"
        }
      },
      {
        "field": "name",
        "operator": "=",
        "value": "John"
      },
      {
        "not": true,
        "field": "age",
        "operator": ">",
        "value": "20"
      }
    ],
    "order_by":null,
    "limit":false
  }
}
```

## Routes

### Web

##### User

 * **GET**+**POST** /login
 * **POST** /logout
 * **GET** /user/{userGUID}
 * **GET** /user/{userGUID}/stats
 * **GET** /user/{userGUID}/settings
 * **POST** /user/{userGUID}/settings/save
 * **GET** /user/{userGUID}/databases
 * **GET**+**POST** /user/{userGUID}/databases/create
 * **GET** /user/{userGUID}/databases/{dbGUID}/
 * **GET** /user/{userGUID}/databases/{dbGUID}/manage
 * **POST** /user/{userGUID}/databases/{dbGUID}/manage/save
 * **GET** /user/{userGUID}/databases/{dbGUID}/tables/
 * **GET** /user/{userGUID}/databases/{dbGUID}/tables/{tGUID}
 * **GET** /user/{userGUID}/databases/{dbGUID}/tables/{tGUID}/manage
 * **POST** /user/{userGUID}/databases/{dbGUID}/tables/{tGUID}/manage/save
 * **GET**+**POST** /user/{userGUID}/databases/{dbGUID}/cache
  
##### Admin
 
 * **GET**+**POST** admin/login
 * **GET**+**POST** admin/customers
 * **GET**+**POST** admin/customers/{customerGUID}
 * **GET**+**POST** admin/customers/{customerGUID}/databases
 * **GET**+**POST** admin/customers/{customerGUID}/databases/{dbGUID}
 
### API

 * **POST** /api/database/{dbGUID}/request?key=**key**


#### Pages
 * 404 Error - https://almsaeedstudio.com/themes/AdminLTE/pages/examples/404.html
 * 500 Error - https://almsaeedstudio.com/themes/AdminLTE/pages/examples/500.html
 * Lockscreen - https://almsaeedstudio.com/themes/AdminLTE/pages/examples/lockscreen.html
 * Login(User + Admin) - https://almsaeedstudio.com/themes/AdminLTE/pages/examples/login.html 
 * Registration - https://almsaeedstudio.com/themes/AdminLTE/pages/examples/register.html
 * Profile(only for Admin) - https://almsaeedstudio.com/themes/AdminLTE/pages/examples/profile.html
 * Home - https://almsaeedstudio.com/themes/AdminLTE/index2.html
 * 
 *
 
 # Защита
 
 Guards
 
    1. Web       - клиенты   
    2. Web_admin - администраторы
    
    
Попытки внештатных авторизации  и реакция  

* Валидный Customer в валидынй роут при 'middleware' => 'auth:web_admins' : Action : роут => редирект на home юзера - авториризация считается успешно 
* Валидный Admin в валидынй роут при 'middleware' => 'auth:web' : Action : Вывод ошибки на форме авторизации - авториризация считается проваленной
* 
















http://php.net/manual/ru/com.installation.php
Class 'COM' not found 
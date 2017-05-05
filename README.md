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


 * **GET**+**POST** /login
 * **GET**+**POST** /logout
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

### API


 * **POST** /api/database/{dbGUID}/request?key=**key**



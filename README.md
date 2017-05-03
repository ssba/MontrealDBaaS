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



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















## linfo/linfo 
http://php.net/manual/ru/com.installation.php - для Windows 
Class 'COM' not found 
extension=php_com_dotnet.dll

## torann/geoip
http://lyften.com/projects/laravel-geoip/doc/basic-usage.html
geoip($ip = null);

## https://github.com/jenssegers/agent


# Инструкция по созданию фасадов 

 1. Create a custom class
    ```php
    namespace App\Helpers\TestClass;
    
    class TestClass
    {
   
        public function __construct(){}
   
        public function getData(){
            return "Data";
        }
    }
    ```
 
 2. Create a facade class
    ```php
    namespace App\Helpers\TestClass;
    
    use Illuminate\Support\Facades\Facade as _Facade;
    
    class Facade extends _Facade
    {
        protected static function getFacadeAccessor()
        {
            return 'TestClass';
        }
    }
    ```
 3. Create a provider using -> php artisan make:provider TestClassProvider
    ```php
    ```
 4. Add On that provider, in register 
     ```php
              App::bind('GUID', function()
                                               {
                                                   return new \App\Helpers\GUID\GUID;
                                               });
     ```
 5. Add to config/app.php
    ```php
    App\Providers\TesProvider::class, 'Xtrf' => App\Libraries\TesFacade::class,
    ```                                        
 6. composer dump-autoload

# План Home
1. Миграции
2. Models Зависимости databases@stats + databases@actions|tables@actions|customer@actions 
3. Фабрики 
4. * Фасад по работе с таблицей cpu                  CPUStats
   * Фасад по работе с таблицей requests_stats		RequestStats
   * Фасад по работе с таблицей customer_actions 	CustomerActions

5. UserController@home - передаnm во вью массив с 
   ```php
    $linfo = new Linfo;
    $parser = $linfo->getParser();
    
    
    [
        cpu => CPUStats::get(),
        ram => $parser->getLoad(),
        db => Database::where('customer', $userGUID)->count();
        db_request => count( Database::where('customer', $userGUID)->stats );
    
    ]
   ```
6. Передать в JS для графика статистики запросов данные по дням и коллву посещений . Получить можно по SQL коду = JS -> days -> users 
   ```sql
   SELECT  FROM `requests_stats` WHERE  GROUP BY 

   DB::table(requests_stats)->select(DB::raw('updated_at ,COUNT(*)'))
   ->where('updated_at', '>=', DB::raw('CURDATE() - INTERVAL 1 MONTH'))->groupBy('day(updated_at)')
   ->get();
   ```







Верхний блок
1. Загруженность CPU - за последний час

		Прикаждом запросе записывать в БД показания CPU 
			id - unsigned int 
			persentage - TINYINT
			created_at - $table->dateTime('created_at');
http://stackoverflow.com/questions/1888544/how-to-select-records-from-last-24-hours-using-sql
		
		
		
		https://github.com/hisorange/browser-detect
		http://lyften.com/projects/laravel-geoip/doc/basic-usage.html
		
2. Загруженность RAM     

        $linfo = new Linfo;
        $parser = $linfo->getParser();

		На текущий момент 

3. Всего БД 
		На текущий момент 

4. Всего запросов ко всем бд
		На текущий момент 
		

Monthly Recap Report
Статистика по загруженности за месяц
     
SELECT COUNT(*), updated_at FROM `products` WHERE updated_at >= CURDATE() - INTERVAL 1 MONTH GROUP BY day(updated_at)

	 
	 			http://stackoverflow.com/questions/1888544/how-to-select-records-from-last-24-hours-using-sql
	 
Goal Completion -  удалить 

Низ процентные соотношения

1. Процент НОВЫХ IP по отношения ко вчера 
2. Всего запосов по суточно
3. Процент ошибок
4. Среднее коллво запросов в минуту 

Visitors Report по IP 
Справа GET POST PUT DELETE запросы 

Latest Members - удалить
Direct Chat - удалить


Browser Usage TO OS Usage

Recently Added Products - история по созданию , удалению и редактированию БД и таблиц - по времени 




```
<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TablesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tables', function (Blueprint $table) {

            $table->engine = 'InnoDB';
            $table->uuid('id')->unique();
            $table->uuid('database');
            $table->string('name');
            $table->enum('type', [
                'INT',
                'VARCHAR',
                'TEXT',
                'DATE',
                'TINYINT',
                'SMALLINT',
                'MEDIUMINT',
                'FLOAT',
                'DOUBLE',
                'REAL',
                'BOOLEAN',
                'DATETIME',
                'TIMESTAMP',
                'TIME',
                'YEAR',
                'CHAR',
                'TINYTEXT',
                'MEDIUMTEXT',
                'LONGTEXT',
                'BINARY',
                'VARBINARY',
                'BLOB',
                'ENUM'
            ]);
            $table->string('values')->nullable();;
            $table->string('default')->nullable();;
            $table->string('collation')->nullable();;
            $table->string('attributes')->nullable();;
            $table->boolean('NULL');
            $table->enum('index', [
                'PRIMARY',
                'UNIQUE',
                'INDEX',
                'FULLTEXT',
                'SPATIAL'
            ])->nullable();
            $table->boolean('ai');
            $table->text('comments');
            $table->integer('cache')->nullable();
            $table->timestamps();
            $table->foreign('database')->references('id')->on('databases')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tables');
    }
}
```
```<?php
   
   namespace App;
   
   use LaravelArdent\Ardent\Ardent;
   
   class Table extends Ardent
   {
       /**
        * Set not incremeniting ID.
        *
        * @var boolean
        */
       public $incrementing = false;
   
       /**
        * The table associated with the model.
        *
        * @var string
        */
       protected $table = 'tables';
   
       /**
        * The attributes that are mass assignable.
        *
        * @var array
        */
       protected $fillable = [
           'id', 'database', 'name', 'type', 'values', 'default', 'collation', 'attributes', 'NULL', 'index', 'ai', 'comments'
       ];
   
       /**
        * The attributes that should be hidden for arrays.
        *
        * @var array
        */
       protected $hidden = [];
   
       /**
        * Validators rules for Ardent validator
        *
        * @var array
        */
       public static $rules = [
           'id' => 'required|string|regex:/^[0-9A-Fa-f]{8}-[0-9A-Fa-f]{4}-[0-9A-Fa-f]{4}-[0-9A-Fa-f]{4}-[0-9A-Fa-f]{12}$/',
           'database' => 'required|string|exists:databases,id|regex:/^[0-9A-Fa-f]{8}-[0-9A-Fa-f]{4}-[0-9A-Fa-f]{4}-[0-9A-Fa-f]{4}-[0-9A-Fa-f]{12}$/',
           'name' => 'required|string',
           'type' => 'required|string|in:INT,VARCHAR,TEXT,DATE,TINYINT,SMALLINT,MEDIUMINT,FLOAT,DOUBLE,REAL,BOOLEAN,DATETIME,TIMESTAMP,TIME,YEAR,CHAR,TINYTEXT,TEXT,MEDIUMTEXT,LONGTEXT,BINARY,VARBINARY,BLOB,ENUM',
           'values' => 'string',
           'default' => 'string',
           'collation' => 'string',
           'attributes' => 'string',
           'NULL' => 'boolean',
           'index' => 'in:PRIMARY,UNIQUE,INDEX,FULLTEXT,SPATIAL|nullable',
           'ai' => 'boolean',
           'comments' => 'string',
           'cache' => 'int|nullable'
       ];
   
       /**
        * Get the customer of this database
        */
       public function relatedDataBase()
       {
           return $this->belongsTo('App\Database','id','database');
       }
   
       /**
        * Get the customer actions of this database
        */
       public function actions()
       {
           return $this->hasMany('App\CustomerAction','table');
       }
   }```
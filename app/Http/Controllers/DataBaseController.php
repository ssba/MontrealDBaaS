<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use DB;
use JavaScript;
use Webpatser\Uuid\Uuid;
use App\Database;
use Illuminate\Validation\ValidationException;


class DataBaseController extends Controller
{

    private $charsets = [
        'utf8' => [
            "utf8_general_ci",
            "utf8_bin",
            "utf8_croatian_ci",
            "utf8_croatian_mysql561_ci",
            "utf8_czech_ci",
            "utf8_danish_ci",
            "utf8_esperanto_ci",
            "utf8_estonian_ci",
            "utf8_general_mysql500_ci",
            "utf8_german2_ci",
            "utf8_hungarian_ci",
            "utf8_icelandic_ci",
            "utf8_latvian_ci",
            "utf8_lithuanian_ci",
            "utf8_myanmar_ci",
            "utf8_persian_ci",
            "utf8_polish_ci",
            "utf8_roman_ci",
            "utf8_romanian_ci",
            "utf8_sinhala_ci",
            "utf8_slovak_ci",
            "utf8_slovenian_ci",
            "utf8_spanish2_ci",
            "utf8_spanish_ci",
            "utf8_swedish_ci",
            "utf8_thai_520_w2",
            "utf8_turkish_ci",
            "utf8_unicode_520_ci",
            "utf8_unicode_ci",
            "utf8_vietnamese_ci"
        ]
    ];


    public function all(string $userGUID, Request $request)
    {
        $data = Database::where('customer', $userGUID)->get();

        JavaScript::put([
            'DBCharsets' => $this->charsets
        ]);

        return view('admin.db.all', ['data' => $data, 'title' => __('core.panel.tpl.databases.title') ]);
    }

    public function create(string $userGUID, Request $request)
    {
        $newDBID = (string)Uuid::generate(4);
        $result = Database::where('name', $request->name)->where('customer', $userGUID)->get();

        if (!$result->isEmpty())
            throw new \Exception("Error 40X");

        DB::transaction(function () use ($userGUID, $request, $newDBID) {

            $name = "A".md5($request->name . $userGUID);
            $query = "CREATE DATABASE " . $name . " DEFAULT CHARACTER SET " . $request->charset . " COLLATE " . $request->collation;
            DB::connection('mysql')->unprepared($query);

            $newDatabase = new Database([
                'id' => $newDBID,
                'customer' => $userGUID,
                'charset' => $request->charset,
                'name' => $request->name,
                'collation' => $request->collation,
                'options' => $request->options
            ]);

            if (!$newDatabase->save())
                throw new ValidationException($newDatabase->validationErrors());
        });

        return [
            'urls' => [
                "editDB" => route('DataBase:ManageDataBase', ['userGUID' => Auth::user()->id, 'dbGUID' => $newDBID]),
                "deleteDB" => route('DataBase:DeleteDataBase', ['userGUID' => Auth::user()->id, 'dbGUID' => $newDBID]),
                "DBtables" => route('DataTables:GetDataTables', ['userGUID' => Auth::user()->id, 'dbGUID' => $newDBID]),
            ],
            'translates' => [
                "getAllDBs_delete_db" => __('core.delete'),
                "getAllDBs_edit_db" => __('core.edit'),
                "getAllDBs_tables_of_db" => __('core.panel.tpl.tables.title')
            ]
        ];
    }

    /**
     *
     */
    public function getSingle(string $userGUID, string $dbGUID, Request $request)
    {

    }

    /**
     *
     */
    public function editSingle(string $userGUID, string $dbGUID)
    {
        $database = Database::where('id', $dbGUID)->where('customer', $userGUID)->firstOrFail();

        JavaScript::put([
            'DBCharsets' => $this->charsets
        ]);

        return view('admin.db.edit', ['database' => $database, 'title' => __('admin.getAllDBs_edit_db')]);
    }

    /**
     *
     */
    public function editSingleSave(string $userGUID, string $dbGUID, Request $request)
    {
        $database = Database::where('id', $dbGUID)->where('customer', $userGUID)->firstOrFail();

        DB::transaction(function () use ($request, $database, $userGUID) {

            $databaseRequest = $request->only( 'charset', 'collation', 'options');
            if (!empty( array_filter($databaseRequest) )) {

                $database_update = $database->update( $databaseRequest );

                if(!$database_update)
                    throw new ValidationException($database_update->errors());

                $database_name = "A".md5($request->name . $userGUID);
                $query = "ALTER DATABASE " . $database_name . " CHARACTER SET " . $request->charset . " COLLATE " . $request->collation;
                DB::connection('mysql')->unprepared($query);
            }

        });

        return 1;
    }


    /**
     *
     */
    public function deleteSingle(string $userGUID, string $dbGUID)
    {
        $database = Database::where('id', $dbGUID)->where('customer', $userGUID)->firstOrFail();

        DB::transaction(function () use ($database, $userGUID) {

            $name = "A".md5($database->name . $userGUID);
            $query = "DROP DATABASE IF EXISTS " . $name;

            DB::connection('mysql')->unprepared($query);

            $database->delete();

        });


        return 1;
    }

    /**
     *
     */
    public function getAllTables(string $userGUID, string $dbGUID, Request $request)
    {

    }

    /**
     *
     */
    public function getSingleTable(string $userGUID, string $dbGUID, Request $request)
    {

    }

    /**
     *
     */
    public function editSingleTable(string $userGUID, string $dbGUID, string $tGUID, Request $request)
    {

    }

    /**
     *
     */
    public function editSingleTableSave(string $userGUID, string $dbGUID, string $tGUID, Request $request)
    {

    }
}
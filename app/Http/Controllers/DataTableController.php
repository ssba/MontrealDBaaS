<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Database;
use App\Table;
use Uuid;
use DB;
use Auth;
use Illuminate\Validation\ValidationException;

class DataTableController extends Controller
{
    /**
     *
     */
    public function all(string $dbGUID, Request $request)
    {
        $db = Database::where('id', $dbGUID)->where('customer', Auth::user()->id)->firstOrFail();
        $tables = $db->tables;

        return view('admin.tables.all', ['db' => $db, 'table' => $tables, 'title' => __('core.panel.tpl.tables.title') ]);
    }

    /**
     *
     */
    public function getSingle(string $dbGUID, string $tGUID, Request $request)
    {

    }

    /**
     *
     */
    public function create(string $dbGUID, Request $request)
    {
        $newTableID = (string)Uuid::generate(4);
        $userGUID = Auth::user()->id;
        $database = Database::where('id', $dbGUID)->where('customer', $userGUID)->firstOrFail();
        $newTable = null;
        DB::transaction(function () use ($database, $request, $newTableID, $userGUID, &$newTable) {

            $dbname = "A".md5($database->name . $userGUID);
            $query = "CREATE TABLE IF NOT EXISTS `".$dbname."`.`".$request->name."` (`id` VARCHAR(36) CHARACTER SET ".$database->charset." COLLATE ".$database->collation." NOT NULL) ENGINE = InnoDB CHARSET=".$database->charset." COLLATE ".$database->collation." COMMENT = '".$request->comment."' ; ";
            $query .= "ALTER TABLE `".$dbname."`.`".$request->name."` ADD PRIMARY KEY (`id`);";

            DB::connection('mysql')->unprepared($query);

            $newTable = new Table([
                'id' => $newTableID,
                'database' => $database->id,
                'name' => $request->name,
                'collation' => $request->collation,
                'charset' => $request->charset,
                'comment' => $request->comment,
                'cache' => (int)$request->cache
            ]);

            if (!$newTable->save())
                throw new ValidationException($newTable->errors());


        });

        return [
            'urls' => [
                "editTable" => route('DataTables:ManageDataTableAction', ['dbGUID' => $database->id, 'tGUID' => $newTableID]),
                "deleteTable" => route('DataTables:DeleteDataTable', ['dbGUID' => $database->id, 'tGUID' => $newTableID]),
                "DTRows" => "Rows",
            ],
            'translates' => [
                "delete_table" => __('core.delete'),
                "edit_table" => __('core.edit'),
                "tables_rows" => "Rows"
            ],
            'meta' => [
                "updated_at" => $newTable->updated_at->format('Y-m-d H:i:s'),
                "created_at" => $newTable->created_at->format('Y-m-d H:i:s'),
            ]
        ];
    }


    /**
     *
     */
    public function editSingle(string $dbGUID, string $tGUID)
    {

    }

    /**
     *
     */
    public function editSingleSave(string $dbGUID, string $tGUID, Request $request)
    {

    }

    /**
     *
     */
    public function deleteSingle(string $dbGUID, string $tGUID, Request $request)
    {
        $userGUID = Auth::user()->id;
        $database = Database::where('id', $dbGUID)->where('customer', $userGUID)->firstOrFail();

        $db = Database::where('id', $dbGUID)->where('customer', Auth::user()->id)->firstOrFail();
        $table = $db->tables()->where('id', $tGUID)->firstOrFail();

        DB::transaction(function () use ($database, $table, $userGUID) {

            $name = "A".md5($database->name . $userGUID);
            $query = "DROP TABLE IF EXISTS `".$name."`.`".$table->name."`";

            DB::connection('mysql')->unprepared($query);

            $table->delete();

        });


        return 1;

    }
}

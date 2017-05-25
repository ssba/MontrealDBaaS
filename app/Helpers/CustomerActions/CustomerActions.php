<?php

namespace App\Helpers\CustomerActions;

use App\CustomerAction as CustomerActionsModel;
use Auth;

class CustomerActions
{


    public function __construct()
    {

    }

    public function getActions($limit = 5)
    {
        $actions = [];
        $data = CustomerActionsModel::where('customer', Auth::user()->id)
            ->orderBy('created_at', 'asc')->limit((int)$limit)->with('relatedDataBase')->with('relatedTable')->get();

        foreach ($data as $item) {

            if (!is_null($item->relatedDataBase)) {
                $name = $item->relatedDataBase->name;
                $title = 'Database';
                if (!is_null($item->relatedTable)) {
                    $title = 'Table';
                    $name = $item->relatedDataBase->name . "@" . $item->relatedTable->name;
                }
            } else {
                $title = 'Generic';
                $name = null;
            }

            $actions[] = [

                "type" => $item['type'],
                "description" => $item['description'],
                "title" => $title,
                "name" => $name

            ];

        }
        return $actions;
    }

}
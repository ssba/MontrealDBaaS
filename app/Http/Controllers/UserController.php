<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Database;
use App\RequestStats;
use CPUStats as CPUStatsHelper;
use Linfo\Linfo;

class UserController extends Controller
{

    /**
     *
     */
    public function home (string $userGUID,  Request $request){

        $linfo = new Linfo;
        $affectedID = [];
        $ram = $linfo->getParser()->getRam();

        $ram_used = round(($ram['free'] / $ram['total']) * 100);
        $databases = Database::where('customer', $userGUID)->get();
        foreach ($databases as $item)
            $affectedID[] = $item->id;

        $data = [
            "cpu" => CPUStatsHelper::getInterval30Minutes(),
            "ram" => $ram_used,
            "db" => Database::where('customer', $userGUID)->count(),
            "requests" => RequestStats::whereIn('database', $affectedID)->count(),
        ];

        return view('admin.user.home', ['data' => $data, 'title' => __('admin.admin_home') ]);
    }

    /**
     *
     */
    public function stats (string $userGUID,  Request $request){

    }

    /**
     *
     */
    public function settings (string $userGUID,  Request $request){

    }

    /**
     *
     */
    public function saveSettings (string $userGUID, Request $request){

    }
}
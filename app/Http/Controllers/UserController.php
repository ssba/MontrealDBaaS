<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Linfo\Linfo;

class UserController extends Controller
{

    /**
     *
     */
    public function home (string $userGUID,  Request $request){

        $linfo = new Linfo;
        $parser = $linfo->getParser();


        $ss = 654654456564456456;

        return view('admin.user.home', ['title' => __('admin.admin_home') ]);
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
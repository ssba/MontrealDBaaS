<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{

    /**
     *
     */
    public function home (string $userGUID,  Request $request){

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
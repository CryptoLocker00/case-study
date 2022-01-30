<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Services\UserService;

class HomeController extends Controller
{
    public function index()
    {
        $users = (new UserService)->all();

        return view('backend.user.index', compact('users'));
    }
}

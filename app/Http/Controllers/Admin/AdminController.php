<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;

class AdminController extends Controller
{
    public function index()
    {
        if($is_admin = 1){
        $users = User::all();

        return view('admin.index', compact('users'));
        }
    }
}

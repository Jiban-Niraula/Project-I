<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    //

    public function index(){
        $users = User::where('is_deleted', false)->get();
        return view('admin.users.index', compact('users'));
    }
}

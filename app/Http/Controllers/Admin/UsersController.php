<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    //

    public function index(){
<<<<<<< HEAD
        $users = User::all();
=======
        $users = User::where('is_deleted', false)->get();
>>>>>>> 8de0a9524c2f700101684a16472758e507afcee5
        return view('admin.users.index', compact('users'));
    }

    public function edit($users_id) {
        $user = User::find($users_id);
        if (!$user) {
            return redirect('admin/users')->with('error', 'User not found!');
        }
        return view('admin.users.edit', compact('user'));
    }
    
}

    
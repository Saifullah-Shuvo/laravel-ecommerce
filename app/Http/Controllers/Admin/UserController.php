<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function allUsers(){
        $usercount = User::all();
        $users = User::latest()->paginate(15);
        return view('admin.users.allUsers',compact('users','usercount'));
    }
}

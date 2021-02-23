<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UserController extends Controller
{
    public function getUsers() {
        return User::with(['organization', 'role'])->paginate(20);
    }
}

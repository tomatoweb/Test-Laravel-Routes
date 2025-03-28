<?php

namespace App\Http\Controllers;

use App\Models\User;

class UserController extends Controller
{
    public function show($name)
    {
        $user = User::where('name', $name)->first();
        dd($user);
        if (!$user) {
            return view('users.notfound');
        }

        return view('users.show', compact('user'));
    }
}

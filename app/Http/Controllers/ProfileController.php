<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class ProfileController extends Controller {
    public function index() {
        $user = User::get()->first();

        return view("profile.index", compact("user"));
    }

    public function modify(Request $request) {
        $user = User::get()->first();

        $user->username = $request->input("username");
        $user->password = $request->input("password");

        $user->save();

        return back()->with("success", "Изменения сохранены!");
    }
}

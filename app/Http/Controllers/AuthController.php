<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;

use App\Models\Client;
use App\Models\Client_photo;

class AuthController extends Controller
{
    public function clientLogin() {
        if (session()->has("client_id")) {
            return redirect("/gallery");
        }

        return view("login.userLogin");
    }

    public function clientAuth(Request $request) {
        $access_code = $request->get("access_code");

        $client_info = Client::where("access_code", $access_code)->first();

        if (!$client_info) {
            return back()->withErrors(["access_code" => "Неверный код доступа!"]);
        }

        session(["client_id" => $client_info->id]);

        return redirect("/gallery");
    }

    public function clientLogout() {
        session()->flush();

        return redirect("/");
    }

    public function adminLogin() {
        if (session()->has("admin_id") && session("admin_auth") == true) {
            return redirect("/dashboard");
        }

        return view("login.adminLogin");
    }

    public function adminAuth(Request $request) {
        $username = $request->get("username");
        $password = $request->get("password");

        $userInfo = User::where("username", $username)->where("password", $password)->first();

        if (!$userInfo) {
            return back()->withErrors(["invalid_data" => "Неверный логин или пароль!"]);
        }

        session(["admin_id" => $userInfo->id, "admin_auth" => true]);

        return redirect("/dashboard");
    }

    public function adminLogout() {
        session()->flush();

        return redirect("/");
    }
}
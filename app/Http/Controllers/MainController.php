<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function index() {
        $services = Service::all();

        return view("main", compact("services"));
    }
}

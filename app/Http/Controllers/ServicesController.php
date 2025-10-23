<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;

class ServicesController extends Controller
{
    public function index() {
        $services = Service::all();
        
        return view("services.index", compact("services"));
    }

    public function edit(Service $service) {
        return view("services.edit", compact("service"));
    }

    public function modify(Request $request, Service $service) {
        $service->heading = $request->input("heading");
        $service->text = $request->input("text");
        $service->save();

        return back()->with("success", "Операция успешна!");
    }
}

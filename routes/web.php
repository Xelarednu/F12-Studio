<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ClientsController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\MailController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\PhotoExamplesController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SamplesController;
use App\Http\Controllers\ServicesController;
use App\Http\Middleware\EnsureAdminAuth;
use App\Http\Middleware\EnsureClientAuth;
use App\Mail\Message;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;

Route::fallback(function () {
    return redirect('/');
});

Route::get("/", [MainController::class, "index"]);

// Client auth
Route::prefix("client")->name("client.")->group(function(){
    Route::get("/login", [AuthController::class, "clientLogin"])->name("login");
    Route::post("/login", [AuthController::class, "clientAuth"])->name("login");
    Route::get("/logout", [AuthController::class, "clientLogout"])->name("logout");
});

// Admin auth
Route::prefix("admin")->name("admin.")->group(function(){
    Route::get("/login", [AuthController::class, "adminLogin"])->name("login");
    Route::post("/login", [AuthController::class, "adminAuth"])->name("login");
    Route::get("/logout", [AuthController::class, "adminLogout"])->name("logout");
});

Route::middleware(["adminAuth"])->group(function() {
    Route::get("/dashboard", [DashboardController::class, "index"]);

    Route::get("/profile", [ProfileController::class, "index"]);
    Route::post("/profile", [ProfileController::class, "modify"]);

    Route::get("/clients", [ClientsController::class, "index"]);
    Route::get("/clients/new", [ClientsController::class, "create"]);
    Route::post("/clients/new", [ClientsController::class, "store"]);

    Route::post("/group/new", [ClientsController::class, "storeGroup"]);

    Route::post("/search", [ClientsController::class, "search"]);

    Route::get("/client/delete/{client}", [ClientsController::class, "remove"]);
    Route::get("/client/edit/{client_data}", [ClientsController::class, "edit"]);
    Route::post("/client/edit/{client}", [ClientsController::class, "modify"]);
    Route::get("/client/view/{clientData}", [ClientsController::class, "view"]);

    Route::get("/examples", [PhotoExamplesController::class, "edit"]);
    Route::post("/examples/upload", [PhotoExamplesController::class, "upload"]);
    Route::get("/examples/delete/{photo}", [PhotoExamplesController::class, "remove"]);

    Route::get("/chosen_photos", [GalleryController::class, "show"]);
    Route::get("/client/addPhoto/{client}", [GalleryController::class, "add"]);
    Route::post("/client/addPhoto/{client}", [GalleryController::class, "storeClientPhoto"]);
    Route::get("/client/deletePhoto/{photo}", [GalleryController::class, "remove"]);

    Route::get("/services", [ServicesController::class, "index"]);
    Route::get("/service/edit/{service}", [ServicesController::class, "edit"]);
    Route::post("/service/edit/{service}", [ServicesController::class, "modify"]);

    Route::get("/admin/examples", [SamplesController::class, "edit"]);

    Route::post("/samples/upload/{option}", [SamplesController::class, "upload"]);
    Route::get("/sample/delete/{photo}", [SamplesController::class, "remove"]);
});

Route::post("/send-message", [MailController::class, "send"])->name("contact.show");

// Samples page
Route::get("/samples", [SamplesController::class, "index"]);
Route::post("/samples/1", [SamplesController::class, "updateFirst"])->middleware(EnsureAdminAuth::class);
Route::post("/samples/2", [SamplesController::class, "updateSecond"])->middleware(EnsureAdminAuth::class);
Route::post("/samples/3", [SamplesController::class, "updateThird"])->middleware(EnsureAdminAuth::class);


Route::get("/photoExamples", [photoExamplesController::class, "index"]);

Route::get("/gallery", [GalleryController::class, "index"])->middleware(EnsureClientAuth::class);
Route::post("/gallery", [GalleryController::class, "store"])->middleware(EnsureClientAuth::class);
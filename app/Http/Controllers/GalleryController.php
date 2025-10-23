<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Client_photo;
use App\Models\Selected_photo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class GalleryController extends Controller {
    public function index() {
        $client_id = session("client_id");

        $client_info = Client::where("id", $client_id)->first();

        $photos = Client_photo::where('client_id', $client_id)->paginate(10)->through(function ($photo) {
                $imagePath = public_path("images/clientPhotos/" . $photo->file_name);
                $imageInfo = file_exists($imagePath) ? getimagesize($imagePath) : null;

                return [
                    'file_name' => $photo->file_name,
                    'id' => $photo->id,
                    'width' => $imageInfo[0] ?? null,
                    'height' => $imageInfo[1] ?? null,
                ];
            });

        return view("gallery.index", compact("client_info", "photos"));
    }

    public function store(Request $request) {
        $selected_ids = $request->input("selected_photos");

        for ($i = 0; $i < count($selected_ids) ; $i++) {
            $selected_photos = new Selected_photo;

            $selected_photos->client_id = session("client_id");

            $selected_photos->photo_id = $selected_ids[$i];

            $selected_photos->save();
        }

        return redirect("/gallery");
    }

    public function show() {
        $clients = Client::all();
        
        return view("gallery.show", compact("clients"));
    }

    public function add(Client $client) {
        $photos = Client_photo::where('client_id', $client->id)->paginate(5)->through(function ($photo) {
                $imagePath = public_path("images/" . $photo->file_name);
                $imageInfo = file_exists($imagePath) ? getimagesize($imagePath) : null;

                return [
                    'file_name' => $photo->file_name,
                    'id' => $photo->id,
                    'width' => $imageInfo[0] ?? null,
                    'height' => $imageInfo[1] ?? null,
                ];
            });

        return view("gallery.add", compact("client", "photos"));
    }

    public function storeClientPhoto(Request $request, Client $client) {
        $request->validate([
            "photos.*" => "required|image|mimes:jpeg,png,jpg,svg"
        ]);

      if ($request->hasFile("photos")) {
        foreach ($request->file("photos") as $file) {
          $originalName = $file->getClientOriginalName();

          $file->move(public_path("images/clientPhotos/"), $originalName);

          $photo = new Client_photo;

          $photo->file_name = $originalName;
          $photo->client_id = $client->id;

          $photo->save();
        }

        return redirect()->back()->with('success', 'Фото успешно загружены!');
      }

      return redirect()->back()->withErrors(['error' => 'Что-то пошло не так! Фото не были загружены.']);
    }

    public function remove(Client_photo $photo) {
        $photo->delete();

        $filePath = public_path("images/clientPhotos/" . $photo->file_name);

        if (file_exists($filePath)) {
            unlink($filePath);
        }

        return redirect()->back()->with('success', 'Фото удалено');
    }
}
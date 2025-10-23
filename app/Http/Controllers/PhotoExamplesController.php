<?php

namespace App\Http\Controllers;

use App\Models\Example_photo;
use Illuminate\Http\Request;

class PhotoExamplesController extends Controller {
    public function index() {
        $photos = Example_photo::all()->map(function ($photo) {
            $imagePath = public_path("images/examplePhotos/" . $photo->file_name);
            $imageInfo = file_exists($imagePath) ? getimagesize($imagePath) : null;
            return [
              'file_name' => $photo->file_name,
              'width' => $imageInfo[0] ?? null,
              'height' => $imageInfo[1] ?? null,
            ];
          });

        return view("photoExamples.index", compact("photos"));
    }

    public function edit() {
      $photos = Example_photo::paginate(5)->through(function ($photo) {
            $imagePath = public_path("images/examplePhotos/" . $photo->file_name);
            $imageInfo = file_exists($imagePath) ? getimagesize($imagePath) : null;

            return [
              'file_name' => $photo->file_name,
              'id' => $photo->id,
              'width' => $imageInfo[0] ?? null,
              'height' => $imageInfo[1] ?? null,
            ];
          });

      return view("photoExamples.edit", compact("photos"));
    }

    public function upload(Request $request) {
      $request->validate([
        "photos.*" => "required|image|mimes:jpeg,png,jpg,svg"
      ]);

      if ($request->hasFile("photos")) {
        foreach ($request->file("photos") as $file) {
          $originalName = $file->getClientOriginalName();

          $file->move(public_path("images/examplePhotos/"), $originalName);

          $photo = new Example_photo;

          $photo->file_name = $originalName;

          $photo->save();
        }

        return redirect()->back()->with('success', 'Фото успешно загружены!');
      }

      return redirect()->back()->withErrors(['error' => 'Что-то пошло не так! Фото не были загружены.']);
    }

    public function remove(Example_photo $photo) {
        $photo->delete();

        $filePath = public_path("images/examplePhotos/" . $photo->file_name);

        if (file_exists($filePath)) {
            unlink($filePath);
        }

        return redirect()->back()->with('success', 'Фото удалено');
    }
}

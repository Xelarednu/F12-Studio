<?php

namespace App\Http\Controllers;

use App\Models\Sample_option;
use App\Models\Sample_photo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SamplesController extends Controller
{
    public function index() {
        $photos = Sample_photo::all()->map(function ($photo) {
                $imagePath = public_path("images/samplePhotos/" . $photo->file_name);
                $imageInfo = file_exists($imagePath) ? getimagesize($imagePath) : null;

                return [
                    'file_name' => $photo->file_name,
                    'id' => $photo->id,
                    'option_id' => $photo->option_id,
                    'width' => $imageInfo[0] ?? null,
                    'height' => $imageInfo[1] ?? null,
                ];
            });

        $firstVariantData = json_decode(Storage::get("firstVariant.json"));
        $secondVariantData = json_decode(Storage::get("secondVariant.json"));
        $thirdVariantData = json_decode(Storage::get("thirdVariant.json"));

        $firstVariantContent = $firstVariantData;
        $secondVariantContent = $secondVariantData;
        $thirdVariantContent = $thirdVariantData;

        if (session("admin_auth") == true) {
            return view("samples.adminIndex", compact("firstVariantContent", "secondVariantContent", "thirdVariantContent", "photos"));
        }

        return view("samples.clientIndex", compact("firstVariantContent", "secondVariantContent", "thirdVariantContent", "photos"));
    }

    public function updateFirst(Request $request) {
        $title = $request->title;
        $subTitle = $request->subTitle;
        $pages = $request->pages;
        $albumInsides = json_decode($request->albumInsides, true);
        $priceIncludes = json_decode($request->priceIncludes, true);
        $albumPrice = $request->albumPrice;
        $albumExample = $request->albumExample;

        $json = Storage::get('firstVariant.json');
        $data = json_decode($json);

        $data->title = $title;
        $data->subTitle = $subTitle;
        $data->pages = $pages;

        foreach ($albumInsides as $index => $content) {
            $data->insideAlbum[$index] = $content;
        }

        foreach ($priceIncludes as $index => $content) {
            $data->priceIncludes[$index] = $content;
        }

        $data->albumPrice = $albumPrice;
        $data->albumExample = $albumExample;

        Storage::put('firstVariant.json', json_encode($data, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT));
        
        return redirect()->back();
    }

    public function updateSecond(Request $request) {
        $title = $request->title2;
        $subTitle = $request->subTitle2;
        $pages = $request->pages2;
        $priceIncludes = json_decode($request->priceIncludes2, true);
        $albumPrice = $request->albumPrice2;
        $albumExample = $request->albumExample2;

        $json = Storage::get('secondVariant.json');
        $data = json_decode($json);

        $data->title = $title;
        $data->subTitle = $subTitle;
        $data->pages = $pages;

        foreach ($priceIncludes as $index => $content) {
            $data->priceIncludes[$index] = $content;
        }

        $data->albumPrice = $albumPrice;
        $data->albumExample = $albumExample;

        Storage::put('secondVariant.json', json_encode($data, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT));
        
        return redirect()->back();
    }

    public function updateThird(Request $request) {
        $title = $request->title3;
        $subTitle = $request->subTitle3;
        $hardPages = $request->hardPages;
        $hardPages2 = $request->hardPages2;
        $sometext = $request->someText;
        $pages = $request->pages3;
        $priceIncludes = json_decode($request->priceIncludes3, true);
        $albumPrice = $request->albumPrice3;
        $albumExample = $request->albumExample3;

        $json = Storage::get('thirdVariant.json');
        $data = json_decode($json);

        $data->title = $title;
        $data->subTitle = $subTitle;
        $data->hardPages = $hardPages;
        $data->hardPages2 = $hardPages2;
        $data->someText = $sometext;
        $data->pages = $pages;

        foreach ($priceIncludes as $index => $content) {
            $data->priceIncludes[$index] = $content;
        }

        $data->albumPrice = $albumPrice;
        $data->albumExample = $albumExample;

        Storage::put('thirdVariant.json', json_encode($data, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT));
        
        return redirect()->back();
    }

    public function edit() {
        $photos = Sample_photo::all();

        return view("samples.edit", compact("photos"));
    }

    public function upload(Request $request, Sample_option $option) {
      if ($request->hasFile("photos")) {
        foreach ($request->file("photos") as $file) {
          $originalName = $file->getClientOriginalName();

          $file->move(public_path("images/samplePhotos/"), $originalName);

          $photo = new Sample_photo;

          $photo->file_name = $originalName;
          $photo->option_id = $option->id;

          $photo->save();
        }

        return redirect()->back()->with('success', 'Фото успешно загружены!');
      }

      return redirect()->back()->withErrors(['error' => 'Что-то пошло не так! Фото не были загружены.']);
    }

    public function remove(Sample_photo $photo) {
        $photo->delete();

        $filePath = public_path("images/samplePhotos/" . $photo->file_name);

        if (file_exists($filePath)) {
            unlink($filePath);
        }

        return redirect()->back()->with('success', 'Фото удалено');
    }
}
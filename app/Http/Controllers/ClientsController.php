<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Client_photo;
use App\Models\Example_photo;
use App\Models\Group;
use App\Models\Selected_photo;
use Illuminate\Http\Request;

class ClientsController extends Controller
{
    public function index()
    {
        $clients = Client::paginate(5);

        $groups = Group::all();

        return view("clients.index", compact("clients", "groups"));
    }

    public function search(Request $request)
    {
        $groups = Group::all();

        $lastname = $request->input("lastname");
        $group_id_selection = $request->input("groupSelection");

        $group_name = $request->input("groupInput");
        $group_id_input = Group::where("group_name", $group_name)->value("id");


        $query = Client::query();

        if (!empty($lastname)) {
            $query->where("last_name", $lastname);
        }

        if (!empty($group_id_selection)) {
            $query->orWhere('group_id', $group_id_selection);
        }

        if (!empty($group_id_input)) {
            $query->orWhere('group_id', $group_id_input);
        }

        $clients = $query->paginate(5);

        return view("clients.index", compact("clients", "groups"));
    }

    public function create()
    {
        $groups = Group::all();

        return view("clients.create", compact("groups"));
    }

    public function store(Request $request)
    {
        function codeGenerator()
        {
            $length = 10;
            $characters = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz';
            $charactersLength = strlen($characters);
            $code = "";

            for ($i = 0; $i < $length; $i++) {
                $code .= $characters[rand(0, $charactersLength - 1)];
            }

            $existingCode = Client::where("access_code", $code);

            if ($existingCode == $code) {
                codeGenerator();
            }

            return $code;
        }

        $validatedData = $request->validate([
            "firstName" => "required",
            "lastname" => "required"
        ]);

        $client = new Client;

        $client->first_name = $validatedData["firstName"];
        $client->last_name = $validatedData["lastname"];
        $client->group_id = $request->input("groups");
        $client->access_code = codeGenerator();

        $client->save();

        return back()->with("success", "Операция успешна!");
    }

    public function storeGroup(Request $request)
    {
        $groupName = $request->input("group");

        $group = new Group;

        $group->group_name = $groupName;

        $group->save();

        return back()->with("success", "Операция успешна!");
    }

    public function edit(Client $client_data)
    {
        $client = Client::where("id", $client_data->id)->first();

        return view("clients.edit", compact("client"));
    }

    public function modify(Client $client, Request $request)
    {
        $validatedData = $request->validate([
            'firstName' => 'required|string|max:255',
            'lastname' => 'required|string|max:255',
            'accessCode' => 'required|string|max:255',
            'group' => 'present|nullable|string|max:255',
        ]);

        if ($validatedData['group'] != "") {
            $group_id = Group::where("group_name", $validatedData['group'])->value("id");

            if (!$group_id) {
                return back()->withErrors(["group_not_found" => "Такой группы не найдено!"]);
            }
        } else {
            $group_id = null;
        }

        $client->first_name = $validatedData['firstName'];
        $client->last_name = $validatedData['lastname'];
        $client->access_code = $validatedData['accessCode'];
        $client->group_id = $group_id;
        $client->save();

        return back()->with("success", "Операция успешна!");
    }

    public function view(Client $clientData)
    {
        $client = Client::where("id", $clientData->id)->first();

        $selectedPhotoIds = Selected_photo::where('client_id', $client->id)->pluck('photo_id')->toArray();

        $photos = Client_photo::whereIn('id', $selectedPhotoIds)->paginate(5)->through(function ($photo) {
                $imagePath = public_path("images/clientPhotos" . $photo->file_name);
                $imageInfo = file_exists($imagePath) ? getimagesize($imagePath) : null;

                return [
                    'file_name' => $photo->file_name,
                    'id' => $photo->id,
                    'width' => $imageInfo[0] ?? null,
                    'height' => $imageInfo[1] ?? null,
                ];
            });

        return view("clients.view", compact("client", "photos"));
    }

    public function remove(Client $client)
    {
        $client->delete();

        return redirect("/clients");
    }
}

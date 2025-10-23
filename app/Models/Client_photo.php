<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client_photo extends Model
{
    use HasFactory;

    protected $table = "client_photos";

    public $timestamps = false;

    protected $fillable = ["file_name"];

    public function client() {
        return $this -> belongsTo(Client::class, "client_id");
    }

    public function group() {
        return $this -> belongsTo(Group::class, "group_id");
    }

    public function selected_photo() {
        return $this -> hasMany("App/Models/Selected_photo");
    }
}

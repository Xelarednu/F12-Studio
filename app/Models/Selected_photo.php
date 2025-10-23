<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Selected_photo extends Model
{
    use HasFactory;

    protected $table = "selected_photos";

    public $timestamps = false;

    protected $fillable = ["is_selected"];

    public function client_photo() {
        return $this -> belongsTo(Client_photo::class, "photo_id");
    }

    public function client() {
        return $this -> belongsTo(Client::class, "client_id");
    }
}

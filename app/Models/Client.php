<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;
    
    protected $table = "clients";

    public $timestamps = false;

    protected $fillable = ["first_name", "  last_name", "access_code"];

    public function group() {
        return $this -> belongsTo(Group::class, "group_id");
    }

    public function client_photo() {
        return $this -> hasMany("App/Models/Client_photo");
    }

    public function selected_photo() {
        return $this -> hasMany("App/Models/Selected_photo");
    }
}

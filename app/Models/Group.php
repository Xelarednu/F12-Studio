<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    use HasFactory;
    
    protected $table = "groups";

    public $timestamps = false;

    protected $fillable = ["group_name"];

    public function client() {
        return $this -> hasMany("App/Models/Client");
    }

    public function client_photo() {
        return $this -> hasMany("App/Models/Client_photo");
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sample_option extends Model
{
    use HasFactory;

    protected $table = "samples_options";

    public $timestamps = false;

    protected $fillable = ["option_name"];

    public function sample_photo() {
        return $this -> hasMany("App/Models/Sample_photo");
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Example_photo extends Model
{
    use HasFactory;

    protected $table = "example_photos";

    public $timestamps = false;

    protected $fillable = ["file_name"];
}

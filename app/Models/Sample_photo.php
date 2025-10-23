<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sample_photo extends Model {
    use HasFactory;

    protected $table = "sample_photos";

    public $timestamps = false;

    protected $fillable = ["file_name"];

    public function sample_option() {
        return $this -> belongsTo(Sample_option::class, "id");
    }
}

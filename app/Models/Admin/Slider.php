<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Slider extends Model
{
    protected $table = "sliders";

    protected $fillable = [
        'title',
        'description',
        'image',
    ];
    use HasFactory;
}

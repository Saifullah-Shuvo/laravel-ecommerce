<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Testimonial extends Model
{
    use HasFactory;
    protected $table = 'testimonials';

    protected $fillable = [
        'name',
        'profession',
        'company',
        'image',
        'text',
    ];
}

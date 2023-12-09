<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Coupon extends Model
{
    protected $table = 'coupons';
    protected $fillable = [
        'coupon',
        'discount_type',
        'discount_value',
        'expiry_date',
        'status',
    ];
    use HasFactory;
}

<?php

namespace App\Models\frontend\pages;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;
    protected $fillable = [
        'product_id','user_id',
        'user_type','product_attr_id',
        'qty','date'
        ];
}

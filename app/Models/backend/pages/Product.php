<?php

namespace App\Models\backend\pages;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = [
    		'name',
    		'cat_id',
    		'sub_cat_id',
    		'brand_id',
    		'size_id',
    		'color_id',
    		'price',
    		'mrp',
    		'description',
    		'image',
    		'warranty',
    		'banner_id',
    		'slider_id',
    		'date',
    		'status',
    	];
}

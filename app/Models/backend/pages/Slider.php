<?php

namespace App\Models\backend\pages;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Slider extends Model
{
    use HasFactory;
    protected $fillable= ['title','price','short_desc','image','status','btn_name'];
}

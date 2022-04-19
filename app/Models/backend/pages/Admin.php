<?php

namespace App\Models\backend\pages;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    use HasFactory;
    protected $fillable = ['name','email','password','image','role','forgot_password','rand_id',];

}

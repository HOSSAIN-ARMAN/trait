<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Production extends Model
{
    protected $fillable = ['production_name', 'production_img_one', 'production_img_two', 'production_img_three', 'image_size'];
}

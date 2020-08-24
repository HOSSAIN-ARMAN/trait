<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductTable extends Model
{
    protected $fillable=['product_name', 'product_code', 'description', 'product_img'];
}

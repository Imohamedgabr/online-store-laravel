<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    //we need this so we can add data from a seeder easier
    protected $fillable = ['imagePath','title','description','price'];
}

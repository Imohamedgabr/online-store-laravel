<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    //we need this so we can add data from a seeder easier
    protected $fillable = ['imagePath','title','description','price'];

    public function category()
    {
    	return $this->belongsTo('App\Category');
    }

    public function ratings()
    {
    	return $this->hasMany('App\Rating');
    }
}

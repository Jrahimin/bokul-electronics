<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    protected $fillable = [
        'category_id',
        'title',
        'model',
        'company',
        'description',
        'date'
    ];

    public function sells()
    {
        return $this->hasMany('App\Sell');
    }
    
    public function category()
    {
        return $this->belongsTo('App\Category');
    }

    public function stocks()
    {
        return $this->hasMany('App\Stock');
    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Stock extends Model
{
    protected $fillable=['item_id','sold','numberOfItems','price','user_id','date'];


    public function item()
    {
        return $this->belongsTo('App\Item');
    }
    
    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function sells()
    {
        return $this->hasMany('App\Sell');
    }
}

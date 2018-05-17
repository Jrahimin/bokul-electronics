<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer_detail extends Model
{
    protected $guarded = ['submit'];

    public function customer()
    {
        return $this->belongsTo('App\Customer', 'cust_id');
    }
}

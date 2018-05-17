<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $fillable=[
        'name', 'type','address', 'date', 'phone','email','nationalId','dateOfBirth'
    ];


    public function sells()
    {
        return $this->hasMany('App\Sell', 'cust_id');
    }

    public function details()
    {
        return $this->hasMany('App\Customer_detail');
    }

    public function installments()
    {
        return $this->hasMany('App\Installment', 'cust_id');
    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Installment extends Model
{
    protected $guarded = ['submitInstall', 'instal_id'];

    public function sells()
    {
        return $this->hasMany('App\Sell', 'instal_id');
    }
	
	    public  function customer()
    {
        return $this->belongsTo('App\Customer', 'cust_id');
    }

    public function installment_payments()
    {
        return $this->hasMany('App\Installment_payment','instal_id');
    }
}

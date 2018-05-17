<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sell extends Model
{
    protected $fillable =[
        'no_item',
        'sell_price',
        'sell_type',
        'date',
        'serial_no',
        'item_id',
        'user_id',
        'instal_id',
        'cust_id',
        'stock_id'
    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }
    
    public function item()
    {
        return $this->belongsTo('App\Item');
    }

    public function installment()
    {
        return $this->belongsTo('App\Installment', 'install_id');
    }

    public function stock()
    {
        return $this->belongsTo('App\Stock');
    }
    
    public function customer()
    {
        return $this->belongsTo('App\Customer', 'cust_id');
    }
}

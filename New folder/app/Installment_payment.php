<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Installment_payment extends Model
{
    protected $guarded = ['ifInterest', 'interest', 'submitPayInstall'];
}

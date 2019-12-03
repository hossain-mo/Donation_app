<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PaymentTransactionDonor extends Model
{
    public  $fillable = ['payment_transaction_id','name','mobile'];
    
    public $timestamps = false;

    public function payment()
    {
        return $this->belongsToMany(PaymentTransaction::class);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PaymentTransaction extends Model
{
    public  $fillable = ['project_id','amount','remaining'];

    public function users(){
        return $this->belongsToMany('App\Models\users');
    }
    public function project(){
        return $this->belongsTo(Project::class);
    }
    public function donor(){
        return $this->hasOne(PaymentTransactionDonor::class);
    }
}

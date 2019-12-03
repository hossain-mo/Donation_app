<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;
use Wildside\Userstamps\Userstamps;
use Spatie\Translatable\HasTranslations;

class Country extends Model
{
    use Userstamps, HasTranslations;
  public  $fillable = ['name' ,'id'];

  public  $translatable = ['name'];

    public function village(){
      return $this->hasMany('App\Models\Village');
    }
    public function createdUser(){
      return $this->belongsTo(User::class,'created_by','id');
    }

}

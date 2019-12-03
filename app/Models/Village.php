<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Wildside\Userstamps\Userstamps;
use Spatie\Translatable\HasTranslations;

class Village extends Model
{

   use Userstamps, HasTranslations;
   public  $fillable = ['name' ,'country_id',];

   public  $translatable = ['name'];

    public function country(){
        return $this->belongsTO('App\Models\Country');
    }

    public function projects(){
        return $this->hasMany('App\Models\Project');
    }
    public function createdUser(){
        return $this->belongsTo(User::class, 'created_by', 'id');
    }

}

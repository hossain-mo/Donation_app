<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;
use Wildside\Userstamps\Userstamps;
use Spatie\Translatable\HasTranslations;
class Project extends Model
{

   use Userstamps,HasTranslations;
   public  $fillable = ['description' ,'project_category_id','village_id','cost','execution_period','cause','status','start_at','end_at','resault','name','disabled'];

   public  $translatable = ['description' ,'cause', 'resault', 'name'];
    public function village(){
        return $this->belongsTo('App\Models\Village');
    } 

    public function projectCategory(){
        return $this->belongsTo(ProjectCategory::class);
    }

    public function donations(){
        return $this->hasMany(PaymentTransaction::class);
    }

    public function createdUser(){
        return $this->belongsTo(User::class, 'created_by', 'id');
    }

    public function coverPhoto(){
        return $this->hasOne(ProjectAsset::class)->where('type','cover');
    } 

    public function galary(){
        return $this->hasMany(ProjectAsset::class)->where('type','galary');
    } 

}

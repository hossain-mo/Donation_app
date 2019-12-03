<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
class ProjectAsset extends Model
{

    public  $fillable = ['content','project_id','type'];
    
    public function project(){
        return $this->belongsTo(Project::class);
    }

    public function getContentAttribute($profile_pic)
    {
        $search = "public/";
        return $this->attributes['content'] = url('/').str_replace($search, "/storage/", $profile_pic);
    }
}

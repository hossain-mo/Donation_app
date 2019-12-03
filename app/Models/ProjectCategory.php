<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;
use Wildside\Userstamps\Userstamps;

class ProjectCategory extends Model
{
    use Userstamps;

    public  $fillable = ['name'];

    public function createdUser(){
        return $this->belongsTo(User::class, 'created_by', 'id');
    }


}

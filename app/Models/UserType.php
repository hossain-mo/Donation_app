<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;
use Wildside\Userstamps\Userstamps;

class UserType extends Model
{
   use Userstamps;
   public  $fillable = ['name' ,'id'];

}

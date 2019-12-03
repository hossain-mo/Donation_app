<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Wildside\Userstamps\Userstamps;
use Laravel\Passport\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;
class User extends Authenticatable 
{
    use Notifiable,HasApiTokens,Userstamps,HasRoles;
     /**
     * Get the identifier that will be stored in the subject claim of the JWT.
     *
     * @return mixed
     */
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','user_type_id','created_by','updated_by'
    ];
    protected $guard_name = 'web';

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    public function PaymentTransaction()
    {
        return $this->belongsToMany('App\Models\PaymentTransaction','payment_transaction_user','user_id','payment_id');
    }
    public function createdUser(){
        return $this->belongsTo(User::class,"created_by","id");
    }
    public function setPasswordAttribute($password)
    {
        $this->attributes['password'] = bcrypt($password);
    }
    // public function role(){
    //     return $this->hasMany(UserRoles::class,"model_id","id");
    // }
    // public function permission(){
    //     return $this->hasMany(UserPermissions::class,"model_id","id");
    // }
}

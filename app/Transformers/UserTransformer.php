<?php
namespace App\Transformers;

use League\Fractal;

class UserTransformer extends Fractal\TransformerAbstract
{   

    

	public function transform($user)
    {  
        $roles = [];
        $permissions = [];
        foreach($user->roles as $arr){
            array_push($roles,$arr->id);
        }
        foreach($user->permissions as $arr){
            array_push($permissions,$arr->id);
        }
	    return [
	        'id'           =>  $user->id,
            'name'         =>  $user->name,
            'email'        =>  $user->email,
            'roles'        =>  $roles,
            'permissions'  =>  $permissions,
            'created_by'   =>  $user->createdUser ? $user->createdUser->name : '',
            'created_at'   =>  $user->created_at->toDateTimeString()
        ];
        
    }
   
}
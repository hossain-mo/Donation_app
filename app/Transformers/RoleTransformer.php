<?php
namespace App\Transformers;

use League\Fractal;

class RoleTransformer extends Fractal\TransformerAbstract
{   

    

	public function transform($role)
    {  
        
        $permissions = [];
        foreach($role->permissions as $arr){
            array_push($permissions,$arr->id);
        }
	    return [
	        'id'           =>  $role->id,
            'name'         =>  $role->name,
            'permissions'  =>  $permissions,
           ];
        
    }
   
}
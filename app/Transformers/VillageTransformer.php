<?php
namespace App\Transformers;

use League\Fractal;

class VillageTransformer extends Fractal\TransformerAbstract
{   

    

	public function transform($user)
    {  
       
	    return [
	        'id'           =>  $user->id,
            'name'         =>  $user->name,
            'country'      =>  $user->country->name,
            'country_id'   =>  $user->country_id,
            'created_by'   =>  $user->createdUser ? $user->createdUser->name : '',
            'created_at'   =>  $user->created_at->toDateTimeString()
        ];
        
    }
   
}
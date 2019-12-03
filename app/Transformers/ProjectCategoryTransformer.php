<?php
namespace App\Transformers;

use League\Fractal;

class ProjectCategoryTransformer extends Fractal\TransformerAbstract
{   

    

	public function transform($user)
    {  
       
	    return [
	        'id'           =>  $user->id,
            'name'         =>  $user->name,
            'created_by'   =>  $user->createdUser ? $user->createdUser->name : '',
            'created_at'   =>  $user->created_at->toDateTimeString()
        ];
        
    }
   
}
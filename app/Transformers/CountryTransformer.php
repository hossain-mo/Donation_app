<?php
namespace App\Transformers;

use League\Fractal;

class CountryTransformer extends Fractal\TransformerAbstract
{   

    

	public function transform($country)
    {  
       
	    return [
	        'id'           =>  $country->id,
            'name'         =>  $country->name,
            'created_by'   =>  $country->createdUser ? $country->createdUser->name : '',
            'created_at'   =>  $country->created_at->toDateTimeString()
        ];
        
    }
   
}
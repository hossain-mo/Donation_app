<?php
namespace App\Transformers;

use League\Fractal;

class DonationTransformer extends Fractal\TransformerAbstract
{   

    

	public function transform($payment)
    {  
       
	    return [
	        'id'          =>  $payment->id,
	        'project_id'  =>  $payment->project_id,
            'amount'      =>  $payment->amount,
            'remaining'   =>  $payment->remaining,
            'project'     =>  $payment->project->name,
            'donor'       =>  $payment->donor ? $payment->donor->name  : '' ,
            'donor_mobile'=>  $payment->donor ? $payment->donor->mobile: '' ,
            'date'        =>  $payment->created_at->toDateTimeString()
        ];
        
    }
   
}
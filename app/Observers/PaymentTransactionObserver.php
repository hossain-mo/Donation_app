<?php

namespace App\Observers;

use App\Models\PaymentTransaction;
use App\Repositories\ProjectRepo;
use Carbon\Carbon;
class PaymentTransactionObserver
{
    /**
     * Handle the payment "created" event.
     *
     * @param  payment  $payment
     * @return void
     */
    public function __construct(PaymentTransaction $paymentTransaction, ProjectRepo $projectRepo){
        $this->paymentTransaction = $paymentTransaction;
        $this->projectRepo        = $projectRepo;
    }

    public function creating(PaymentTransaction $paymentTransaction)
    {
        //
        $payment  = $this->paymentTransaction->where('project_id',$paymentTransaction->project_id)->orderBy('id','DESC')->first();
        if($payment){
            $remaining  = $payment->remaining - $paymentTransaction->amount; 
            $paymentTransaction->remaining =  $remaining < 0 ? 0 : $remaining;
        }else{
            $remaining  = $paymentTransaction->project->cost - $paymentTransaction->amount; 
            $paymentTransaction->remaining =  $remaining < 0 ? 0 : $remaining;
        }
        if(!$paymentTransaction->remaining){
            $data = ["start_at" => carbon::now(),"status" => "Execution"];
            $this->projectRepo->update($data,$paymentTransaction->project->id);
        }
        return true;  
    }

    /**
     * Handle the payment "updated" event.
     *
     * @param  \App\payment  $studentCourse
     * @return void
     */
}
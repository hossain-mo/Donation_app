<?php
namespace App\Repositories;
use Illuminate\Database\Eloquent\Model;
use App\Models\PaymentTransactionDonor;
class PaymentTransactionDonorRepo extends RepoImplementation
{
    protected $model;
    
    public function __construct(PaymentTransactionDonor $model)
    {
        $this->model = $model;
    }
    
    
}
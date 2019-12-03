<?php
namespace App\Repositories;
use Illuminate\Database\Eloquent\Model;
use App\Models\PaymentTransaction;
class PaymentTransactionRepo extends RepoImplementation
{
    protected $model;
    
    public function __construct(PaymentTransaction $model)
    {
        $this->model = $model;
    }
    
    public function all(){
        $data = $this->model->with('donor','project')->get();
        return $data;
    }
}
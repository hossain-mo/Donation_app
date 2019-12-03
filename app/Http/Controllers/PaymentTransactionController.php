<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\PaymentTransactionRepo;
use App\Repositories\PaymentTransactionDonorRepo;
use League\Fractal\Resource\Collection;
use App\Transformers\DonationTransformer;
use League\Fractal\Manager;
use App\Transformers\NewDataSerializer;
class PaymentTransactionController extends Controller
{
    public function __construct(PaymentTransactionRepo $paymentTransactionRepo, PaymentTransactionDonorRepo $paymentTransactionDonorRepo)
    {
        $this->paymentTransactionRepo = $paymentTransactionRepo;
        $this->paymentTransactionDonorRepo = $paymentTransactionDonorRepo;
        $this->fractal        = new Manager();
        $this->middleware('permission:read_donations', ['only' => ['index','view']]);
    }
    public function store (Request $requset){
        
        $data  = $this->paymentTransactionRepo->create($requset->all());
        if($requset->name){
            $paymentDonorData ['payment_transaction_id'] = $data['id'];
            $paymentDonorData ['mobile']     = $requset->mobile;
            $paymentDonorData ['name']       = $requset->name;
            $this->paymentTransactionDonorRepo->create($paymentDonorData);
        }
        $transfomer = new DonationTransformer();
        $resource = new Collection([$data], $transfomer);
        $data = $this->fractal->createData($resource)->toArray();
        $response['data']     = $data['data'][0];
        $response['message']  = "Donation Process Done Successfully";
        return response()->json($response,201);
       
    }
    public function index(){
        $data = $this->paymentTransactionRepo->all();
        $transfomer = new DonationTransformer();
        $resource = new Collection($data, $transfomer);
        $data = $this->fractal->createData($resource)->toArray();
        return response()->json($data);
    }

    public function view(){
        $params = [
            'title'     => "Projects Donation Listing"
        ];
        return view("admin.donations.index")->with($params);
    }
     
}

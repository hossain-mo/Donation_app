<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\VillageRepo as Repo;
use App\Repositories\CountryRepo;
use League\Fractal\Resource\Collection;
use App\Transformers\VillageTransformer;
use League\Fractal\Manager;
use App\Transformers\NewDataSerializer;
use Illuminate\Support\Facades\Session;

class VillageController extends Controller
{
    public $village;
    public function __construct(Repo $village,CountryRepo $countryRepo){
        $this->village     = $village;
        $this->countryRepo = $countryRepo;
        $this->fractal     = new Manager();
        $this->middleware('permission:read_villages', ['only' => ['index','view']]);
        $this->middleware('permission:update_villages', ['only' => ['update']]);
        $this->middleware('permission:delete_villages', ['only' => ['delete']]);
        $this->middleware('permission:create_villages', ['only' => ['store']]);
    }
    
    public function index(){
        app()->setLocale(Session::get('applocale'));
        $data = $this->village->all();
        $transfomer = new VillageTransformer();
        $resource = new Collection($data, $transfomer);
        $data = $this->fractal->createData($resource)->toArray();
        return response()->json($data);
    }
    
    public function show($id){
        return response()->json($this->village->show($id));
    }
    
    public function delete(request $request,$id){   
        return response()->json($this->village->delete($id));
    }
    
    public function store(Request $request){
        return response()->json($this->village->create($request->all()));
       
    }
    
    public function update(Request $request , $id){
    return response()->json($this->village->update($request->all(),$id));  
    }

    public function view(){
        $countries = $this->countryRepo->get(); 
        $params    = ['title'=>"Villages Listing","countries"=>$countries];
        return view("admin.villages.index")->with($params);
    }
}

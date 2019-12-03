<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\CountryRepo as Repo;
use League\Fractal\Resource\Collection;
use App\Transformers\CountryTransformer;
use League\Fractal\Manager;
use App\Transformers\NewDataSerializer;
use Illuminate\Support\Facades\Session;

class CountryController extends Controller
{
    public $country;
    public function __construct(Repo $country){
        $this->country = $country;
        $this->fractal        = new Manager();
        $this->middleware('permission:read_countries', ['only' => ['index','view']]);
        $this->middleware('permission:update_countries', ['only' => ['update']]);
        $this->middleware('permission:delete_countries', ['only' => ['delete']]);
        $this->middleware('permission:create_countries', ['only' => ['store']]);
    }
    public function index(){
        app()->setLocale(Session::get('applocale'));
        $data = $this->country->all();
        $transfomer = new CountryTransformer();
        $resource = new Collection($data, $transfomer);
        $data = $this->fractal->createData($resource)->toArray();
        return response()->json($data);
    }
    public function show($id){
        return response()->json($this->country->show($id));
    }
    public function destroy(request $request,$id){   
        return response()->json($this->country->delete($id));
    }
    public function store(Request $request){
        return  response()->json($this->country->create($request->all()));
       
    }
    public function update(Request $request , $id){
        return response()->json($this->country->update($request->all(),$id));  
    }
    public function view(){
        $params = ['title'=>"Countries Listing"];
        return view("admin.countries.index")->with($params);
    }
}

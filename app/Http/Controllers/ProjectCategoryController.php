<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\ProjectCategoryRepo as Repo;
use League\Fractal\Resource\Collection;
use App\Transformers\ProjectCategoryTransformer;
use League\Fractal\Manager;
use App\Transformers\NewDataSerializer;
class ProjectCategoryController extends Controller
{
    public function __construct(Repo $projectCategory){
        $this->projectCategory = $projectCategory;
        $this->fractal        = new Manager();
        $this->middleware('permission:read_project_categories', ['only' => ['index','view']]);
        $this->middleware('permission:update_project_categories', ['only' => ['update']]);
        $this->middleware('permission:delete_project_categories', ['only' => ['delete']]);
        $this->middleware('permission:create_project_categories', ['only' => ['store']]);
    }
    public function index(){
        $data = $this->projectCategory->all();
        $transfomer = new ProjectCategoryTransformer();
        $resource = new Collection($data, $transfomer);
        $data = $this->fractal->createData($resource)->toArray();
        return response()->json($data);
    }
    public function show($id){
        return response()->json($this->projectCategory->show($id));
    }
    public function destroy(request $request,$id){   
        return response()->json($this->projectCategory->delete($id));
    }
    public function store(Request $request){
        return  response()->json($this->projectCategory->create($request->all()));
       
    }
    public function update(Request $request , $id){
        return response()->json($this->projectCategory->update($request->all(),$id));  
    }
    public function view(){
        $params = ['title'=>"Project Categories Listing"];
        return view("admin.project_categories.index")->with($params);
    }
}

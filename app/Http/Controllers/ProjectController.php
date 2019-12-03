<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\ProjectRepo as Repo;
use App\Repositories\VillageRepo;
use App\Repositories\ProjectCategoryRepo;
use League\Fractal\Resource\Collection;
use App\Transformers\ExecutionProjectTransformer;
use App\Transformers\ProjectTransformer;
use League\Fractal\Manager;
use League\Fractal\Pagination\IlluminatePaginatorAdapter;
use Illuminate\Support\Facades\Session;
class ProjectController extends Controller
{
    public $project;
    public function __construct(Repo $project, VillageRepo $villageRepo, ProjectCategoryRepo $projectCategoryRepo)
    {
        $this->project             = $project;
        $this->villageRepo         = $villageRepo;
        $this->projectCategoryRepo = $projectCategoryRepo;
        $this->fractal             = new Manager();
        $this->middleware('permission:read_projects', ['only' => ['index','view']]);
        $this->middleware('permission:update_projects', ['only' => ['update']]);
        $this->middleware('permission:delete_projects', ['only' => ['delete']]);
        $this->middleware('permission:create_projects', ['only' => ['store']]);
    }
    public function index(Request $request)
    {
        app()->setLocale(Session::get('applocale'));
        $data = $this->project->all();
        $transfomer = new ProjectTransformer();
        $resource = new Collection($data, $transfomer);
        $data = $this->fractal->createData($resource)->toArray();
        return response()->json($data);
    }
    public function show($id)
    {
        return $this->project->show($id);
    }
    public function delete(request $request,$id)
    {   
        return $this->project->delete($id);
    }
    public function store(Request $request)
    {
        return  $this->project->create($request->all());
       
    }
    public function update(Request $request , $id)
    {
        return response()->json($this->project->update($request->all(),$id));  
    }
    public function getByStatus(Request $request){
        app()->setLocale($request->locale);
        $status   = $this->project->getStatus();
        if(in_array(ucfirst($request->status),$status)){
            $transformer =  sprintf('App\\Transformers\\%sProjectTransformer',ucfirst($request->status));
            $data     = $this->project->getByStatus($request->status);
            $projects = $data->getCollection();
            $resource = new Collection($projects, new $transformer);
            $resource->setPaginator(new IlluminatePaginatorAdapter($data));
            $data     = $this->fractal->createData($resource)->toArray();
            return response()->json($data);
        }else{
            return response()->json("Project Status Not Found",400);
        }
    } 

    public function getByRelated(Request $request){
        app()->setLocale($request->locale);
        $data    =  $this->project->getByRelated($request->all());
        $projects = $data->getCollection();
        $resource = new Collection($projects, new ExecutionProjectTransformer);
        $resource->setPaginator(new IlluminatePaginatorAdapter($data));
        $data     = $this->fractal->createData($resource)->toArray();
        return response()->json($data);
    }

    public function view(){
        $villages            = $this->villageRepo->get(); 
        $project_categories = $this->projectCategoryRepo->get(); 
        $params             = ['title'=>"Projects Listing","villages"=>$villages,"project_categories"=>$project_categories];
        return view("admin.projects.index")->with($params);
    }
}

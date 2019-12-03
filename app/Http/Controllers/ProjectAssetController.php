<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\ProjectAssetRepo as Repo;
use App\Repositories\ProjectRepo;
use League\Fractal\Resource\Collection;
use App\Transformers\ProjectAssetTransformer;
use League\Fractal\Manager;
use App\Transformers\NewDataSerializer;

class ProjectAssetController extends Controller
{
    public function __construct(Repo $projectAsset, ProjectRepo $projectRepo){
        $this->projectAsset = $projectAsset;
        $this->projectRepo  = $projectRepo;
        $this->fractal        = new Manager();
        $this->middleware('permission:read_project_assets', ['only' => ['index','view']]);
        $this->middleware('permission:create_project_assets', ['only' => ['store']]);
        $this->middleware('permission:delete_project_assets', ['only' => ['delete']]);
    }
    public function index(Request $request){
        $data = $this->projectAsset->getAll($request->project_id);
        $transfomer = new ProjectAssetTransformer();
        $resource = new Collection($data, $transfomer);
        $data = $this->fractal->createData($resource)->toArray();
        return response()->json($data);
    }
    public function show($id){
        return response()->json($this->projectAsset->show($id));
    }
    public function destroy(request $request,$id){   
        return response()->json($this->projectAsset->delete($id));
    }
    public function store(Request $request){
        return  response()->json($this->projectAsset->create($request->all()));
       
    }
    public function update(Request $request , $id){
        return response()->json($this->projectAsset->update($request->all(),$id));  
    }
    public function view(Request $request){
        $projects = $this->projectRepo->getAll();
        $params = [
            'title'     => "Projects Asstes",
            'projects'  => $projects
        ];
        return view("admin.upload_images.index")->with($params);
    }
}

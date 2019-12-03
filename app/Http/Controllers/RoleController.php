<?php


namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\RoleRepo as Repo;
use League\Fractal\Resource\Collection;
use App\Transformers\RoleTransformer;
use League\Fractal\Manager;
use App\Transformers\NewDataSerializer;
use App\Repositories\PermissionRepo;
class RoleController extends Controller
{
    public $role;
    public function __construct(Repo $role, PermissionRepo $permissionRepo)
    {
        $this->role           = $role;
        $this->fractal        = new Manager();
        $this->permissionRepo = $permissionRepo;
        $this->middleware('permission:read_roles', ['only' => ['index','view']]);
        $this->middleware('permission:update_roles', ['only' => ['update']]);
        $this->middleware('permission:delete_roles', ['only' => ['delete']]);
        $this->middleware('permission:create_roles', ['only' => ['store']]);
    }
    public function index(){
        $data = $this->role->all();
        $transfomer = new RoleTransformer();
        $resource = new Collection($data, $transfomer);
        $data = $this->fractal->createData($resource)->toArray();
        return response()->json($data);
    }
    public function show($id){
        return $this->role->show($id);
    }
    public function destroy(request $request,$id){   
        return response()->json($this->role->delete($id));
    }
    public function store(Request $request){
        return  $this->role->create($request->all());
    }
    public function update(Request $request , $id){
    return response()->json($this->role->update($request->all(),$id));  
    }
    public function view(){
        $permissions   = $this->permissionRepo->all();
        $params = [
            'permissions'=>$permissions,
            'title'     => "Role Listing"
        ];
        return view("admin.roles.index")->with($params);
    }
     
}


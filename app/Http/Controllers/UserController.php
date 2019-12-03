<?php


namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\UserRepo as Repo;
use League\Fractal\Resource\Collection;
use App\Transformers\UserTransformer;
use League\Fractal\Manager;
use App\Transformers\NewDataSerializer;
use App\Repositories\RoleRepo;
use App\Repositories\PermissionRepo;
class UserController extends Controller
{
    public $user;
    public function __construct(Repo $user, PermissionRepo $permissionRepo, RoleRepo $roleRepo)
    {
        $this->user           = $user;
        $this->fractal        = new Manager();
        $this->permissionRepo = $permissionRepo;
        $this->roleRepo       = $roleRepo;
        $this->middleware('permission:read_users', ['only' => ['index','view']]);
        $this->middleware('permission:update_users', ['only' => ['update']]);
        $this->middleware('permission:delete_users', ['only' => ['delete']]);
        $this->middleware('permission:create_users', ['only' => ['store']]);
    }
    public function index(){
        $data = $this->user->all();
        $transfomer = new UserTransformer();
        $resource = new Collection($data, $transfomer);
        $data = $this->fractal->createData($resource)->toArray();
        return response()->json($data);
    }
    public function show($id){
        return $this->user->show($id);
    }
    public function delete(request $req,$id){   
        return $this->user->delete($id);
    }
    public function store(Request $req){
        return  $this->user->create($req->all());
    }
    public function update(Request $req , $id){
    return response()->json($this->user->update($req->all(),$id));  
    }
    public function view(){
        $roles         = $this->roleRepo->all();
        $permissions   = $this->permissionRepo->all();
        $params = [
            'roles'    => $roles,
            'permissions'=>$permissions,
            'title'     => "User Listing"
        ];
        return view("admin.users.index")->with($params);
    }
     
}


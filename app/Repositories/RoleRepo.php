<?php
namespace App\Repositories;
use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Models\Role;
class RoleRepo extends RepoImplementation
{
    protected $model;
    
    public function __construct(Role $model)
    {
        $this->model = $model;
    }
    public function create($data){
        $role = $this->model->create(["name" => $data['name']]);
        $role->syncPermissions($data['permissions']);
        return $role;
    }
    public function delete($id){
        $role = $this->model->find($id);
        $role->syncPermissions([]);
        return $role->delete();
    }
    public function update($data, $id){
        $role = $this->model->find($id);
        $role->syncPermissions($data['permissions']);
        $role = $role->update(["name" => $data['name']]);
        return $role;
    }
    public function index(){
        $data = $this->model->with('permissions')->get();
    }
    
    
}
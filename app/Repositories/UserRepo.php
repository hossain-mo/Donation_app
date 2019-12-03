<?php
namespace App\Repositories;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class UserRepo extends RepoImplementation
{
    protected $model;
    
  
    public function __construct(User $model)
    {
        $this->model          = $model;
    }
    public function create(array $data)
    { 
        //user_type_id = 1 for admin
        $data["user_type_id"]  = 1 ;
        $user = $this->model->create($data);
        $this->syncPermissionAndRoles($user , $data);
        return $user;
    }
    public function update(array $data,$id)
    {
        $user = $this->model->find($id);
        $this->syncPermissionAndRoles($user , $data);
        return $user->update(["name" => $data['name'],"email" => $data['email'],"password" => $data['password']]);
    }
   public function all(){
       return $this->model->with(["createdUser","roles","permissions"])->get();
   }
   private function addPermissions($user , $permissions){
        $user->syncPermissions($permissions);
   }
   private function addRoles($user , $roles){
        $user->syncRoles($roles);
   }
   public function getByName($name){
       $data  = $this->model->where("name",$name)->first();
       return $data;
   }
   private function syncPermissionAndRoles($user,$data){
    if(count($data['permissions'])){
        return $this->addPermissions($user,$data['permissions']);
    }
    if(count($data['roles'])){
        $this->addRoles($user,$data['roles']);
    }
   }
}
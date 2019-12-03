<?php
namespace App\Repositories;
use Illuminate\Database\Eloquent\Model;
use App\Models\ProjectCategory;
class ProjectCategoryRepo extends RepoImplementation
{
    protected $model;
    
    public function __construct(ProjectCategory $model){
        $this->model = $model;
    }

    public function all(){
        return $this->model->with('createdUser')->get();
    }

    public function get(){
        $data =  $this->model->get();
        return $data;
    }

    
    
}
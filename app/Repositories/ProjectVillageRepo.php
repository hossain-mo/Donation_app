<?php
namespace App\Repositories;
use Illuminate\Database\Eloquent\Model;
use App\Models\ProjectVillage;
class ProjectVillageRepo extends RepoImplementation
{
    protected $model;
    
    public function __construct(ProjectVillage $model)
    {
        $this->model = $model;
    }
    
    
}
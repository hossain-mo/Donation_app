<?php
namespace App\Repositories;
use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Models\Permission;
class PermissionRepo extends RepoImplementation
{
    protected $model;
    
    public function __construct(Permission $model)
    {
        $this->model = $model;
    }
    
}
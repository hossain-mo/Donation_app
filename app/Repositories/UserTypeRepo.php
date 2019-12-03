<?php
namespace App\Repositories;
use Illuminate\Database\Eloquent\Model;
use App\Models\UserType;
class UserTypeRepo extends RepoImplementation
{
    protected $model;
    
    public function __construct(UserType $model)
    {
        $this->model = $model;
    }
    
    
}
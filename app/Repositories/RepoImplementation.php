<?php
namespace App\Repositories;
use Illuminate\Database\Eloquent\Model;
class RepoImplementation implements RepoInterface
{
    protected $model;
    public function __construct(Model $model)
    {
        $this->model= $model;
    }
    public function all()
    {
        return $this->model->get();
    }
    public function show($id)
    {
        return $this->model->find($id);
    }
    public function delete($id)
    {
        return $this->model->destroy($id); 
    }
    public function create(array $arr)
    {
      return $this->model->create($arr); 
     }
     public function update(array $arr,$id)
     {
         return $this->model->find($id)->update($arr);     
     }

}

?>
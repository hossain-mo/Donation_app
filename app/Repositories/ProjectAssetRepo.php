<?php
namespace App\Repositories;
use Illuminate\Database\Eloquent\Model;
use App\Models\ProjectAsset;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\File;
class ProjectAssetRepo extends RepoImplementation
{
    protected $model;
    
    public function __construct(ProjectAsset $model)
    {
        $this->model = $model;
    }

    public function all(){
        $data = $this->model->with('project')->get();
        return $data;
    }

    public function get(){
        $data = $this->model->get();
        return $data;
    }

    public function getAll($project_id){
        $data = $this->model->where('project_id',$project_id)->with('project')->get();
        return $data;
    }
    
    public function create($data){
        if($data['type'] != 'video_url'){
            $data ["content"]  = Storage::putFile('public/photos', new File($data['file']));
        }
        $projectAsset = $this->model->create($data); 
        return $projectAsset;
    }
    public function update($data, $id){
        $projectAsset = $this->model->find($id);
        
        return $projectAsset;
    }
    
}
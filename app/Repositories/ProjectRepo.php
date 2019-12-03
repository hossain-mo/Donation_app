<?php
namespace App\Repositories;
use Illuminate\Database\Eloquent\Model;
use App\Models\Project;
use App\Libraries\General;
use Illuminate\Support\Facades\Session;

class ProjectRepo extends RepoImplementation
{
    protected $model;
    
    public function __construct(Project $model,General $general)
    {
        $this->model   = $model;
        $this->general = $general;
    }
    
    public function getByStatus($status){
        $data  = $this->model->where('status',$status)->where('disabled',0)->with('village','projectCategory','galary','coverPhoto')
        ->withCount([
            'donations AS collected' => function ($query) {
                $query->select(\DB::raw("SUM(amount) as collected"));
        }])
        ->paginate(20);
        return $data;
    }
    
    public function getStatus(){
        $status = $this->general->getEnumValues("projects", "status");
        return $status;
    }

    public function getByRelated($data){
        $query  = $this->model->where('disabled',0)->with('village','projectCategory','galary','coverPhoto')
        ->withCount([
            'donations AS collected' => function ($query) {
                $query->select(\DB::raw("SUM(amount) as collected"));
        }]);
        foreach($data as $key => $value){
            if($key !=='locale')
            $query->where($key, $value);
        }
        return $query->paginate(20);
    } 

    public function all(){
        $data  = $this->model->with('village','projectCategory','createdUser')
        ->withCount([
            'donations AS collected' => function ($query) {
                $query->select(\DB::raw("SUM(amount) as collected"));
        }])->get();
        return $data;
    }
    
    public function create($data){
        $project = $this->model->create($data);
        $locale  = Session::get('applocale');
        $project->setTranslation('name', $locale, $data['name']);
        $project->setTranslation('description', $locale, $data['description']);
        $project->setTranslation('cause', $locale, $data['cause']);
        $project->save();
        return $project;
    }
    private function updateLocalizationFields($project, $locale, $fieldName, $fieldData){
        $project->setTranslation($fieldName, $locale, $fieldData);
        $project->save();
    }
    public function update($data, $id){
        $project = $this->model->find($id);
        $locale  = Session::get('applocale');
        foreach($data as $key => $val){
            if(in_array($key,['name','description','cause','resault']))
                $this->updateLocalizationFields($project,$locale,$key,$val);
        }
        // remove fields from original array to update not localization data data
        unset($data['name']);
        unset($data['description']);
        unset($data['cause']);
        unset($data['resault']);
        if(count($data)){
            $project->update($data);
        }
        return $project;
    }
    
    public function getAll(){
        $data =  $this->model->get();
        return $data;
    }
}
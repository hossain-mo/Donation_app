<?php
namespace App\Repositories;
use Illuminate\Database\Eloquent\Model;
use App\Models\Village;
use Illuminate\Support\Facades\Session;

class VillageRepo extends RepoImplementation
{
    protected $model;
    
    public function __construct(Village $model){
        $this->model = $model;
    }

    public function all(){
        $data =  $this->model->with(['createdUser','country'])->get();
        return $data;
    }
    
    public function get(){
        $data =  $this->model->get();
        return $data;
    }
    
    public function create($data){
        $village = $this->model->create($data);
        $locale  = Session::get('applocale');
        $village->setTranslation('name', $locale, $data['name']);
        $village->save();
        return $village;
    }
    public function update($data, $id){
        $village = $this->model->find($id);
        $locale  = Session::get('applocale');
        $village->setTranslation('name', $locale, $data['name']);
        $village->save();
        return $village;
    }
}
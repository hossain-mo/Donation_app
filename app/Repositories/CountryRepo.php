<?php
namespace App\Repositories;
use Illuminate\Database\Eloquent\Model;
use App\Models\Country;
use Illuminate\Support\Facades\Session;

class CountryRepo extends RepoImplementation
{
    protected $model;
    
    public function __construct(Country $model)
    {
        $this->model = $model;
    }

    public function all(){
        $data = $this->model->with('createdUser')->get();
        return $data;
    }

    public function get(){
        $data = $this->model->get();
        return $data;
    }
    
    public function create($data){
        $country = $this->model->create($data);
        $locale  = Session::get('applocale');
        $country->setTranslation('name', $locale, $data['name']);
        $country->save();
        return $country;
    }
    public function update($data, $id){
        $country = $this->model->find($id);
        $locale  = Session::get('applocale');
        $country->setTranslation('name', $locale, $data['name']);
        $country->save();
        return $country;
    }
    
}
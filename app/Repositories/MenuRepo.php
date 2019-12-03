<?php 

namespace App\Repositories;

use App\Models\Menu;

class MenuRepo {
    // protected $model ;

    // public function __construct(menu $model) {
    //     $this->model  = $model;
    // }

    public function create(array $data)
    {
        return Menu::create($data);
    }
    public function getAll(){
        return  \DB::table("menus")->get();
    }
    public function getParent(){
        return Menu::where('parent','0')->get();
    }
    public function update($data,$id){
        $record = Menu::find($id);
        return $record->update($data);
    }
    public function destroy($id){
       return Menu::destroy($id);
    }
}
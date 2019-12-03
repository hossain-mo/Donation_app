<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\UserTypeRepo as Repo;
class UserTypeController extends Controller
{
    public $user;
    public function __construct(Repo $user)
    {
        $this->user = $user;
    }
    public function getAll()
    {
        return $this->user->getAll();
    }
    public function show($id)
    {
        return $this->user->show($id);
    }
    public function delete(request $req,$id)
    {   
        return $this->user->delete($id);
    }
    public function create(Request $req)
    {
        return  $this->user->create($req->all());
       
     }
     public function update(Request $req , $id)
     {
        return response()->json($this->user->update($req->all(),$id));  
     }
}

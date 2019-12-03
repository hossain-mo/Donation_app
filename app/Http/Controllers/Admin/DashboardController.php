<?php

namespace App\Http\Controllers\Admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
// use Laratrust;
use App\Repositories\MenuRepo;
use App\Models\Menu;

use Carbon\Carbon;


class DashboardController extends Controller
{
    
    public function index()
    {
        $params['title'] = 'Dashboard';
  
        return view('admin.dashboard')->with($params);
    }

}

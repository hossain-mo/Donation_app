<?php
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Config;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

class LanguageController extends Controller
{
    public function switchLang(Request $request)
    {   
        $lang = $request->lang;

        if (array_key_exists($lang, Config::get('languages'))) {
            Session::put('applocale', $lang);
        }
        return response()->json(Session::get('applocale'));
        return Redirect::back();
    }
    public function getLocale(){
        return response()->json(Session::get('applocale'));
    }
}
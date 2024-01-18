<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LocalizationController extends Controller
{
    //http://localhost:8001/lang/fr
    public function index($locale){
        session()->put('locale', $locale);
        return redirect()->back();
    }
}

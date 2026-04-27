<?php
// app/Http/Controllers/GeositeController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GeositeController extends Controller
{
    public function meat()
    {
        return view('geosite.meat');
    }
    
    public function batuBahisan()
    {
        return view('geosite.batu-bahisan');
    }
    
    public function liangSipege()
    {
        return view('geosite.liang-sipege');
    }
}
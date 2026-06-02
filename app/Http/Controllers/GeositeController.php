<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GeositeController extends Controller
{
    /**
     * Display Meat geosite page
     */
    public function meat()
    {
        return view('geosite.meat');
    }
    
    /**
     * Display Batu Bahisan / Batu Basiha geosite page
     */
    public function batuBasiha()
    {
        return view('geosite.batu-bahisan');
    }
    
    /**
     * Display Liang Sipege geosite page
     */
    public function liangSipege()
    {
        return view('geosite.liang-sipege');
    }
}
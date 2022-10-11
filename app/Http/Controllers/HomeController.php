<?php

namespace App\Http\Controllers;

use App\Models\Pages;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($slug)
    {
        $menuList = Pages::tree();
        $pageData = Pages::where('slug',$slug)->first();
        return view('home',['menulist'=>$menuList,'pageData'=>$pageData]);
    }
    
    
}

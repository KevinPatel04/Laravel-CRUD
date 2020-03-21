<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
	public function __construct(){
		return $this->middleware('auth');
	}

    public function getHome(){
    	return view('home');
    }

}

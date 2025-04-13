<?php

namespace App\Http\Controllers;

abstract class Controller
{
    //
    protected $data = [];
    
    protected function loadTheme($view, $data = [])
	{
		return view('frontend/'. $view, $data);
    }
}

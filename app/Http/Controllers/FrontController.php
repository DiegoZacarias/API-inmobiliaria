<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

class FrontController extends Controller
{
    public function getRouteCollection()
    {
    		$routeCollection = Route::getRoutes();
    		// dd($routeCollection);
    		return view('routes', compact('routeCollection'));
    }
}

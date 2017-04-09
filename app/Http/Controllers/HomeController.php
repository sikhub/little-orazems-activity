<?php

namespace App\Http\Controllers;

use App\Activities;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Render home page with activity list
     *
     * @return  \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $activities = Activities::all();
        return view('home.index', compact('activities'));
    }
}

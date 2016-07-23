<?php

namespace LTP\Http\Controllers;

use Illuminate\Http\Request;

use LTP\Http\Requests;
use LTP\Project;

class PageController extends Controller
{
    public function home()
    {
        $projects = Project::all();
        return view('welcome', compact('projects'));
    }
}

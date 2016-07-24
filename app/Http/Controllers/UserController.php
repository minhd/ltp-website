<?php


namespace LTP\Http\Controllers;

use Illuminate\Http\Request;

use LTP\Http\Requests;
use LTP\Project;


class UserController extends Controller
{
    public function join(Project $project)
    {
        auth()->user()->participate($project);
        return back();
    }
}
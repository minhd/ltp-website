<?php

namespace LTP\Http\Controllers;

use GrahamCampbell\Markdown\Facades\Markdown;
use Illuminate\Http\Request;

use LTP\Http\Requests;
use LTP\Project;

class ProjectController extends Controller
{

    /**
     * Showing a particular project
     *
     * @param Project $project
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show(Project $project)
    {
        return view('project/show', compact('project'));
    }

    /**
     * Showing a project creation form
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        return view('project/create');
    }


    /**
     * Storing a new project
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required|max:255',
            'description' => 'required',
        ]);

        $project = Project::from(auth()->user())->creates($request->all());

        auth()->user()->participate($project);

        return redirect('projects/'.$project->id);
    }

    public function edit(Project $project)
    {
        return view('project/edit', compact('project'));
    }

    public function update(Project $project, Request $request)
    {
        $this->validate($request, [
            'title' => 'required|max:255',
            'description' => 'required',
        ]);

        $project->update($request->all());

        return back();
    }


}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SiteController extends Controller
{
    public function index()
    {
        return view('site.index');
    }

    public function career()
    {
        return view('site.career');
    }

    public function contact()
    {
        return view('site.contact');
    }

    public function events()
    {
        return view('site.events');
    }

    public function event($event)
    {
        return view('site.event-single', compact('event'));
    }

    public function projects()
    {
        return view('site.projects');
    }

    public function project($project)
    {
        return view('site.project-single', compact('project'));
    }

    public function about()
    {
        return view('site.about');
    }

    public function whatWeDo()
    {
        return view('site.what-we-do');
    }
}

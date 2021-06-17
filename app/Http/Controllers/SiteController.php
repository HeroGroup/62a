<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
        $office = DB::table('office_details')->first();
        return view('site.contact', compact('office'));
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
        $members = DB::table('team_members')->get();
        $items = DB::table('about_us')->get();
        return view('site.about',compact('members','items'));
    }

    public function whatWeDo()
    {
        return view('site.what-we-do');
    }

    public function getFooter()
    {
        try {
            $office = DB::table('office_details')->first();
            return $this->success("success", $office);
        } catch(\Exception $exception) {
            return $this->fail($exception->getMessage());
        }
    }
}

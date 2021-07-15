<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SiteController extends Controller
{
    public function index()
    {
        $banners = DB::table('banners')->where('is_active',1)->get();
        $projects = DB::table('projects')->where('is_active',1)->take(6)->get();
        $top = DB::table('sections')->where('position','top')->where('is_active',1)->first();
        $bottom = DB::table('sections')->where('position','bottom')->where('is_active',1)->first();

        return view('site.index',compact('banners','projects','top','bottom'));
    }

    public function career()
    {
        $careers = DB::table('careers')->where('is_active',1)->get();
        $brands = DB::table('brands')->get();

        return view('site.career',compact('careers','brands'));
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
        $categories = DB::select('select categories.id,categories.title_en,categories.title_hy,count(*) as cnt
        from categories,project_categories,projects
        where categories.id = project_categories.category_id
        and project_categories.project_id=projects.id
        and projects.is_active=1
        group by id,title_en,title_hy
        having cnt > 0;');

        $projects = DB::select('select projects.id,projects.title_en,projects.title_hy,projects.location_en,projects.location_hy,project_photos.photo_url
        from projects, project_photos
        where projects.id = project_photos.project_id
        and project_photos.is_cover=1
        and projects.is_active=1;');

        $totalProjects = DB::table('projects')->where('is_active',1)->count();

        $top = DB::table('sections')->where('position','LIKE','projects-top')->where('is_active',1)->first();

        $bottom = DB::table('sections')->where('position','LIKE','projects-bottom')->where('is_active',1)->first();

        $brands = DB::table('brands')->get();

        return view('site.projects',compact('categories','projects','totalProjects','top','bottom','brands'));
    }

    public function project($projectId)
    {
        $project = DB::table('projects')->find($projectId);
        $photos = DB::table('project_photos')->where('project_id',$projectId)->get();
        $projects = DB::table('projects')->where('is_active',1)->where('id','!=',$projectId)->take(2)->get();

        return view('site.project-single', compact('project','photos','projects'));
    }

    public function about()
    {
        $members = DB::table('team_members')->get();
        $items = DB::table('about_us')->where('id','>',1)->get();
        $haveAnyQuestions = DB::table('about_us')->find(1);
        $brands = DB::table('brands')->get();

        return view('site.about',compact('members','items','haveAnyQuestions','brands'));
    }

    public function whatWeDo()
    {
        $items = DB::table('what_we_do_items')->get();
        $section = DB::table('sections')->where('position','LIKE','what-we-do')->where('is_active',1)->first();
        $offices = DB::table('office_details')->get();
        return view('site.what-we-do',compact('items','section','offices'));
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

    public function changeLanguage($lang)
    {
        // dd($lang,\request()->path());
        session(['lang' => $lang]);
        return back();
    }
}

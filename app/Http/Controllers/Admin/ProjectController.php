<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProjectController extends Controller
{
    public function index()
    {
        $projects = DB::table('projects')->get();
        return view('admin.projects.index',compact('projects'));
    }

    public function create()
    {
        $categories = DB::table('categories')->pluck('title_en','id')->toArray();
        return view('admin.projects.create',compact('categories'));
    }

    public function store(Request $request)
    {
        try {
            $projectId = DB::table('projects')->insertGetId([
                'title_en' => $request->title_en
            ]);

            if($request->has('categories')) {
                $categories = $request->categories;
                foreach($categories as $category) {
                    DB::table('project_categories')->insert([
                        'project_id' => $projectId,
                        'category_id' => $category
                    ]);
                }
            }

            $projectTitle = $request->title_en;
            return view('admin.projects.imageUpload', compact('projectId','projectTitle'));
        } catch(\Exception $exception) {
            return back()->withInput()->with('message',$exception->getLine().': '.$exception->getMessage())->with('type','danger');
        }
    }

    public function show($id)
    {
        try {
            $project = DB::table('projects')->find($id);
            return view('admin.projects.show',compact('project'));
        } catch(\Exception $exception) {
            return back()->with('message',$exception->getMessage())->with('type','danger');
        }

    }

    public function edit($id)
    {
        try {
            $project = DB::table('projects')->find($id);
            return view('admin.projects.edit',compact('project'));
        } catch(\Exception $exception) {
            return back()->with('message',$exception->getMessage())->with('type','danger');
        }
    }

    public function update(Request $request, $id)
    {
        try {
            $project = DB::table('projects')->where('id', $id)->update($request->all());
            return back()->with('message','Project created successfully.')->with('type','success');
        } catch(\Exception $exception) {
            return back()->with('message',$exception->getMessage())->with('type','danger');
        }
    }

    public function destroy($id)
    {
        try {
            // $project = DB::table('projects')->find($id);
            return back()->with('message','Delete action is not permitted at the moment.')->with('type','danger');
        } catch(\Exception $exception) {
            return back()->with('message',$exception->getMessage())->with('type','danger');
        }
    }

    public function imageUpload(Request $request)
    {
        // dd($_FILES);
        try {
            $projectId = $request->project_id;
            if ($request->hasFile('img')) {
                $document = $request->img;
                $fileName = time() . '-' . $document->getClientOriginalName();
                $document->move("resources/assets/images/project_images/$projectId/", $fileName);
                $imageUrl = "/resources/assets/images/project_images/$projectId/" . $fileName;

                DB::table('project_photos')->insert([
                    'project_id' => $projectId,
                    'photo_url' => $imageUrl
                ]);

                return $this->success('photo uploaded successfully');
            } else {
                return $this->fail("invalid image");
            }
        } catch (\Exception $exception) {
            return $this->fail($exception->getMessage());
        }
    }

    public function deleteImage(Request $request)
    {
        try {
            DB::table('project_photos')->where('photo_url','LIKE', $request->photo_url)->delete();
            return $this->success('photo deleted successfully');
        } catch (\Exception $exception) {
            return $this->fail($exception->getMessage());
        }
    }
}

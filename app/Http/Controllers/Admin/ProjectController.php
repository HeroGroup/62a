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
        $top = DB::table('sections')->where('position','LIKE','projects-top')->first();
        $bottom = DB::table('sections')->where('position','LIKE','projects-bottom')->first();

        return view('admin.projects.index',compact('projects','top','bottom'));
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
                'title_en' => $request->title_en,
                'title_hy' => $request->title_hy,
                'description_en' => $request->description_en,
                'description_hy' => $request->description_hy,
                'location_en' => $request->location_en,
                'location_hy' => $request->location_hy,
                'type_en' => $request->type_en,
                'type_hy' => $request->type_hy,
                'year' => $request->year,
                'size_en' => $request->size_en,
                'size_hy' => $request->size_hy,
                'budget_en' => $request->budget_en,
                'budget_hy' => $request->budget_hy,
                'is_active' => 1,
                'created_at' => \Carbon\Carbon::now(),
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
            $categories = DB::table('categories')->pluck('title_en','id')->toArray();
            $photos = DB::table('project_photos')->where('project_id',$id)->get();
            $project = DB::table('projects')->find($id);
            return view('admin.projects.show',compact('project','photos','categories'));
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
            DB::table('projects')->where('id', $id)->update([
                'title_en' => $request->title_en,
                'title_hy' => $request->title_hy,
                'description_en' => $request->description_en,
                'description_hy' => $request->description_hy,
                'location_en' => $request->location_en,
                'location_hy' => $request->location_hy,
                'type_en' => $request->type_en,
                'type_hy' => $request->type_hy,
                'year' => $request->year,
                'size_en' => $request->size_en,
                'size_hy' => $request->size_hy,
                'budget_en' => $request->budget_en,
                'budget_hy' => $request->budget_hy,
                'is_active' => $request->is_active ? 1 : 0,
                'updated_at' => \Carbon\Carbon::now(),
            ]);

            if($request->has('categories')) {
                DB::table('project_categories')->where('project_id',$id)->delete();
                $categories = $request->categories;
                foreach($categories as $category) {
                    DB::table('project_categories')->insert([
                        'project_id' => $id,
                        'category_id' => $category
                    ]);
                }
            }
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
        try {
            $projectId = $request->temp;
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
            DB::table('project_photos')->where('id',$request->photo_id)->delete();
            return $this->success('photo deleted successfully');
        } catch (\Exception $exception) {
            return $this->fail($exception->getMessage());
        }
    }

    public function makeCover(Request $request)
    {
        try {
            $photo = DB::table('project_photos')->find($request->photo_id);
            DB::table('project_photos')->where('project_id',$photo->project_id)->update(['is_cover' => 0]);
            DB::table('project_photos')->where('id',$request->photo_id)->update(['is_cover' => 1]);

            return $this->success('photo updated successfully');
        } catch (\Exception $exception) {
            return $this->fail($exception->getMessage());
        }
    }

    public function updateTopSection(Request $request)
    {
        try {
            DB::table('sections')->where('position','like','projects-top')->update([
                'description_en' => $request->description_en,
                'description_hy' => $request->description_hy,
                'is_active' => $request->is_active ? 1 : 0,
                'updated_at' => \Carbon\Carbon::now()
            ]);

            return back()->with('message',"Updated Successfully")->with('type','success');
        } catch (\Exception $exception) {
            return $this->fail($exception->getMessage());
        }
    }

    public function updateBottomSection(Request $request)
    {
        try {
            DB::table('sections')->where('position','like','projects-bottom')->update([
                'title_en' => $request->title_en,
                'title_hy' => $request->title_hy,
                'description_en' => $request->description_en,
                'description_hy' => $request->description_hy,
                'is_active' => $request->is_active ? 1 : 0,
                'updated_at' => \Carbon\Carbon::now()
            ]);

            if($request->hasFile('photo')) {
                $document = $request->photo;
                $fileName = time() . '-' . $document->getClientOriginalName();
                $document->move("resources/assets/images/sections/", $fileName);
                $photoUrl = "/resources/assets/images/sections/" . $fileName;

                DB::table('sections')->where('position','like','projects-bottom')->update([
                    'image_url' => $photoUrl,
                ]);
            }

            return back()->with('message',"Updated Successfully")->with('type','success');
        } catch (\Exception $exception) {
            return $this->fail($exception->getMessage());
        }
    }
}

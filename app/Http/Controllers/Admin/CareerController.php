<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CareerController extends Controller
{
    public function index()
    {
        $careers = DB::table('careers')->get();
        return view('admin.careers.index',compact('careers'));
    }

    public function create()
    {
        return view('admin.careers.create');
    }

    public function store(Request $request)
    {
        try {
            $newId = DB::table('careers')->insertGetId([
                'job_title_en' => $request->job_title_en,
                'job_title_hy' => $request->job_title_hy,
                'job_description_en' => $request->job_description_en,
                'job_description_hy' => $request->job_description_hy,
                'location_en' => $request->location_en,
                'location_hy' => $request->location_hy,
                'created_at' => \Carbon\Carbon::now(),
            ]);

            $career = DB::table('careers')->find($newId);

            return view('admin.careers.skills',compact('career'));
        } catch(\Exception $exception) {
            return back()->with('message',$exception->getMessage())->with('type','danger');
        }
    }

    public function storeSingleSkill(Request $request)
    {
        try {
            DB::table('career_items')->insert([
                'career_id' => $request->career_id,
                'item_description_en' => $request->item_description_en,
                'item_description_hy' => $request->item_description_hy,
                'created_at' => \Carbon\Carbon::now(),
            ]);
            return back()->with('message','new skill created successfully')->with('type','success');
        } catch(\Exception $exception) {
            return back()->with('message',$exception->getMessage())->with('type','danger');
        }
    }

    public function storeSkills(Request $request)
    {
        try {
            if($request->career_id && $request->data) {
                $input = json_decode($request->data);
                if(count($input)>0) {
                    foreach ($input as $item) {
                        DB::table('career_items')->insert([
                            'career_id' => $request->career_id,
                            'item_description_en' => $item->item_description_en,
                            'item_description_hy' => $item->item_description_hy,
                            'created_at' => \Carbon\Carbon::now(),
                        ]);
                    }

                    return $this->success('new job created successfully.');
                } else {
                    return $this->fail('1- no records inserted.');
                }
            } else {
                return $this->fail('2- no records inserted.');
            }
        } catch (\Exception $exception) {
            return $this->fail($exception->getMessage());
        }
    }

    public function show($id)
    {
        // $careerRequests = DB::table('career_requests')->where('id',$id);
        // $careerRequests->update(['viewed_at' => \Carbon\Carbon::now()]);
        $career = DB::table('careers')->find($id);
        $skills = DB::table('career_items')->where('career_id',$id)->get();

        return view('admin.careers.show',compact('career','skills'));
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
    try {
            DB::table('careers')->where('id',$id)->update([
                'job_title_en' => $request->job_title_en,
                'job_title_hy' => $request->job_title_hy,
                'job_description_en' => $request->job_description_en,
                'job_description_hy' => $request->job_description_hy,
                'location_en' => $request->location_en,
                'location_hy' => $request->location_hy,
                'is_active' => $request->is_active ? 1 : 0,
                'updated_at' => \Carbon\Carbon::now()
            ]);

            return back()->with('message', 'career updated successfully.')->with('type', 'success');
        } catch (\Exception $exception) {
            return back()->with('message', $exception->getMessage())->with('type', 'danger');
        }
    }

    public function updateSkill(Request $request, $id)
    {
        try {
            DB::table('career_items')->where('id',$id)->update([
                'item_description_en' => $request->item_description_en,
                'item_description_hy' => $request->item_description_hy,
                'updated_at' => \Carbon\Carbon::now()
            ]);

            return back()->with('message', 'skill updated successfully.')->with('type', 'success');
        } catch (\Exception $exception) {
            return back()->with('message', $exception->getMessage())->with('type', 'danger');
        }
    }

    public function destroy($id)
    {
        try {
            DB::table('career_items')->where('career_id',$id)->delete();
            DB::table('careers')->where('id',$id)->delete();
            return $this->success("deleted successfully");
        } catch (\Exception $exception) {
            return $this->fail("fail");
        }
    }

    public function destroySkill($id)
    {
        try {
            DB::table('career_items')->where('id',$id)->delete();
            return $this->success("Skill removed successfully.");
        } catch (\Exception $exception) {
            return $this->fail($exception->getMessage());
        }
    }

    public function requestForApply(Request $request)
    {
        try {
            $newId = DB::table('career_requests')->insertGetId([
                'career_id' => $request->career_id,
                'name' => $request->name,
                'email' => $request->email,
                'mobile' => $request->mobile,
                'created_at' => \Carbon\Carbon::now()
            ]);

            if($request->hasFile('cv')) {
                $document = $request->cv;
                $fileName = time() . '-' . $document->getClientOriginalName();
                $document->move("resources/assets/images/career_requests/cv/", $fileName);
                $cv = "/resources/assets/images/career_requests/cv/" . $fileName;

                DB::table('career_requests')->where('id',$newId)->update(['cv' => $cv]);

                $successMessage = session() == 'hy' ? 'your application was sent successfully. We will get in touch with you soon.' : 'your application was sent successfully. We will get in touch with you soon.';
                return back()->with('message', $successMessage)->with('type', 'success');
            } else {
                $failCVMessage = session() == 'hy' ? 'Please upload your resume as well.' : 'Please upload your resume as well.';
                return back()->with('message', $failCVMessage)->with('type', 'danger');
            }


        } catch (\Exception $exception) {
            return back()->with('message', $exception->getMessage())->with('type', 'danger');
        }
    }

    public function newCareerRequests()
    {
        return $this->success("success", DB::table('career_requests')->whereNull('viewed_at')->count());
    }

    public function careerRequests($careerId)
    {
        $x = DB::table('career_requests')->where('career_id',$careerId);
        $x->update(['viewed_at' => \Carbon\Carbon::now()]);
        $requests = $x->get();
        $jobTitle = DB::table('careers')->find($careerId)->job_title_en;

        return view('admin.careers.requests',compact('requests','jobTitle'));
    }
}

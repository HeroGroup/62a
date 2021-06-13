<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AboutUsController extends Controller
{
    public function index()
    {
        $members = DB::table('team_members')->get();
        return view('admin.aboutUs.index',compact('members'));
    }

    public function create()
    {
        return view('admin.aboutUs.create');
    }

    public function store(Request $request)
    {
        try {
            $newId = DB::table('team_members')->insertGetId([
                'name' => $request->name,
                'position_en' => $request->position_en,
                'position_hy' => $request->position_hy,
                'description_en' => $request->description_en,
                'description_hy' => $request->description_hy,
                'created_at' => \Carbon\Carbon::now()
            ]);

            if($request->hasFile('photo')) {
                $document = $request->photo;
                $fileName = time() . '-' . $document->getClientOriginalName();
                $document->move("resources/assets/images/team_members/", $fileName);
                $photoUrl = "/resources/assets/images/team_members/" . $fileName;

                DB::table('team_members')->where('id',$newId)->update(['photo_url' => $photoUrl]);
            }

            return redirect(route('admin.aboutUs.index'))->with('message','New Member created successfully')->with('type','success');
        } catch(\Exception $exception) {
            return back()->with('message',$exception->getMessage())->with('type','danger');
        }
    }

    public function show($id)
    {
        $member = DB::table('team_members')->find($id);
        return view('admin.aboutUs.show',compact('member'));
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        try {
            DB::table('team_members')->where('id',$id)->update([
                'name' => $request->name,
                'position_en' => $request->position_en,
                'position_hy' => $request->position_hy,
                'description_en' => $request->description_en,
                'description_hy' => $request->description_hy,
                'updated_at' => \Carbon\Carbon::now()
            ]);
            return redirect(route('admin.aboutUs.index'))->with('message','Member updated successfully')->with('type','success');
        } catch (\Exception $exception) {
            return back()->with('message',$exception->getMessage())->with('type','danger');
        }
    }

    public function destroy($id)
    {
        try {
            DB::table('team_members')->where('id',$id)->delete();
            return $this->success("deleted successfully");
        } catch (\Exception $exception) {
            return $this->fail($exception->getMessage());
        }
    }

    public function memberImageUpload(Request $request)
    {
        try {
            if($request->hasFile('img')) {
                $document = $request->img;
                $fileName = time() . '-' . $document->getClientOriginalName();
                $document->move("resources/assets/images/team_members/", $fileName);
                $photoUrl = "/resources/assets/images/team_members/" . $fileName;

                DB::table('team_members')->where('id',$request->temp)->update(['photo_url' => $photoUrl]);

                return $this->success("image uploaded successfully");
            } else {
                return $this->fail("invalid image");
            }
        } catch(\Exception $exception) {
            return $this->fail($exception->getMessage());
        }
    }
}

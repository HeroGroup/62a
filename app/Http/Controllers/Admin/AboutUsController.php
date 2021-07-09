<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AboutUsController extends Controller
{
    public function index()
    {
        $items = DB::table('about_us')->where('id','>',1)->get();
        $haveAnyQuestions = DB::table('about_us')->find(1);

        return view('admin.aboutUs.index',compact('items','haveAnyQuestions'));
    }

    public function create()
    {
        return view('admin.aboutUs.create');
    }

    public function store(Request $request)
    {
        try {
            $newId = DB::table('about_us')->insertGetId([
                'title_en' => $request->title_en,
                'title_hy' => $request->title_hy,
                'description_en' => $request->description_en,
                'description_hy' => $request->description_hy,
                'created_at' => \Carbon\Carbon::now()
            ]);

            if($request->hasFile('photo')) {
                $document = $request->photo;
                $fileName = time() . '-' . $document->getClientOriginalName();
                $document->move("resources/assets/images/about_us/", $fileName);
                $photoUrl = "/resources/assets/images/about_us/" . $fileName;

                DB::table('about_us')->where('id',$newId)->update(['photo_url' => $photoUrl]);
            }

            return redirect(route('admin.aboutUs.index'))->with('message','New Item created successfully')->with('type','success');
        } catch(\Exception $exception) {
            return back()->with('message',$exception->getMessage())->with('type','danger');
        }
    }

    public function show($id)
    {
        $item = DB::table('about_us')->find($id);
        return view('admin.aboutUs.show',compact('item'));
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        try {
            DB::table('about_us')->where('id',$id)->update([
                'title_en' => $request->title_en,
                'title_hy' => $request->title_hy,
                'description_en' => $request->description_en,
                'description_hy' => $request->description_hy,
                'updated_at' => \Carbon\Carbon::now()
            ]);
            return redirect(route('admin.aboutUs.index'))->with('message','Item updated successfully')->with('type','success');
        } catch (\Exception $exception) {
            return back()->with('message',$exception->getMessage())->with('type','danger');
        }
    }

    public function destroy($id)
    {
        try {
            DB::table('about_us')->where('id',$id)->delete();
            return $this->success("deleted successfully");
        } catch (\Exception $exception) {
            return $this->fail($exception->getMessage());
        }
    }

    public function imageUpload(Request $request)
    {
        try {
            if($request->hasFile('img')) {
                $document = $request->img;
                $fileName = time() . '-' . $document->getClientOriginalName();
                $document->move("resources/assets/images/about_us/", $fileName);
                $photoUrl = "/resources/assets/images/about_us/" . $fileName;

                DB::table('about_us')->where('id',$request->temp)->update(['photo_url' => $photoUrl]);

                return $this->success("image uploaded successfully");
            } else {
                return $this->fail("invalid image");
            }
        } catch(\Exception $exception) {
            return $this->fail($exception->getMessage());
        }
    }

}

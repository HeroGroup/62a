<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class WhatWeDoController extends Controller
{
    public function index()
    {
        $items = DB::table('what_we_do_items')->get();
        $section = DB::table('sections')->where('position','LIKE','what-we-do')->first();
        return view('admin.whatWeDo.index',compact('items','section'));
    }

    public function create()
    {
        return view('admin.whatWeDo.create');
    }

    public function store(Request $request)
    {
        try {
            $newId = DB::table('what_we_do_items')->insertGetId([
                'title_en' => $request->title_en,
                'title_hy' => $request->title_hy,
                'description_en' => $request->description_en,
                'description_hy' => $request->description_hy,
                'created_at' => \Carbon\Carbon::now()
            ]);

            if($request->hasFile('photo')) {
                $document = $request->photo;
                $fileName = time() . '-' . $document->getClientOriginalName();
                $document->move("resources/assets/images/what_we_do_items/", $fileName);
                $photoUrl = "/resources/assets/images/what_we_do_items/" . $fileName;

                DB::table('what_we_do_items')->where('id',$newId)->update(['photo_url' => $photoUrl]);
            }

            return redirect(route('admin.whatWeDo.index'))->with('message','New item created successfully')->with('type','success');
        } catch(\Exception $exception) {
            return back()->with('message',$exception->getMessage())->with('type','danger');
        }
    }

    public function show($id)
    {
        $item = DB::table('what_we_do_items')->find($id);
        return view('admin.whatWeDo.show',compact('item'));
    }

    public function update(Request $request, $id)
    {
        try {
            DB::table('what_we_do_items')->where('id',$id)->update([
                'title_en' => $request->title_en,
                'title_hy' => $request->title_hy,
                'description_en' => $request->description_en,
                'description_hy' => $request->description_hy,
                'updated_at' => \Carbon\Carbon::now()
            ]);
            return redirect(route('admin.whatWeDo.index'))->with('message','item updated successfully')->with('type','success');
        } catch (\Exception $exception) {
            return back()->with('message',$exception->getMessage())->with('type','danger');
        }
    }

    public function destroy($id)
    {
        try {
            DB::table('what_we_do_items')->where('id',$id)->delete();
            return $this->success("deleted successfully");
        } catch (\Exception $exception) {
            return $this->fail($exception->getMessage());
        }
    }

    public function itemImageUpload(Request $request)
    {
        try {
            if($request->hasFile('img')) {
                $document = $request->img;
                $fileName = time() . '-' . $document->getClientOriginalName();
                $document->move("resources/assets/images/what_we_do_items/", $fileName);
                $photoUrl = "/resources/assets/images/what_we_do_items/" . $fileName;

                DB::table('what_we_do_items')->where('id',$request->temp)->update(['photo_url' => $photoUrl]);

                return $this->success("image uploaded successfully");
            } else {
                return $this->fail("invalid image");
            }
        } catch(\Exception $exception) {
            return $this->fail($exception->getMessage());
        }
    }

    public function updateSection(Request $request)
    {
        try {
            DB::table('sections')->where('position','like','what-we-do')->update([
                'title_en' => $request->title_en,
                'title_hy' => $request->title_hy,
                'description_en' => $request->description_en,
                'description_hy' => $request->description_hy,
                'updated_at' => \Carbon\Carbon::now()
            ]);

            if($request->hasFile('photo')) {
                $document = $request->photo;
                $fileName = time() . '-' . $document->getClientOriginalName();
                $document->move("resources/assets/images/sections/", $fileName);
                $photoUrl = "/resources/assets/images/sections/" . $fileName;

                DB::table('sections')->where('position','like','what-we-do')->update([
                    'image_url' => $photoUrl,
                ]);
            }

            return back()->with('message',"Updated Successfully")->with('type','success');
        } catch (\Exception $exception) {
            return $this->fail($exception->getMessage());
        }
    }
}

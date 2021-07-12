<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BrandController extends Controller
{
    public function index()
    {
        $brands = DB::table('brands')->get();
        return view('admin.brands.index',compact('brands'));
    }

    public function store(Request $request)
    {
        try {
            if(\request()->has('photo')) {
                $photo = $request->photo;
                $fileName = time() . '-' . $photo->getClientOriginalName();
                $photo->move("resources/assets/images/brands/", $fileName);
                $destination = "/resources/assets/images/brands/" . $fileName;

                DB::table('brands')->insertGetId([
                    'brand_name' => $request->brand_name,
                    'photo_url' => $destination
                ]);

                return back()->with('message', 'new employer logo uploaded successfully')->with('type','success');
            } else {
                return back()->with('message', 'please upload a logo.')->with('type','danger');
            }
        } catch (\Exception $exception) {
            return back()->with('message', $exception->getMessage())->with('type', 'danger');
        }
    }

    public function destroy($id)
    {
        try {
            DB::table('brands')->where('id',$id)->delete();
            return $this->success("removed successfully");
        } catch (\Exception $exception) {
            return $this->fail($exception->getMessage());
        }
    }
}

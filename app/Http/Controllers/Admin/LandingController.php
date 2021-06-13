<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LandingController extends Controller
{
    public function index()
    {
        $banners = DB::table('banners')->get();
        return view('admin.landing.index', compact('banners'));
    }

    public function uploadBannerImage(Request $request)
    {
        try {
            if($request->hasFile('img')) {
                $document = $request->img;
                $fileName = time() . '-' . $document->getClientOriginalName();
                $document->move("resources/assets/images/banners/", $fileName);
                $photoUrl = "/resources/assets/images/banners/" . $fileName;

                DB::table('banners')->insert([
                    'image_url' => $photoUrl,
                    'created_at' => \Carbon\Carbon::now()
                ]);

                return $this->success("banner created successfully");
            } else {
                return $this->fail("invalid image");
            }
        } catch(\Exception $exception) {
            return $this->fail($exception->getMessage());
        }
    }

    public function updateBannerDetails(Request $request)
    {
        try {
            DB::table('banners')->where('id',$request->id)->update([
                'title_en' => $request->title_en,
                'title_hy' => $request->title_hy,
                'description_en' => $request->description_en,
                'description_hy' => $request->description_hy,
                'location_en' => $request->location_en,
                'location_hy' => $request->location_hy,
                'is_active' => $request->is_active ? 1 : 0,
                'updated_at' => \Carbon\Carbon::now()
            ]);
            return back()->with('message', 'banner updated successfully')->with('type','success');
        } catch(\Exception $exception) {
            return back()->with('message', $exception->getMessage())->with('type','danger');
        }
    }

    public function deleteBanner(Request $request)
    {
        try {
            DB::table('banners')->where('id',$request->id)->delete();
            return $this->success("deleted successfully");
        } catch (\Exception $exception) {
            return $this->fail($exception->getMessage());
        }
    }
}

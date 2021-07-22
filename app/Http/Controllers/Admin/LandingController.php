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
        $top = DB::table('sections')->where('position','top')->first();
        $bottom = DB::table('sections')->where('position','bottom')->first();

        return view('admin.landing.index', compact('banners','top','bottom'));
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

    public function uploadBannerVideo(Request $request)
    {
        try {
            if ($request->hasFile('video')) {
                $bannerId = $request->id;
                $document = $request->video;
                $fileName = time() . '-' . $document->getClientOriginalName();
                $document->move("resources/assets/videos/banner_videos/$bannerId/", $fileName);
                $videoUrl = "/resources/assets/videos/banner_videos/$bannerId/" . $fileName;

                DB::table('banners')->where('id',$bannerId)->update([
                    'video_url' => $videoUrl,
                    'updated_at' => \Carbon\Carbon::now()
                ]);

                return back()->with('message','video uploaded successfully')->with('type','success');
            } else {
                return back()->with("message","invalid video")->with('type','danger');
            }
        } catch (\Exception $exception) {
            return back()->with('message',$exception->getMessage())->with('type','danger');
        }
    }

    public function deleteBannerVideo(Request $request)
    {
        try {
            DB::table('banners')->where('id',$request->id)->update(['video_url' =>null]);
            return back()->with('message', 'video removed successfully')->with('type','success');
        } catch(\Exception $exception) {
            return back()->with('message', $exception->getMessage())->with('type','danger');
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

    public function updateTopSection(Request $request)
    {
        try {
            DB::table('sections')->where('position','top')->update([
                'title_en' => $request->title_en,
                'title_hy' => $request->title_hy,
                'description_en' => $request->description_en,
                'description_hy' => $request->description_hy,
                'image_title_en' => $request->image_title_en,
                'image_title_hy' => $request->image_title_hy,
                'is_active' => $request->is_active ? 1 : 0,
                'updated_at' => \Carbon\Carbon::now()
            ]);

            if($request->hasFile('photo')) {
                $document = $request->photo;
                $fileName = time() . '-' . $document->getClientOriginalName();
                $document->move("resources/assets/images/sections/", $fileName);
                $photoUrl = "/resources/assets/images/sections/" . $fileName;

                DB::table('sections')->where('position','top')->update([
                    'image_url' => $photoUrl,
                ]);
            }

            return back()->with('message',"Updated Successfully")->with('type','success');
        } catch (\Exception $exception) {
            return $this->fail($exception->getMessage());
        }
    }

    public function updateBottomSection(Request $request)
    {
        try {
            DB::table('sections')->where('position','bottom')->update([
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

                DB::table('sections')->where('position','bottom')->update([
                    'image_url' => $photoUrl,
                ]);
            }

            return back()->with('message',"Updated Successfully")->with('type','success');
        } catch (\Exception $exception) {
            return $this->fail($exception->getMessage());
        }
    }
}

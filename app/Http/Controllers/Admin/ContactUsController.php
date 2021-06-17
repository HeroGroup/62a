<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ContactUsController extends Controller
{
    public function index()
    {
        DB::table('contact_us')
            ->whereNull('viewed_at')
            ->update([
                'viewed_at' => \Carbon\Carbon::now()
            ]);
        $messages = DB::table('contact_us')->get();
        return view('admin.contactUs.index', compact('messages'));
    }

    public function show($id)
    {
        try {
            $contact = DB::table('contact_us')->find($id);
            return view('admin.contactUs.show',compact('contact'));
        } catch (\Exception $exception) {
            return back()->with('message',$exception->getMessage())->with('type','danger');
        }
    }

    public function reply(Request $request)
    {
        return back()->with('message','Email settings has not been set yet!')->with('type','danger');
    }

    public function store(Request $request)
    {
        try {
            DB::table('contact_us')->insert([
                'email' => $request->email,
                'name' => $request->name,
                'message' => $request->message,
            ]);
            return back()->with('message',"message posted successfully.")->with('type','success');
        } catch (\Exception $exception) {
            return back()->with('message',$exception->getMessage())->with('type','danger');
        }
    }

    public function destroy($id)
    {
        try {
            $contact = DB::table('contact_us')->where('id',$id)->delete();
            return $this->success("deleted successfully");
        } catch (\Exception $exception) {
            return $this->fail($exception->getMessage());
        }
    }

    public function newMessages()
    {
        try {
            $count = DB::table('contact_us')->whereNull('viewed_at')->count();
            return $this->success("count= ", $count);
        } catch (\Exception $exception) {
            return $this->fail($exception->getMessage());
        }
    }

    public function officeDetails()
    {
        $details = DB::table('office_details')->first();
        return view('admin.contactUs.officeDetails',compact('details'));
    }

    public function updateOfficeDetails(Request $request)
    {
        try {
            DB::table('office_details')
                ->where('id',$request->id)
                ->update([
                    'title_en' => $request->title_en,
                    'title_hy' => $request->title_hy,
                    'address_en' => $request->address_en,
                    'address_hy' => $request->address_hy,
                    'city_en' => $request->city_en,
                    'city_hy' => $request->city_hy,
                    'email_address' => $request->email_address,
                    'work_hours_en' => $request->work_hours_en,
                    'work_hours_hy' => $request->work_hours_hy,
                    'phone' => $request->phone,
                    'mobile' => $request->mobile,
                    'updated_at' => \Carbon\Carbon::now(),
                ]);

                if($request->hasFile('photo')) {
                    $document = $request->photo;
                    $fileName = time() . '-' . $document->getClientOriginalName();
                    $document->move("resources/assets/images/office/", $fileName);
                    $photoUrl = "/resources/assets/images/office/" . $fileName;

                    DB::table('office_details')
                        ->where('id',$request->id)
                        ->update(['photo_url' => $photoUrl]);
                }

                return back()->with('message','updated successfully')->with('type','success');
        } catch (\Exception $exception) {
            return back()->with('message',$exception->getMessage())->with('type','danger');
        }
    }
}

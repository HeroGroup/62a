<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = DB::table('categories')->get();
        return view('admin.categories.index', compact('categories'));
    }

    public function store(Request $request)
    {
        try {
            DB::table('categories')->insert([
                'title_en' => $request->title_en,
                'title_hy' => $request->title_hy,
                'created_at' => \Carbon\Carbon::now()
            ]);

            return back()->with('message', 'new category created successfully.')->with('type', 'success');
        } catch (\Exception $exception) {
            return back()->with('message', $exception->getMessage())->with('type', 'danger');
        }
    }

    public function update(Request $request, $id)
    {
        try {
            DB::table('categories')->where('id',$id)->update([
                'title_en' => $request->title_en,
                'title_hy' => $request->title_hy,
                'updated_at' => \Carbon\Carbon::now()
            ]);

            return back()->with('message', 'new category created successfully.')->with('type', 'success');
        } catch (\Exception $exception) {
            return back()->with('message', $exception->getMessage())->with('type', 'danger');
        }
    }

    public function destroy($id)
    {
        try {
            DB::table('categories')->where('id',$id)->delete();
            return $this->success("Category removed successfully.");
        } catch (\Exception $exception) {
            return $this->fail($exception->getMessage());
        }
    }
}

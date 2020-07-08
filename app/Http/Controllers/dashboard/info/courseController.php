<?php

namespace App\Http\Controllers\dashboard\info;

use App\t_info_subcategory;
use App\t_info_course;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class courseController extends Controller
{
    public function index()
    {
        $courses = t_info_course::all();
        $subcategories = t_info_subcategory::all();

        return view('/dashboard/info/lain/course/index', ['courses' => $courses, 'subcategories' => $subcategories]);
    }

    // Insert Database course
    public function store(Request $request)
    {
        t_info_course::create([
            'course_name' => $request->course,
            't_info_subcategory_id' => $request->subcategory,
            'icon' => $request->icon,
            'status' => $request->status,
            'creator' => Auth::user()->name,
            'created_at' => now()
        ]);

        return redirect('dash/info/lain/course')->with('status', 'Successfully Added!');
    }

    // Edit & Update Database course
    public function edit($id)
    {
        $course = t_info_course::where('id', $id)->first();
        $subcategories = t_info_subcategory::all();

        return view('dashboard/info/lain/course/edit', ['course' => $course, 'subcategories' => $subcategories]);
    }
    public function update(Request $request, $id)
    {
        t_info_course::where('id', $id)
            ->update([
                'course_name' => $request->course,
                't_info_subcategory_id' => $request->subcategory,
                'icon' => $request->icon,
                'status' => $request->status,
                'creator' => Auth::user()->name,
                'updated_at' => now()
            ]);

        return redirect('dash/info/lain/course')->with('status', 'Successfully Updated!');
    }

    // Delete Database course
    public function destroy($id)
    {
        t_info_course::destroy($id);
        return redirect('/dash/info/lain/course');
    }
}

<?php

namespace App\Http\Controllers\dashboard\materi;

use App\t_materi_subcategory;
use App\t_materi_course;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class courseController extends Controller
{
    public function index()
    {
        $subcategories = t_materi_subcategory::all();
        $courses = t_materi_course::all();

        return view('dashboard/materi/course/index', ['courses' => $courses, 'subcategories' => $subcategories]);
    }

    // Insert Database Course
    public function store(Request $request)
    {
        t_materi_course::create([
            'course_name' => $request->course,
            't_materi_subcategory_id' => $request->subcategory,
            'icon' => $request->icon,
            'status' => $request->status,
            'creator' => Auth::user()->name,
            'created_at' => now()
        ]);

        return redirect('dash/materi/course')->with('status', 'Successfully Added!');
    }

    // Edit & Update Database Course
    public function edit($id)
    {
        $course = t_materi_course::where('id', $id)->first();
        $subcategories = t_materi_subcategory::all();

        return view('dashboard/materi/course/edit', ['course' => $course, 'subcategories' => $subcategories]);
    }
    public function update(Request $request, $id)
    {
        t_materi_course::where('id', $id)
            ->update([
                'course_name' => $request->course,
                't_materi_subcategory_id' => $request->subcategory,
                'status' => $request->status,
                'creator' => Auth::user()->name,
                'updated_at' => now()
            ]);

        return redirect('/dash/materi/course')->with('status', 'Successfully Updated!');
    }

    // Delete Database Course
    public function destroy($id)
    {
        t_materi_course::destroy($id);
        return redirect('/dash/materi/course');
    }
}

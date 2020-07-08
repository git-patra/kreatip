<?php

namespace App\Http\Controllers\dashboard\materi;

use App\t_materi_subcategory;
use App\t_materi_category;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class subcategoryController extends Controller
{
    public function index()
    {
        $categories = t_materi_category::all();
        $subcategories = t_materi_subcategory::all();

        return view('dashboard/materi/subcategory/index', ['categories' => $categories, 'subcategories' => $subcategories]);
    }

    // Insert Database SubCategory
    public function store(Request $request)
    {
        t_materi_subcategory::create([
            'subcategory_name' => $request->subcategory,
            't_materi_category_id' => $request->category,
            'icon' => $request->icon,
            'status' => $request->status,
            'creator' => Auth::user()->name,
            'created_at' => now()
        ]);

        return redirect('dash/materi/subcategory')->with('status', 'Successfully Added!');
    }

    // Edit & Update Database SubCategory
    public function edit($id)
    {
        $subcategory = t_materi_subcategory::where('id', $id)->first();
        $categories = t_materi_category::all();

        return view('dashboard/materi/subcategory/edit', ['categories' => $categories, 'subcategory' => $subcategory]);
    }
    public function update(Request $request, $id)
    {
        t_materi_subcategory::where('id', $id)
            ->update([
                'subcategory_name' => $request->subcategory,
                't_materi_category_id' => $request->category,
                'icon' => $request->icon,
                'status' => $request->status,
                'creator' => Auth::user()->name,
                'updated_at' => now()
            ]);

        return redirect('/dash/materi/subcategory')->with('status', 'Successfully Updated!');
    }

    // Delete Database SubCategory
    public function destroy($id)
    {
        t_materi_subcategory::destroy($id);
        return redirect('/dash/materi/subcategory');
    }
}

<?php

namespace App\Http\Controllers\dashboard\info;

use App\t_info_category;
use App\t_info_subcategory;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class subcategoryController extends Controller
{
    public function index()
    {
        $categories = t_info_category::all();
        $subcategories = t_info_subcategory::all();

        return view('dashboard/info/subcategory/index', ['categories' => $categories, 'subcategories' => $subcategories]);
    }

    // Insert Database SubCategory
    public function store(Request $request)
    {
        t_info_subcategory::create([
            'subcategory_name' => $request->subcategory,
            't_info_category_id' => $request->category,
            'status' => $request->status,
            'creator' => Auth::user()->name,
            'created_at' => now()
        ]);

        return redirect('dash/info/subcategory')->with('status', 'Successfully Added!');
    }

    // Edit & Update Database SubCategory
    public function edit($id)
    {
        $subcategory = t_info_subcategory::where('id', $id)->first();
        $categories = t_info_category::all();

        return view('dashboard/info/subcategory/edit', ['categories' => $categories, 'subcategory' => $subcategory]);
    }
    public function update(Request $request, $id)
    {
        t_info_subcategory::where('id', $id)
            ->update([
                'subcategory_name' => $request->subcategory,
                't_info_category_id' => $request->category,
                'status' => $request->status,
                'creator' => Auth::user()->name,
                'updated_at' => now()
            ]);

        return redirect('/dash/info/subcategory')->with('status', 'Successfully Updated!');
    }

    // Delete Database SubCategory
    public function destroy($id)
    {
        t_info_subcategory::destroy($id);
        return redirect('/dash/info/subcategory');
    }
}

<?php

namespace App\Http\Controllers\dashboard\info;

use App\t_info_category;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class categoryController extends Controller
{
    public function index()
    {
        $categories = t_info_category::all();

        return view('dashboard/info/category/index', ['categories' => $categories]);
    }

    // Insert Database Category
    public function store(Request $request)
    {
        t_info_category::create([
            'category_name' => $request->category,
            'status' => $request->status,
            'creator' => Auth::user()->name,
            'created_at' => now()
        ]);

        return redirect('dash/info/category')->with('status', 'Successfully Added!');
    }

    // Edit & Update Database Category
    public function edit($id)
    {
        $category = t_info_category::where('id', $id)->first();

        return view('dashboard/info/category/edit', ['category' => $category]);
    }
    public function update(Request $request, $id)
    {
        t_info_category::where('id', $id)
            ->update([
                'category_name' => $request->category,
                'status' => $request->status,
                'creator' => Auth::user()->name,
                'updated_at' => now()
            ]);

        return redirect('/dash/info/category')->with('status', 'Successfully Updated!');
    }

    // Delete Database Category
    public function destroy($id)
    {
        t_info_category::destroy($id);
        return redirect('/dash/info/category');
    }
}

<?php

namespace App\Http\Controllers\dashboard\materi;

use App\t_materi_category;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class categoryController extends Controller
{
    public function index()
    {
        $categories = t_materi_category::all();

        return view('dashboard/materi/category/index', ['categories' => $categories]);
    }

    // Insert Database Category
    public function store(Request $request)
    {
        t_materi_category::create([
            'category_name' => $request->category,
            'status' => $request->status,
            'creator' => Auth::user()->name,
            'created_at' => now()
        ]);

        return redirect('dash/materi/category')->with('status', 'Successfully Added!');
    }

    // Edit & Update Database Category
    public function edit($id)
    {
        $category = t_materi_category::where('id', $id)->first();

        return view('dashboard/materi/category/edit', ['category' => $category]);
    }
    public function update(Request $request, $id)
    {
        t_materi_category::where('id', $id)
            ->update([
                'category_name' => $request->category,
                'status' => $request->status,
                'creator' => Auth::user()->name,
                'updated_at' => now()
            ]);

        return redirect('/dash/materi/category')->with('status', 'Successfully Updated!');
    }

    // Delete Database Category
    public function destroy($id)
    {
        t_materi_category::destroy($id);
        return redirect('/dash/materi/category');
    }
}

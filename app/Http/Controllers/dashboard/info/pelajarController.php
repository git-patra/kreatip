<?php

namespace App\Http\Controllers\dashboard\info;

use App\t_info_subcategory;
use App\t_info_pelajar;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class pelajarController extends Controller
{
    public function index()
    {
        $pelajars = t_info_pelajar::all();
        $subcategories = t_info_subcategory::all();

        return view('/dashboard/info/lain/pelajar/index', ['pelajars' => $pelajars, 'subcategories' => $subcategories]);
    }

    // Insert Database Pelajar
    public function store(Request $request)
    {
        t_info_pelajar::create([
            'pelajar_name' => $request->pelajar,
            't_info_subcategory_id' => $request->subcategory,
            'status' => $request->status,
            'creator' => Auth::user()->name,
            'created_at' => now()
        ]);

        return redirect('dash/info/lain/pelajar')->with('status', 'Successfully Added!');
    }

    // Edit & Update Database Pelajar
    public function edit($id)
    {
        $pelajar = t_info_pelajar::where('id', $id)->first();
        $subcategories = t_info_subcategory::all();

        return view('dashboard/info/lain/pelajar/edit', ['pelajar' => $pelajar, 'subcategories' => $subcategories]);
    }
    public function update(Request $request, $id)
    {
        t_info_pelajar::where('id', $id)
            ->update([
                'pelajar_name' => $request->pelajar,
                't_info_subcategory_id' => $request->subcategory,
                'status' => $request->status,
                'creator' => Auth::user()->name,
                'updated_at' => now()
            ]);

        return redirect('dash/info/lain/pelajar')->with('status', 'Successfully Updated!');
    }

    // Delete Database Pelajar
    public function destroy($id)
    {
        t_info_pelajar::destroy($id);
        return redirect('/dash/info/lain/pelajar');
    }
}

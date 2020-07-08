<?php

namespace App\Http\Controllers\dashboard\info;

use App\t_info_subcategory;
use App\t_info_continent;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class continentController extends Controller
{
    public function index()
    {
        $continents = t_info_continent::all();
        $subcategories = t_info_subcategory::all();

        return view('/dashboard/info/lain/continent/index', ['continents' => $continents, 'subcategories' => $subcategories]);
    }

    // Insert Database continent
    public function store(Request $request)
    {
        t_info_continent::create([
            'continent_name' => $request->continent,
            't_info_subcategory_id' => $request->subcategory,
            'status' => $request->status,
            'creator' => Auth::user()->name,
            'created_at' => now()
        ]);

        return redirect('dash/info/lain/continent')->with('status', 'Successfully Added!');
    }

    // Edit & Update Database continent
    public function edit($id)
    {
        $continent = t_info_continent::where('id', $id)->first();
        $subcategories = t_info_subcategory::all();

        return view('dashboard/info/lain/continent/edit', ['continent' => $continent, 'subcategories' => $subcategories]);
    }
    public function update(Request $request, $id)
    {
        t_info_continent::where('id', $id)
            ->update([
                'continent_name' => $request->continent,
                't_info_subcategory_id' => $request->subcategory,
                'status' => $request->status,
                'creator' => Auth::user()->name,
                'updated_at' => now()
            ]);

        return redirect('dash/info/lain/continent')->with('status', 'Successfully Updated!');
    }

    // Delete Database continent
    public function destroy($id)
    {
        t_info_continent::destroy($id);
        return redirect('/dash/info/lain/continent');
    }
}

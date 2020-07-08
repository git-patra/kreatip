<?php

namespace App\Http\Controllers\dashboard\info;

use App\t_info_country;
use App\t_info_continent;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class countryController extends Controller
{
    public function index()
    {
        $countries = t_info_country::all();
        $continents = t_info_continent::all();

        return view('/dashboard/info/lain/country/index', ['countries' => $countries, 'continents' => $continents]);
    }

    // Insert Database country
    public function store(Request $request)
    {
        t_info_country::create([
            'country_name' => $request->country,
            't_info_continent_id' => $request->continent,
            'status' => $request->status,
            'creator' => Auth::user()->name,
            'created_at' => now()
        ]);

        return redirect('dash/info/lain/country')->with('status', 'Successfully Added!');
    }

    // Edit & Update Database country
    public function edit($id)
    {
        $country = t_info_country::where('id', $id)->first();
        $continents = t_info_continent::all();

        return view('dashboard/info/lain/country/edit', ['country' => $country, 'continents' => $continents]);
    }
    public function update(Request $request, $id)
    {
        t_info_country::where('id', $id)
            ->update([
                'country_name' => $request->country,
                't_info_continent_id' => $request->continent,
                'status' => $request->status,
                'creator' => Auth::user()->name,
                'updated_at' => now()
            ]);

        return redirect('dash/info/lain/country')->with('status', 'Successfully Updated!');
    }

    // Delete Database country
    public function destroy($id)
    {
        t_info_country::destroy($id);
        return redirect('/dash/info/lain/country');
    }
}

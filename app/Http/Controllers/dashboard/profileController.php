<?php

namespace App\Http\Controllers\dashboard;

use App\User;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

class profileController extends Controller
{
    public function index()
    {
        return view('dashboard/profile/index');
    }

    public function update(Request $request, $id)
    {
        $fileImg = User::select('id', 'img')->where('id', $id)->first();

        if ($request->img) {
            if ($request->hasFile('img')) {
                $this->validate($request, [
                    'img' => 'image'
                ]);

                $file       = $request->file('img');
                $fileName   = $file->getClientOriginalName();
                $filepath = 'public/profile/img/' . $fileImg->img;

                Storage::delete($filepath);

                $request->file('img')->storeAs('public/profile/img', $fileName);
            }
        } else {
            $fileName = $fileImg->img;
        }

        User::where('id', $id)
            ->update([
                'name' => $request->name,
                'email' => $request->email,
                'img' => $fileName,
                'ig' => $request->ig,
                'fb' => $request->fb,
                'twt' => $request->twt,
                'updated_at' => now()
            ]);

        return redirect('/dash/auth/profile')->with('status', 'Successfully Updated!');
    }
}

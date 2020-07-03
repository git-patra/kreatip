<?php

namespace App\Http\Controllers\search;

use App\t_info_blog;
use App\t_materi_blog;
use App\t_tips_blog;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class indexController extends Controller
{
    function index(Request $request)
    {
        $belajars = t_materi_blog::where('blog_post', 'like', '%' . $request->searchArtikel . '%')->orWhere('blog_title', 'like', '%' . $request->searchArtikel . '%')->get();
        $tips = t_tips_blog::where('blog_post', 'like', '%' . $request->searchArtikel . '%')->orWhere('blog_title', 'like', '%' . $request->searchArtikel . '%')->get();
        $infos = t_info_blog::where('blog_post', 'like', '%' . $request->searchArtikel . '%')->orWhere('blog_title', 'like', '%' . $request->searchArtikel . '%')->get();

        return view('search', [
            'belajars' => $belajars,
            'tips' => $tips,
            'infos' => $infos
        ]);
    }
}

<?php

namespace App\Http\Controllers\tips;

use App\t_tips_blog;
use App\t_info_blog;
use App\t_materi_blog;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class indexController extends Controller
{
    function index()
    {
        $tips = t_tips_blog::all()->random(3);
        $tips1 = t_tips_blog::all()->random(3);
        $tips2 = t_tips_blog::all()->random(3);
        $tips3 = t_tips_blog::all()->random(3);
        $alltips = t_tips_blog::latest('created_at')->get();
        $infos = t_info_blog::all()->random(3);
        $belajars = t_materi_blog::all()->random(3);

        return view('tips/index', [
            'tips' => $tips,
            'tips1' => $tips1,
            'tips2' => $tips2,
            'tips3' => $tips3,
            'alltips' => $alltips,
            'infos' => $infos,
            'belajars' => $belajars,
        ]);
    }
    function article($title)
    {
        $title = str_replace('-', ' ', $title);

        $article = t_tips_blog::where('blog_title', $title)->first();
        $infos = t_info_blog::all()->random(3);
        $belajars = t_materi_blog::all()->random(3);

        return view('tips/article', [
            'article' => $article,
            'infos' => $infos,
            'belajars' => $belajars,
        ]);
    }
}

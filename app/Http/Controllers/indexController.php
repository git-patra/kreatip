<?php

namespace App\Http\Controllers;

use App\t_materi_blog;
use App\t_tips_blog;
use App\t_info_blog;


use Illuminate\Http\Request;

class indexController extends Controller
{
    function index()
    {
        $belajars = t_materi_blog::all()->random(3);
        $tips = t_tips_blog::all()->random(3);
        $infos = t_info_blog::all()->random(3);

        return view('index', [
            'belajars' => $belajars,
            'tips' => $tips,
            'infos' => $infos,
        ]);
    }
}

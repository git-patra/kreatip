<?php

namespace App\Http\Controllers\info;

use App\t_tips_blog;
use App\t_info_blog;
use App\t_materi_blog;

use App\t_info_category;

use App\Http\Controllers\Controller;
use App\t_info_continent;
use App\t_info_country;
use App\t_info_course;
use App\t_info_pelajar;
use App\t_info_subcategory;
use Illuminate\Http\Request;

class indexController extends Controller
{
    function index()
    {
        $beasiswas = t_info_blog::all()->where('t_info_category_id', 1)->random(3);
        $pelatihans = t_info_blog::all()->where('t_info_category_id', 2)->random(3);
        $belajars = t_materi_blog::all()->random(3);
        $tips = t_tips_blog::all()->random(3);

        $categories = t_info_category::all();

        return view('info/index', [
            'tips' => $tips,
            'beasiswas' => $beasiswas,
            'pelatihans' => $pelatihans,
            'belajars' => $belajars,
            'categories' => $categories,
        ]);
    }
    function category($category)
    {
        $category = t_info_category::where('category_name', $category)->first();

        $articles = t_info_blog::where('t_info_category_id', $category->id)->latest('created_at')->get();
        $pelajars = t_info_pelajar::all();
        $continents = t_info_continent::all();
        $countries = t_info_country::all();
        $pelatihans = t_info_subcategory::where('t_info_category_id', $category->id)->get();
        $courses = t_info_course::all();

        $belajars = t_materi_blog::all()->random(3);
        $tips = t_tips_blog::all()->random(3);

        return view('info/more', [
            'tips' => $tips,
            'belajars' => $belajars,
            'category' => $category,
            'pelajars' => $pelajars,
            'continents' => $continents,
            'countries' => $countries,
            'pelatihans' => $pelatihans,
            'courses' => $courses,
            'articles' => $articles
        ]);
    }
    function article($category, $title)
    {
        $title = str_replace('-', ' ', $title);
        $category = t_info_category::where('category_name', $category)->first();

        $article = t_info_blog::where('blog_title', $title)->first();
        $pelajars = t_info_pelajar::all();
        $continents = t_info_continent::all();
        $countries = t_info_country::all();
        $pelatihans = t_info_subcategory::where('t_info_category_id', $category->id)->get();
        $courses = t_info_course::all();

        $belajars = t_materi_blog::all()->random(3);
        $tips = t_tips_blog::all()->random(3);

        return view('info/article', [
            'tips' => $tips,
            'belajars' => $belajars,
            'category' => $category,
            'pelajars' => $pelajars,
            'continents' => $continents,
            'countries' => $countries,
            'pelatihans' => $pelatihans,
            'courses' => $courses,
            'article' => $article
        ]);
    }
}

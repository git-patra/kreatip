<?php

namespace App\Http\Controllers\materi;

use App\t_materi_blog;
use App\t_materi_category;
use App\t_materi_subcategory;
use App\t_materi_course;

use App\t_tips_blog;
use App\t_info_blog;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class indexController extends Controller
{
    function index()
    {
        $categories = t_materi_category::all();
        $subcategories = t_materi_subcategory::all();

        $tips = t_tips_blog::all()->random(3);
        $infos = t_info_blog::all()->random(3);

        return view('materi/index', [
            'categories' => $categories,
            'subcategories' => $subcategories,
            'tips' => $tips,
            'infos' => $infos,
        ]);
    }
    function course($subcategory)
    {
        $subcat = t_materi_subcategory::where('subcategory_name', $subcategory)->first();
        $courses = t_materi_course::where('t_materi_subcategory_id', $subcat->id)->get();

        $tips = t_tips_blog::all()->random(3);
        $infos = t_info_blog::all()->random(3);

        if ($subcat->status === 1) {
            return view('materi/course', [
                'tips' => $tips,
                'infos' => $infos,
                'subcategory' => $subcat,
                'courses' => $courses
            ]);
        } else {
            return view('materi/sorry');
        }
    }
    function article($course, $title)
    {
        $title = str_replace('-', ' ', $title);
        $course = str_replace('-', ' ', $course);

        $course = t_materi_course::where('course_name', $course)->first();
        $subcat = t_materi_subcategory::where('id', $course->t_materi_subcategory_id)->first();
        $courses = t_materi_course::where('t_materi_subcategory_id', $subcat->id)->get();

        $articles = t_materi_blog::where('t_materi_course_id', $course->id)->get();
        $article = t_materi_blog::where('bab_mapel', $title)->first();

        $tips = t_tips_blog::all()->random(3);
        $infos = t_info_blog::all()->random(3);

        return view('materi/article', [
            'subcategory' => $subcat,
            'courses' => $courses,
            'course' => $course,
            'articles' => $articles,
            'article' => $article,
            'tips' => $tips,
            'infos' => $infos,
        ]);
    }
}

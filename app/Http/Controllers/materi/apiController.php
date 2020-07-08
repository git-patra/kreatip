<?php

namespace App\Http\Controllers\materi;

use App\t_materi_category;
use App\t_materi_subcategory;
use App\t_materi_course;
use App\t_materi_blog;

use App\Http\Resources\MateriBlog as BlogResource;
use App\Http\Resources\MateriCourse as CourseResource;
use App\Http\Resources\MateriSubcategory as SubcategoryResource;
use App\Http\Resources\MateriCategory as CategoryResource;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class apiController extends Controller
{
    function blogs()
    {
        return BlogResource::collection(t_materi_blog::all());
    }

    function course()
    {
        return CourseResource::collection(t_materi_course::all());
    }

    function search($keyword)
    {
        $result = t_materi_blog::where('blog_title', 'like', '%' . $keyword . '%')->get();
        return BlogResource::collection($result);
    }
}

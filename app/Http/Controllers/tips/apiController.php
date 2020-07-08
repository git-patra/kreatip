<?php

namespace App\Http\Controllers\tips;

use App\t_tips_blog;
use App\t_tips_category;

use App\Http\Resources\TipsBlog as BlogResource;
use App\Http\Resources\TipsCategory as CategoryResource;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class apiController extends Controller
{
    function blogs()
    {
        return BlogResource::collection(t_tips_blog::all());
    }

    function search($keyword)
    {
        $result = t_tips_blog::where('blog_title', 'like', '%' . $keyword . '%')->get();
        return BlogResource::collection($result);
    }
}

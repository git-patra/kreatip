<?php

namespace App\Http\Controllers\info;

use App\t_info_blog;
use App\t_info_category;
use App\t_info_subcategory;
use App\t_info_continent;
use App\t_info_country;
use App\t_info_pelajar;
use App\t_info_course;

use App\Http\Resources\InfoBlog as BlogResource;
use App\Http\Resources\InfoCategory as CategoryResource;
use App\Http\Resources\InfoSubcategory as SubcategoryResource;
use App\Http\Resources\InfoContinent as ContinentResource;
use App\Http\Resources\InfoCountry as CountryResource;
use App\Http\Resources\InfoPelajar as PelajarResource;
use App\Http\Resources\InfoCourse as CourseResource;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class apiController extends Controller
{
    function blogs()
    {
        return BlogResource::collection(t_info_blog::all());
    }

    function categories()
    {
        return CategoryResource::collection(t_info_category::all());
    }

    function subcategories()
    {
        return SubcategoryResource::collection(t_info_subcategory::all());
    }

    function pelajars()
    {
        return PelajarResource::collection(t_info_pelajar::all());
    }

    function continents()
    {
        return ContinentResource::collection(t_info_continent::all());
    }

    function countries()
    {
        return CountryResource::collection(t_info_country::all());
    }

    function courses()
    {
        return CourseResource::collection(t_info_course::all());
    }

    function search($keyword)
    {
        $result = t_info_blog::where('blog_title', 'like', '%' . $keyword . '%')->get();
        return BlogResource::collection($result);
    }
}

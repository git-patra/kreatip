<?php

namespace App\Http\Controllers\dashboard\info;

use App\t_info_blog;
use App\t_info_category;
use App\t_info_subcategory;
use App\t_info_pelajar;
use App\t_info_continent;
use App\t_info_country;
use App\t_info_course;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

class articleController extends Controller
{
    public function index()
    {
        $articles = t_info_blog::orderBy('created_at', 'desc')->paginate(10);

        return view('dashboard/info/article/index', [
            'articles' => $articles
        ]);
    }

    // Create New Article
    public function create()
    {
        $categories = t_info_category::all();

        return view('dashboard/info/article/create', [
            'categories' => $categories
        ]);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'imgthumb' => 'required|image'
        ]);

        $file       = $request->file('imgthumb');
        $fileName   = $file->getClientOriginalName();

        $request->file('imgthumb')->storeAs("public/info/img/", $fileName);

        t_info_blog::create([
            'blog_title' => $request->judul,
            't_info_category_id' => $request->category,
            't_info_subcategory_id' => $request->subcategory,
            't_info_pelajar_id' => $request->pelajar,
            't_info_country_id' => $request->country,
            't_info_course_id' => $request->course,
            'img_thumb' => $fileName,
            'img_source' => $request->sourceImg,
            'meta_title' => $request->metaTitle,
            'meta_desc' => $request->metaDesc,
            'blog_post' => $request->kontenpost,
            'creator' => Auth::user()->name,
            'created_at' => now()
        ]);

        return redirect('dash/info/article')->with('status', 'Successfully Published!');
    }

    // Upload Image on Ckeditor textarea
    public function upimage(Request $request)
    {
        if ($request->hasFile('upload')) {
            $originName = $request->file('upload')->getClientOriginalName();
            $fileName = pathinfo($originName, PATHINFO_FILENAME);
            $extension = $request->file('upload')->getClientOriginalExtension();
            $fileName = $fileName . '_' . time() . '.' . $extension;

            $request->file('upload')->storeAs('public/info/img', $fileName);

            $CKEditorFuncNum = $request->input('CKEditorFuncNum');
            $url = asset('storage/info/img/' . $fileName);
            $msg = 'Image uploaded successfully';
            $response = "<script>window.parent.CKEDITOR.tools.callFunction($CKEditorFuncNum, '$url', '$msg')</script>";

            @header('Content-type: text/html; charset=utf-8');
            echo $response;
        }
    }

    // Edit Article
    public function edit($id)
    {
        $article = t_info_blog::where('id', $id)->first();
        $categories = t_info_category::all();
        $subcategories = t_info_subcategory::all();
        $pelajars = t_info_pelajar::all();
        $continents = t_info_continent::all();
        $countries = t_info_country::all();
        $courses = t_info_course::all();

        return view('dashboard/info/article/edit', [
            'article' => $article,
            'categories' => $categories,
            'subcategories' => $subcategories,
            'pelajars' => $pelajars,
            'continents' => $continents,
            'countries' => $countries,
            'courses' => $courses
        ]);
    }
    public function update(Request $request, $id)
    {
        $fileImg = t_info_blog::select('id', 'img_thumb')->where('id', $id)->first();

        if ($request->imgthumb) {
            if ($request->hasFile('imgthumb')) {
                $this->validate($request, [
                    'imgthumb' => 'image'
                ]);

                $file       = $request->file('imgthumb');
                $fileName   = $file->getClientOriginalName();
                $filepath = 'public/info/img/' . $fileImg->img_thumb;

                Storage::delete($filepath);

                $request->file('imgthumb')->storeAs('public/info/img', $fileName);
            }
        } else {
            $fileName = $fileImg->img_thumb;
        }

        t_info_blog::where('id', $id)
            ->update([
                'blog_title' => $request->judul,
                't_info_category_id' => ($request->category) ? $request->category : 0,
                't_info_subcategory_id' => ($request->subcategory) ? $request->subcategory : 0,
                't_info_pelajar_id' => ($request->pelajar) ? $request->pelajar : 0,
                't_info_country_id' => ($request->country) ? $request->country : 0,
                't_info_course_id' => ($request->course) ? $request->course : 0,
                'img_thumb' => $fileName,
                'img_source' => $request->sourceImg,
                'blog_post' => $request->kontenpost,
                'meta_title' => $request->metaTitle,
                'meta_desc' => $request->metaDesc,
                'creator' => Auth::user()->name,
                'updated_at' => now()
            ]);

        return redirect('/dash/info/article')->with('status', 'Successfully Updated!');
    }

    // Delete Article
    public function destroy($id)
    {
        t_info_blog::destroy($id);
        return redirect('/dash/info/article');
    }
}

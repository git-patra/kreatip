<?php

namespace App\Http\Controllers\dashboard\materi;

use App\t_materi_blog;
use App\t_materi_subcategory;
use App\t_materi_course;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

class articleController extends Controller
{
    public function index()
    {
        $articles = t_materi_blog::orderBy('created_at', 'desc')->paginate(10);

        return view('dashboard/materi/article/index', [
            'articles' => $articles
        ]);
    }

    // Create New Article
    public function create()
    {
        $subcategories = t_materi_subcategory::all();
        $courses = t_materi_course::all();

        return view('dashboard/materi/article/create', [
            'subcategories' => $subcategories,
            'courses' => $courses
        ]);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'imgthumb' => 'required|image'
        ]);

        $file       = $request->file('imgthumb');
        $fileName   = $file->getClientOriginalName();

        $request->file('imgthumb')->storeAs("public/materi/img/", $fileName);

        t_materi_blog::create([
            'bab_mapel' => $request->mapel,
            't_materi_course_id' => $request->course,
            'blog_title' => $request->judul,
            'img_thumb' => $fileName,
            'img_source' => $request->sourceImg,
            'meta_title' => $request->metaTitle,
            'meta_desc' => $request->metaDesc,
            'blog_post' => $request->kontenpost,
            'creator' => Auth::user()->name,
            'created_at' => now()
        ]);

        return redirect('dash/materi/article')->with('status', 'Successfully Published!');
    }

    // Upload Image on Ckeditor textarea
    public function upimage(Request $request)
    {
        if ($request->hasFile('upload')) {
            $originName = $request->file('upload')->getClientOriginalName();
            $fileName = pathinfo($originName, PATHINFO_FILENAME);
            $extension = $request->file('upload')->getClientOriginalExtension();
            $fileName = $fileName . '_' . time() . '.' . $extension;

            $request->file('upload')->storeAs('public/materi/img', $fileName);

            $CKEditorFuncNum = $request->input('CKEditorFuncNum');
            $url = asset('storage/materi/img/' . $fileName);
            $msg = 'Image uploaded successfully';
            $response = "<script>window.parent.CKEDITOR.tools.callFunction($CKEditorFuncNum, '$url', '$msg')</script>";

            @header('Content-type: text/html; charset=utf-8');
            echo $response;
        }
    }

    // Edit Article
    public function edit($id)
    {
        $article = t_materi_blog::where('id', $id)->first();
        $subcategories = t_materi_subcategory::all();
        $courses = t_materi_course::all();

        return view('dashboard/materi/article/edit', [
            'article' => $article,
            'subcategories' => $subcategories,
            'courses' => $courses
        ]);
    }
    public function update(Request $request, $id)
    {
        $fileImg = t_materi_blog::select('id', 'img_thumb')->where('id', $id)->first();

        if ($request->imgthumb) {
            if ($request->hasFile('imgthumb')) {
                $this->validate($request, [
                    'imgthumb' => 'image'
                ]);

                $file       = $request->file('imgthumb');
                $fileName   = $file->getClientOriginalName();
                $filepath = 'public/materi/img/' . $fileImg->img_thumb;

                Storage::delete($filepath);

                $request->file('imgthumb')->storeAs('public/materi/img', $fileName);
            }
        } else {
            $fileName = $fileImg->img_thumb;
        }

        t_materi_blog::where('id', $id)
            ->update([
                'bab_mapel' => $request->mapel,
                't_materi_course_id' => $request->course,
                'blog_title' => $request->judul,
                'img_thumb' => $fileName,
                'img_source' => $request->sourceImg,
                'blog_post' => $request->kontenpost,
                'meta_title' => $request->metaTitle,
                'meta_desc' => $request->metaDesc,
                'creator' => Auth::user()->name,
                'updated_at' => now()
            ]);

        return redirect('/dash/materi/article')->with('status', 'Successfully Updated!');
    }

    // Delete Article
    public function destroy($id)
    {
        t_materi_blog::destroy($id);
        return redirect('/dash/materi/article');
    }
}

<?php

namespace App\Http\Controllers\dashboard\tips;

use App\t_tips_blog;
use App\t_tips_category;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

class articleController extends Controller
{
    public function index()
    {
        $articles = t_tips_blog::paginate(10);

        return view('dashboard/tips/article/index', [
            'articles' => $articles
        ]);
    }

    // Create New Article
    public function create()
    {
        $categories = t_tips_category::all();

        return view('dashboard/tips/article/create', [
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

        $request->file('imgthumb')->storeAs("public/tips/img/", $fileName);

        t_tips_blog::create([
            'blog_title' => $request->judul,
            't_tips_category_id' => $request->category,
            'img_thumb' => $fileName,
            'img_source' => $request->sourceImg,
            'meta_title' => $request->metaTitle,
            'meta_desc' => $request->metaDesc,
            'blog_post' => $request->kontenpost,
            'creator' => Auth::user()->name,
            'created_at' => now()
        ]);

        return redirect('dash/tips/article')->with('status', 'Successfully Published!');
    }

    // Upload Image on Ckeditor textarea
    public function upimage(Request $request)
    {
        if ($request->hasFile('upload')) {
            $originName = $request->file('upload')->getClientOriginalName();
            $fileName = pathinfo($originName, PATHINFO_FILENAME);
            $extension = $request->file('upload')->getClientOriginalExtension();
            $fileName = $fileName . '_' . time() . '.' . $extension;

            $request->file('upload')->storeAs('public/tips/img', $fileName);

            $CKEditorFuncNum = $request->input('CKEditorFuncNum');
            $url = asset('storage/tips/img/' . $fileName);
            $msg = 'Image uploaded successfully';
            $response = "<script>window.parent.CKEDITOR.tools.callFunction($CKEditorFuncNum, '$url', '$msg')</script>";

            @header('Content-type: text/html; charset=utf-8');
            echo $response;
        }
    }

    // Edit Article
    public function edit($id)
    {
        $article = t_tips_blog::where('id', $id)->first();
        $categories = t_tips_category::all();

        return view('dashboard/tips/article/edit', [
            'article' => $article,
            'categories' => $categories
        ]);
    }
    public function update(Request $request, $id)
    {
        $fileImg = t_tips_blog::select('id', 'img_thumb')->where('id', $id)->first();

        if ($request->imgthumb) {
            if ($request->hasFile('imgthumb')) {
                $this->validate($request, [
                    'imgthumb' => 'image'
                ]);

                $file       = $request->file('imgthumb');
                $fileName   = $file->getClientOriginalName();
                $filepath = 'public/tips/img/' . $fileImg->img_thumb;

                Storage::delete($filepath);

                $request->file('imgthumb')->storeAs('public/tips/img', $fileName);
            }
        } else {
            $fileName = $fileImg->img_thumb;
        }

        t_tips_blog::where('id', $id)
            ->update([
                'blog_title' => $request->judul,
                't_tips_category_id' => $request->category,
                'img_thumb' => $fileName,
                'img_source' => $request->sourceImg,
                'blog_post' => $request->kontenpost,
                'meta_title' => $request->metaTitle,
                'meta_desc' => $request->metaDesc,
                'creator' => Auth::user()->name,
                'updated_at' => now()
            ]);

        return redirect('/dash/tips/article')->with('status', 'Successfully Updated!');
    }

    // Delete Article
    public function destroy($id)
    {
        t_tips_blog::destroy($id);
        return redirect('/dash/tips/article');
    }
}

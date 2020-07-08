@extends('dashboard.layouts.app')
@extends('dashboard.layouts.topbar')
@extends('dashboard.layouts.sidenav')

@section('content')
<main id="page-wrapper" class="page-wrapper">
    <div class="container contain-wrapper">
        <h3 class="mb-4">Create Article</h3>

        @if (session('status'))
        @endif
        <div class="flash-data" data-flashdata="{{ session('status') }}"></div>

        <form action="{{ url('dash/tips/article') }}/{{ $article->id }}" method="post" enctype="multipart/form-data">
            @method('patch')
            @csrf

            {{-- Judul --}}
            <div class="row row-cols-1">
                <div class="col">
                    <div class="form-group meta">
                        <label for="judul">
                            <h6>Judul</h6>
                        </label>
                        <input class="form-control" type="text" id="judul" name="judul"
                            value="{{ $article->blog_title }}" required>
                    </div>
                </div>
            </div>

            {{-- Subcategory --}}
            <div class="row row-cols-2 mb-4">
                <div class="col">
                    <label for="category">
                        <h6>Category</h6>
                    </label>
                    <select class="custom-select" name="category" id="category" required>
                        @foreach ($categories as $category)
                        @if ($category->status === 1)
                        <option {{ ($category->id === $article->t_tips_category_id) ? 'selected' : '' }}
                            value="{{ $category->id }}">{{ $category->category_name }}
                        </option>
                        @endif
                        @endforeach
                    </select>
                </div>
            </div>

            {{-- Image Thumbnail --}}
            <div class="row row-cols-2 mb-4">
                <div class="col">
                    <label for="imgthumb">
                        <h6>Image thumbnail</h6>
                    </label>
                    <div class="row row-cols-2">
                        <div class="col">
                            <img src="{{ asset('storage/tips/img/'.$article->img_thumb) }}" class="img-thumbnail">
                        </div>
                        <div class="col">
                            <div class="input-group">
                                <div class="custom-file">
                                    <input type="file" value="{{ $article->img_thumb }}"
                                        class="custom-file-input @error('imgthumb') is-invalid @enderror" id="imgthumb"
                                        name="imgthumb">
                                    <label class="custom-file-label" for="imgthumb">{{ $article->img_thumb }}</label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Sumber Image --}}
            <div class="row row-cols-2">
                <div class="col">
                    <div class="form-group">
                        <label for="source-img">
                            <h6>Source Image</h6>
                        </label>
                        <input class="form-control" type="text" id="source-img" name="sourceImg"
                            placeholder="Ex: freepik.com/patra" value="{{ $article->img_source }}" required>
                    </div>
                </div>
            </div>

            {{-- Tag --}}
            {{-- <div class="row row-cols-2">
                <div class="col">
                    <div class="form-group form-meta">
                        <label for="tag">
                            <h6>Tags</h6>
                        </label>
                        <input class="form-control" type="text" id="tag" name="tag">
                    </div>
                </div>
            </div> --}}

            {{-- Meta Title --}}
            <div class="row row-cols-1">
                <div class="col">
                    <div class="form-group mt-3 meta">
                        <label for="meta-title">
                            <h6>Meta Title</h6>
                        </label>
                        <input class="form-control" type="text" id="meta-title" value="{{ $article->meta_title }}"
                            name="metaTitle" required>
                    </div>
                </div>
            </div>

            {{-- Meta Description --}}
            <div class="row row-cols-1">
                <div class="col">
                    <div class="form-group mt-3 meta">
                        <label for="meta-description">
                            <h6>Meta Description</h6>
                        </label>
                        <textarea class="form-control " type="text" id="meta-description" name="metaDesc"
                            required>{{ $article->meta_desc }}</textarea>
                    </div>
                </div>
            </div>

            {{-- Text posting --}}
            <div class="row row-cols-1">
                <div class="col">
                    <label for="kontenpost">
                        <h6>Konten</h6>
                    </label>
                    <textarea id="kontenpost" name="kontenpost">
                        {{ $article->blog_post }}
                    </textarea>
                </div>
            </div>

            <div class="modal-footer">
                <a href="{{ url('dash/tips/article') }}" type="button" class="btn btn-light"
                    data-dismiss="modal">cancel</a>
                <button type="submit" class="btn btn-primary">
                    Publish
                </button>
            </div>

        </form>

    </div>
</main>
@endsection
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

        <form action="{{ url('dash/info/article') }}/{{ $article->id }}" method="post" enctype="multipart/form-data">
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

            {{-- Category --}}
            <div class="row row-cols-2 mb-4">
                <div class="col">
                    <label for="category">
                        <h6>Category</h6>
                    </label>
                    <select class="custom-select" id="category" name="category" required>

                        @foreach ($categories as $category)
                        @if ($category->status === 1)
                        <option {{ ($category->id === $article->t_info_category_id ) ? 'selected' : '' }}
                            value={{ $category->id }}>{{ $category->category_name }}
                        </option>
                        @endif
                        @endforeach
                    </select>
                </div>
            </div>

            {{-- Lain² --}}
            <div id="select-lainnya">
                <div class="row row-cols-1">
                    <div class="col select-lainnya">
                        {{-- subcategory --}}
                        <div class="row row-cols-2 mb-4">
                            <div class="col">
                                <label for="subcategory">
                                    <h6>Subcategory</h6>
                                </label>
                                <select class="custom-select" id="subcategory" name="subcategory" required>
                                    @foreach ($subcategories as $subcategory)
                                    @if ($subcategory->status === 1)
                                    <option
                                        {{ ($subcategory->id === $article->t_info_subcategory_id ) ? 'selected' : '' }}
                                        value={{ $subcategory->id }}>{{ $subcategory->subcategory_name }}
                                    </option>
                                    @endif
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        {{-- pelajar --}}
                        <div class="row row-cols-2 mb-4">
                            <div class="col">
                                <label for="pelajar">
                                    <h6>Pelajar</h6>
                                </label>
                                <select class="custom-select" id="pelajar" name="pelajar" required>
                                    <option value="0">None</option>
                                    @foreach ($pelajars as $pelajar)
                                    @if ($pelajar->status === 1)
                                    <option {{ ($pelajar->id === $article->t_info_pelajar_id ) ? 'selected' : '' }}
                                        value={{ $pelajar->id }}>{{ $pelajar->pelajar_name }}
                                    </option>
                                    @endif
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        {{-- continent --}}
                        <div class="row row-cols-2 mb-4">
                            <div class="col">
                                <label for="continent">
                                    <h6>Continent <small class="text-sakura">*Ga Wajib, cuma buat ngubah select option
                                            country</small></h6>
                                </label>
                                <select class="custom-select" id="continent" name="continent" required>
                                    <option selected disabled>Select Continent..</option>
                                    @foreach ($continents as $continent)
                                    @if ($continent->status === 1)
                                    <option value={{ $continent->id }}>{{ $continent->continent_name }}
                                    </option>
                                    @endif
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        {{-- country --}}
                        <div class="row row-cols-2 mb-4">
                            <div class="col">
                                <label for="country">
                                    <h6>Country</h6>
                                </label>
                                <select class="custom-select" id="country" name="country" required>
                                    <option value="0">None</option>
                                    @foreach ($countries as $country)
                                    @if ($country->status === 1)
                                    <option {{ ($country->id === $article->t_info_country_id ) ? 'selected' : '' }}
                                        value={{ $country->id }}>{{ $country->country_name }}
                                    </option>
                                    @endif
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        {{-- course --}}
                        <div class="row row-cols-2 mb-4">
                            <div class="col">
                                <label for="course">
                                    <h6>Course</h6>
                                </label>
                                <select class="custom-select" id="course" name="course" required>
                                    <option value="0">None</option>
                                    @foreach ($courses as $course)
                                    @if ($course->status === 1)
                                    <option {{ ($course->id === $article->t_info_course_id ) ? 'selected' : '' }}
                                        value={{ $course->id }}>{{ $course->course_name }}
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
                                        <img src="{{ asset('storage/info/img/'.$article->img_thumb) }}"
                                            class="img-thumbnail">
                                    </div>
                                    <div class="col">
                                        <div class="input-group">
                                            <div class="custom-file">
                                                <input type="file"
                                                    class="custom-file-input @error('imgthumb') is-invalid @enderror"
                                                    id="imgthumb" name="imgthumb">
                                                <label class="custom-file-label"
                                                    for="imgthumb">{{ $article->img_thumb }}</label>
                                            </div>
                                        </div>
                                    </div>
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
                <a href="{{ url('dash/materi/article') }}" type="button" class="btn btn-light"
                    data-dismiss="modal">cancel</a>
                <button type="submit" class="btn btn-primary">
                    Publish
                </button>
            </div>

        </form>

    </div>
</main>
@endsection
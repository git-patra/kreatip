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

        <form action="{{ url('dash/info/article') }}" method="post" enctype="multipart/form-data">
            @csrf

            {{-- Judul --}}
            <div class="row row-cols-1">
                <div class="col">
                    <div class="form-group meta">
                        <label for="judul">
                            <h6>Judul</h6>
                        </label>
                        <input class="form-control" type="text" id="judul" value="{{ old('judul') }}" name="judul"
                            required>
                    </div>
                </div>
            </div>

            {{-- Category --}}
            <div class="row row-cols-2 mb-4">
                <div class="col">
                    <label for="selectCategoryInfo">
                        <h6>Category</h6>
                    </label>
                    <select class="custom-select" id="selectCategoryInfo" name="category" required>
                        <option selected disabled>Choose Category..</option>
                        @foreach ($categories as $category)
                        @if ($category->status === 1)
                        <option value={{ $category->id }}>{{ $category->category_name }}
                        </option>
                        @endif
                        @endforeach
                    </select>
                </div>
            </div>

            {{-- Lain² --}}
            <div id="select-lainnya">
                <div class="row row-cols-2">
                    <div class="col select-lainnya"></div>
                </div>
            </div>

            {{-- Image Thumbnail --}}
            <div class="row row-cols-2 mb-4">
                <div class="col">
                    <label for="imgthumb">
                        <h6>Image thumbnail</h6>
                    </label>
                    <div class="input-group">
                        <div class="custom-file">
                            <input type="file" class="custom-file-input @error('imgthumb') is-invalid @enderror"
                                id="imgthumb" name="imgthumb">
                            <label class="custom-file-label" for="imgthumb">Choose file</label>
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
                        <input class="form-control" type="text" value="{{ old('sourceImg') }}" id="source-img"
                            name="sourceImg" placeholder="Ex: freepik.com/patra" required>
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
                        <input class="form-control" type="text" value="{{ old('metaTitle') }}" id="meta-title"
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
                        <textarea class="form-control " value="{{ old('metaDesc') }}" type="text" id="meta-description"
                            name="metaDesc" required></textarea>
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
                        {{ old('kontenpost') }}
                    </textarea>
                </div>
            </div>

            <div class="modal-footer">
                <a href="{{ url('dash/info/article') }}" type="button" class="btn btn-light"
                    data-dismiss="modal">cancel</a>
                <button type="submit" class="btn btn-primary">
                    Publish
                </button>
            </div>

        </form>

    </div>
</main>
@endsection
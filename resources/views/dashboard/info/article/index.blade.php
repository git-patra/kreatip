@extends('dashboard.layouts.app')
@extends('dashboard.layouts.topbar')
@extends('dashboard.layouts.sidenav')

@section('content')
<main id="page-wrapper" class="page-wrapper">
    <div class="container contain-wrapper">
        <h3>Posting Artikel Info</h3>

        @if (session('status'))
        @endif
        <div class="flash-data" data-flashdata="{{ session('status') }}"></div>

        {{-- Href Add Article --}}
        <a href="/dash/info/article/add" class="btn btn-rounded btn-outline-primary mt-3">
            <i class="fas fa-plus"></i> Add
        </a>
        <h6 class="mt-3">Page : <strong class="text-sakura">{{ $articles->currentPage() }}</strong></h6>
        <h6>Article PerPage : <strong class="text-sakura">{{ $articles->perPage() }}</strong></h6>
        <h6>Total Article : <strong class="text-sakura">{{ $articles->total() }}</strong></h6>

        <div class="row row-cols-3 mt-3 row-filter">
            <div class="col">
                <input class="form-control" type="text" id="searchInfoByTitle" placeholder="Cari judul">
            </div>
        </div>
        {{-- Table --}}
        <table class="table info-table table-striped table-hover mt-3">
            <thead class="bg-primary text-center">
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Judul</th>
                    <th scope="col">Category</th>
                    <th scope="col">Author</th>
                    <th scope="col">Date</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody class="border border-primary text-center">

                @foreach ($articles as $article)
                <tr>
                    <th scope="row">{{ $loop->iteration }}</th>
                    <td>{{ $article->blog_title }}</td>
                    <td>{{ $article->infoCategory->category_name }}</td>
                    <td>{{ $article->creator }}</td>
                    <td>{{ $article->created_at }}</td>
                    <td>
                        <a href="{{ url('dash/info/article/') }}/{{ $article->id }}"
                            class="btn btn-rounded btn-outline-warning">
                            <i class="fas fa-edit"></i>
                        </a>

                        <form action="{{ url('dash/info/article/') }}/{{ $article->id }}" method="post"
                            class="d-inline">
                            @method('delete')
                            @csrf
                            <button type="submit" class="btn btn-rounded btn-outline-danger btn-delete"><i
                                    class="far fa-trash-alt"></i></button>
                        </form>
                    </td>
                </tr>

                @endforeach
            </tbody>
        </table>

        {{ $articles->links() }}
    </div>
</main>
@endsection
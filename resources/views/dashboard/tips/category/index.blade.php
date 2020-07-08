@extends('dashboard.layouts.app')
@extends('dashboard.layouts.topbar')
@extends('dashboard.layouts.sidenav')

@section('content')
<main id="page-wrapper" class="page-wrapper">
    <div class="container contain-wrapper">
        <h3>Category Tips</h3>

        @if (session('status'))
        @endif
        <div class="flash-data" data-flashdata="{{ session('status') }}"></div>

        {{-- Button Add Modal --}}
        <button type="button" class="btn btn-rounded btn-outline-primary mt-3" data-toggle="modal"
            data-target="#add-category-tips"><i class="fas fa-plus"></i> Add</button>

        <!-- Add modal content -->
        <div id="add-category-tips" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-body">
                        <div class="text-center mt-2 mb-4">
                            <h5>Add Category</h5>
                        </div>

                        <form action="{{ url('dash/tips/category') }}" method="post" class="pl-3 pr-3">
                            @csrf

                            <div class="form-group">
                                <label for="category">Category</label>
                                <input class="form-control" type="text" id="category" name="category" required
                                    placeholder="Category Tips" value="{{ old('category') }}">
                            </div>

                            <label for="category">Status</label>
                            <select class="custom-select" name="status">
                                <option selected value="1">Active</option>
                                <option value="0">Deactivate</option>
                            </select>

                            <div class="modal-footer">
                                <button type="button" class="btn btn-light" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </form>
                    </div>
                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->

        {{-- Table --}}
        <table class="table table-striped table-hover mt-3">
            <thead class="bg-primary text-center">
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Category</th>
                    <th scope="col">Created By</th>
                    <th scope="col">Date</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody class="border border-primary text-center">

                @foreach ($categories as $category)
                <tr>
                    <th scope="row">{{ $loop->iteration }}</th>
                    <td>{{ $category->category_name }}</td>
                    <td>{{ $category->creator }}</td>
                    <td>{{ $category->created_at }}</td>
                    <td>
                        <a href="{{ url('dash/tips/category/') }}/{{ $category->id }}"
                            class="btn btn-rounded btn-outline-warning">
                            <i class="fas fa-edit"></i>
                        </a>

                        <form action="{{ url('dash/tips/category/') }}/{{ $category->id }}" method="post"
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

    </div>
</main>
@endsection
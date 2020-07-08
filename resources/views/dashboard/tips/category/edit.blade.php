@extends('dashboard.layouts.app')
@extends('dashboard.layouts.topbar')
@extends('dashboard.layouts.sidenav')

@section('content')
<main id="page-wrapper" class="page-wrapper">
    <div class="container contain-wrapper contain-edit">
        <h3>Category Tips</h3>

        <form class="mt-4" action="{{ url('dash/tips/category/') }}/{{ $category->id }}" method="post">
            @method('patch')
            @csrf

            <div class="form-group">
                <label for="category">Category</label>
                <input class="form-control" type="text" id="category" name="category" required
                    value="{{ $category->category_name }}">
            </div>

            <label for="category">Status</label>
            <select class="custom-select" name="status">
                @if ($category->status === 1)
                <option selected value="1">Active</option>
                <option value="0">Disable</option>
                @else
                <option value="1">Active</option>
                <option selected value="0">Deactivate</option>
                @endif
            </select>

            <div class="modal-footer">
                <a href="{{ url('dash/tips/category') }}" type="button" class="btn btn-light"
                    data-dismiss="modal">cancel</a>
                <button type="submit" class="btn btn-primary">Save
                    changes</button>
            </div>

        </form>
    </div>
</main>
@endsection
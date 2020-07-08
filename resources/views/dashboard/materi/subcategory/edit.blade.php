@extends('dashboard.layouts.app')
@extends('dashboard.layouts.topbar')
@extends('dashboard.layouts.sidenav')

@section('content')
<main id="page-wrapper" class="page-wrapper">
    <div class="container contain-wrapper contain-edit">
        <h3>Subcategory Materi</h3>

        <form class="mt-4" action="{{ url('dash/materi/subcategory/') }}/{{ $subcategory->id }}" method="post">
            @method('patch')
            @csrf

            <div class="form-group">
                <label for="subcategory">Subcategory</label>
                <input class="form-control" type="text" id="subcategory" name="subcategory" required
                    value="{{ $subcategory->subcategory_name }}">
            </div>

            <div class="form-group mb-4">
                <label class="mr-sm-2" for="category">Category</label>
                <select class="custom-select mr-sm-2" id="category" name="category">
                    @foreach ($categories as $category)
                    <option {{ ($category->id === $subcategory->t_materi_category_id) ? 'selected' : '' }}
                        value="{{ $category->id }}">{{ $category->category_name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="icon">Icon</label>
                <input class="form-control" type="text" id="icon" name="icon" required value="{{ $subcategory->icon }}">
            </div>

            <label for="category">Status</label>
            <select class="custom-select" name="status">
                @if ($subcategory->status === 1)
                <option selected value="1">Active</option>
                <option value="0">Deactivate</option>
                @else
                <option value="1">Active</option>
                <option selected value="0">Deactivate</option>
                @endif
            </select>

            <div class="modal-footer">
                <a href="{{ url('dash/materi/subcategory') }}" type="button" class="btn btn-light"
                    data-dismiss="modal">cancel</a>
                <button type="submit" class="btn btn-primary">Save
                    changes</button>
            </div>

        </form>
    </div>
</main>
@endsection
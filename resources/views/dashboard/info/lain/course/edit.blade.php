@extends('dashboard.layouts.app')
@extends('dashboard.layouts.topbar')
@extends('dashboard.layouts.sidenav')

@section('content')
<main id="page-wrapper" class="page-wrapper">
    <div class="container contain-wrapper contain-edit">
        <h3>Mata Pelajaran Info</h3>

        <form class="mt-4" action="{{ url('dash/info/lain/course/') }}/{{ $course->id }}" method="post">
            @method('patch')
            @csrf

            <div class="form-group">
                <label for="course">Mata Pelajaran</label>
                <input class="form-control" type="text" id="course" name="course" required
                    value="{{ $course->course_name }}">
            </div>

            <div class="form-group mb-4">
                <label class="mr-sm-2" for="subcategory">Subcategory</label>
                <select class="custom-select mr-sm-2" id="subcategory" name="subcategory">
                    @foreach ($subcategories as $subcategory)
                    @if ($subcategory->t_info_category_id === 2)
                    <option {{ ($subcategory->id == $course->t_info_subcategory_id) ? 'selected' : '' }}
                        value="{{ $subcategory->id }}">{{ $subcategory->subcategory_name }}</option>
                    @endif
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="icon">Icon</label>
                <input class="form-control" type="text" id="icon" name="icon" required placeholder="Fontawesome Icon"
                    value="{{ $course->icon }}">
            </div>

            <label for="course">Status</label>
            <select class="custom-select" name="status">
                @if ($course->status === 1)
                <option selected value="1">Active</option>
                <option value="0">Disable</option>
                @else
                <option value="1">Active</option>
                <option selected value="0">Deactivate</option>
                @endif
            </select>

            <div class="modal-footer">
                <a href="{{ url('dash/info/lain/course') }}" type="button" class="btn btn-light"
                    data-dismiss="modal">cancel</a>
                <button type="submit" class="btn btn-primary">Save
                    changes</button>
            </div>

        </form>
    </div>
</main>
@endsection
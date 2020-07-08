@extends('dashboard.layouts.app')
@extends('dashboard.layouts.topbar')
@extends('dashboard.layouts.sidenav')

@section('content')
<main id="page-wrapper" class="page-wrapper">
    <div class="container contain-wrapper contain-edit">
        <h3>Course Materi</h3>

        <form class="mt-4" action="{{ url('dash/materi/course/') }}/{{ $course->id }}" method="post">
            @method('patch')
            @csrf

            <div class="form-group">
                <label for="course">Course</label>
                <input class="form-control" type="text" id="course" name="course" required
                    value="{{ $course->course_name }}">
            </div>

            <div class="form-group mb-4">
                <label class="mr-sm-2" for="subcategory">Subcategory</label>
                <select class="custom-select mr-sm-2" id="subcategory" name="subcategory">
                    @foreach ($subcategories as $subcategory)
                    <option {{ ($subcategory->id === $course->t_materi_subcategory_id) ? 'selected' : '' }}
                        value="{{ $subcategory->id }}">{{ $subcategory->subcategory_name }}</option>
                    @endforeach
                </select>
            </div>

            <label for="category">Status</label>
            <select class="custom-select" name="status">
                @if ($course->status === 1)
                <option selected value="1">Active</option>
                <option value="0">Deactivate</option>
                @else
                <option value="1">Active</option>
                <option selected value="0">Deactivate</option>
                @endif
            </select>

            <div class="modal-footer">
                <a href="{{ url('dash/materi/course') }}" type="button" class="btn btn-light"
                    data-dismiss="modal">cancel</a>
                <button type="submit" class="btn btn-primary">Save
                    changes</button>
            </div>

        </form>
    </div>
</main>
@endsection
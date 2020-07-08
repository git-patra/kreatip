@extends('dashboard.layouts.app')
@extends('dashboard.layouts.topbar')
@extends('dashboard.layouts.sidenav')

@section('content')
<main id="page-wrapper" class="page-wrapper">
    <div class="container contain-wrapper">
        <h3>Benua Info</h3>

        @if (session('status'))
        @endif
        <div class="flash-data" data-flashdata="{{ session('status') }}"></div>

        {{-- Button Add Modal --}}
        <button type="button" class="btn btn-rounded btn-outline-primary mt-3" data-toggle="modal"
            data-target="#add-continent-info"><i class="fas fa-plus"></i> Add</button>

        <!-- Add modal content -->
        <div id="add-continent-info" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-body">
                        <div class="text-center mt-2 mb-4">
                            <h5>Add Benua</h5>
                        </div>

                        <form action="{{ url('dash/info/lain/continent') }}" method="post" class="pl-3 pr-3">
                            @csrf

                            <div class="form-group">
                                <label for="continent">Benua</label>
                                <input class="form-control" type="text" id="continent" name="continent" required
                                    placeholder="Benua" value="{{ old('continent') }}">
                            </div>

                            <div class="form-group mb-3">
                                <label class="mr-sm-2" for="subcategory">Sub Category</label>
                                <select class="custom-select mr-sm-2" id="subcategory" name="subcategory">
                                    @foreach ($subcategories as $subcategory)
                                    @if ($subcategory->id === 6)
                                    <option selected value="{{ $subcategory->id }}">{{ $subcategory->subcategory_name }}
                                    </option>
                                    @endif
                                    @endforeach
                                </select>
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
                    <th scope="col">Benua</th>
                    <th scope="col">Subcategory</th>
                    <th scope="col">Created By</th>
                    <th scope="col">Date</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody class="border border-primary text-center">

                @foreach ($continents as $continent)
                <tr>
                    <th scope="row">{{ $loop->iteration }}</th>
                    <td>{{ $continent->continent_name }}</td>
                    <td>{{ $continent->infoSubcategory->subcategory_name }}</td>
                    <td>{{ $continent->creator }}</td>
                    <td>{{ $continent->created_at }}</td>
                    <td>
                        <a href="{{ url('dash/info/lain/continent/') }}/{{ $continent->id }}"
                            class="btn btn-rounded btn-outline-warning">
                            <i class="fas fa-edit"></i>
                        </a>

                        <form action="{{ url('dash/info/lain/continent/') }}/{{ $continent->id }}" method="post"
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
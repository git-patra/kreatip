@extends('dashboard.layouts.app')
@extends('dashboard.layouts.topbar')
@extends('dashboard.layouts.sidenav')

@section('content')
<main id="page-wrapper" class="page-wrapper">
    <div class="container contain-wrapper">
        <h3>Negara Info</h3>

        @if (session('status'))
        @endif
        <div class="flash-data" data-flashdata="{{ session('status') }}"></div>

        {{-- Button Add Modal --}}
        <button type="button" class="btn btn-rounded btn-outline-primary mt-3" data-toggle="modal"
            data-target="#add-country-info"><i class="fas fa-plus"></i> Add</button>

        <!-- Add modal content -->
        <div id="add-country-info" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-body">
                        <div class="text-center mt-2 mb-4">
                            <h5>Add Negara</h5>
                        </div>

                        <form action="{{ url('dash/info/lain/country') }}" method="post" class="pl-3 pr-3">
                            @csrf

                            <div class="form-group">
                                <label for="country">Negara</label>
                                <input class="form-control" type="text" id="country" name="country" required
                                    placeholder="Negara" value="{{ old('country') }}">
                            </div>

                            <div class="form-group mb-3">
                                <label class="mr-sm-2" for="continent">Benua</label>
                                <select class="custom-select mr-sm-2" id="continent" name="continent">
                                    @foreach ($continents as $continent)
                                    <option value="{{ $continent->id }}">{{ $continent->continent_name }}
                                    </option>
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
                    <th scope="col">Negara</th>
                    <th scope="col">Benua</th>
                    <th scope="col">Created By</th>
                    <th scope="col">Date</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody class="border border-primary text-center">

                @foreach ($countries as $country)
                <tr>
                    <th scope="row">{{ $loop->iteration }}</th>
                    <td>{{ $country->country_name }}</td>
                    <td>{{ $country->infoContinent->continent_name }}</td>
                    <td>{{ $country->creator }}</td>
                    <td>{{ $country->created_at }}</td>
                    <td>
                        <a href="{{ url('dash/info/lain/country/') }}/{{ $country->id }}"
                            class="btn btn-rounded btn-outline-warning">
                            <i class="fas fa-edit"></i>
                        </a>

                        <form action="{{ url('dash/info/lain/country/') }}/{{ $country->id }}" method="post"
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
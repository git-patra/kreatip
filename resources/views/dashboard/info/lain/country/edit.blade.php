@extends('dashboard.layouts.app')
@extends('dashboard.layouts.topbar')
@extends('dashboard.layouts.sidenav')

@section('content')
<main id="page-wrapper" class="page-wrapper">
    <div class="container contain-wrapper contain-edit">
        <h3>Negara Info</h3>

        <form class="mt-4" action="{{ url('dash/info/lain/country/') }}/{{ $country->id }}" method="post">
            @method('patch')
            @csrf

            <div class="form-group">
                <label for="country">Negara</label>
                <input class="form-control" type="text" id="country" name="country" required
                    value="{{ $country->country_name }}">
            </div>

            <div class="form-group mb-4">
                <label class="mr-sm-2" for="continent">Benua</label>
                <select class="custom-select mr-sm-2" id="continent" name="continent">
                    @foreach ($continents as $continent)
                    <option {{ ($continent->id == $country->t_info_continent_id) ? 'selected' : '' }}
                        value="{{ $continent->id }}">{{ $continent->continent_name }}</option>
                    @endforeach
                </select>
            </div>

            <label for="country">Status</label>
            <select class="custom-select" name="status">
                @if ($country->status === 1)
                <option selected value="1">Active</option>
                <option value="0">Disable</option>
                @else
                <option value="1">Active</option>
                <option selected value="0">Deactivate</option>
                @endif
            </select>

            <div class="modal-footer">
                <a href="{{ url('dash/info/lain/country') }}" type="button" class="btn btn-light"
                    data-dismiss="modal">cancel</a>
                <button type="submit" class="btn btn-primary">Save
                    changes</button>
            </div>

        </form>
    </div>
</main>
@endsection
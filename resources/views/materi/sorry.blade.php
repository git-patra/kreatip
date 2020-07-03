@extends('layouts.app')

@section('main')
<main id="sorry" class="container sorry">
    <div class="row row-cols-1">
        <div class="col text-center">
            <img src="{{ asset('storage/landing/img/sorry.webp') }}" alt="sorry">
            <h4 class="mt-3 text-center red"><i>Sorry, this page will be available soon</i></h4>
        </div>
    </div>
</main>
@endsection
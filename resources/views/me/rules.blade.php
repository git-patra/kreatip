@extends('layouts.app')

@section('main')

<main id="rules" class="container rules">
    <h2>{{ $blog->title }}</h2>
    @if ($blog->id === 3)
    <br />
    @endif
    {!! $blog->post !!}
</main>

@endsection
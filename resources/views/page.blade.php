@extends('layouts.app')

@section('title', 'Page')

@section('content')


    <div class="row">
        <div class="mx-auto col-lg-10 col-xl-8">
            <h1 class="h3">{{ $page->title }}</h1>
            <hr class="my-4">

            <div id="installation" class="mb-5">
                <h3>{{ $page->title }}</h3>
                <p class="text-lg">
                    {!! $page->content !!}
                </p>
            </div>

        </div>
    </div>

@endsection

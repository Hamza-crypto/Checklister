@extends('layouts.app')

@section('title', 'Checklist Group')


@section('content')
    <h1 class="h3 mb-3">Edit Page {{ $page->name }}</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif


    @if(session('Success'))
        <x-alert type="success">{{ session('Success') }}</x-alert>
    @endif

    @if(session('warning'))
        <x-alert type="warning">{{ session('warning') }}</x-alert>
    @endif

    @if(session('danger'))
        <x-alert type="danger">{{ session('danger') }}</x-alert>
    @endif




    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    @if(session('message'))
                        <div class="alert alert-info">
                            {{session('message')}}</div>
                    @endif
                    <form method="post" action=" {{ route('admin.pages.update', $page) }}">
                        @csrf
                        @method('PUT')

                        <x-input
                            type="text"
                            value="{{ $page->title }}"
                            name="title"
                            label="Title"
                            placeholder="Page Title"
                        ></x-input>
                        <div class="form-group">
                            <label for="content">Description</label>
                            <textarea
                                class="form-control"
                                name="content" rows="5" id="text-area-description">{{ $page->content}}{{ old('content') }}</textarea>
                        </div>
                        <button type="submit" class="btn btn-lg btn-primary">Save Page</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    @include('admin.ckeditor')
@endsection

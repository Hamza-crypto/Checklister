@extends('layouts.app')

@section('title', 'Checklist Group')


@section('content')
    <h1 class="h3 mb-3">Edit Task in {{ $checklist->name }}</h1>

    @if ($errors->taskerror->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->taskerror->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    @if(session('success'))
        <x-alert type="success">{{ session('success') }}</x-alert>
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
                    <form method="post" action=" {{ route('admin.checklists.tasks.update',[$checklist,$task]) }}">
                        @csrf
                        @method('PUT')

                        <x-input
                            type="text"
                            value="{{ $task->name }}"
                            name="name"
                            label="Name"
                            placeholder="Task Name"
                        ></x-input>
                        <div class="form-group">
                            <label for="description">Description</label>
                            <textarea
                                class="form-control"
                                name="description" rows="5" id="text-area-description">{{ $task->description}}{{ old('description') }}</textarea>
                        </div>
                        <button type="submit" class="btn btn-lg btn-primary">Save Task</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    @include('admin.ckeditor')
@endsection

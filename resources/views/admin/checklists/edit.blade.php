@extends('layouts.app')

@section('title', 'Checklist Group')


@section('content')
    <h1 class="h3 mb-3">Edit Checklist in {{ $checklistGroup->name }}</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
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
                    <form method="post" action=" {{ route('admin.checklist_groups.checklists.update',[$checklistGroup,$checklist]) }}">
                        @csrf
                        @method('PUT')

                        <x-input
                            type="text"
                            value="{{ $checklist->name }}"
                            name="name"
                            label="Name"
                            placeholder="Checklist Name"
                        ></x-input>
                        <button type="submit" class="btn btn-lg btn-primary">Save Checklist</button>
                    </form>
                </div>
            </div>
            <form method="post" action=" {{ route('admin.checklist_groups.checklists.destroy',[$checklistGroup,$checklist]) }}">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-lg btn-danger" onclick="return confirm('Are you sure?')">Delete this checklist</button>
            </form>
        </div>
    </div>

    <hr>
    @if ($errors->taskerror->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->taskerror->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="card-title">List of Tasks</div>
                    @livewire('tasks-table',['checklist' => $checklist])
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="card-title">New Task</div>
                    <form method="post" action=" {{ route('admin.checklists.tasks.store',[$checklist]) }}">
                        @csrf
                        <x-input
                            type="text"
                            value="{{ old('name') }}"
                            name="name"
                            label="Name"
                            placeholder=""
                        ></x-input>

                        <div class="form-group">
                            <label for="description">Description</label>
                            <textarea
                                class="form-control"
                                name="description" rows="5" id="text-area-description">{{ old('description') }}</textarea>
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


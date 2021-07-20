@extends('layouts.app')

@section('title', 'Checklist Group')


@section('content')
    <h1 class="h3 mb-3">Edit Checklist Group</h1>

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
                    <form method="post" action=" {{ route('admin.checklist_groups.update',$checklistGroup) }}">
                        @csrf
                        @method('PUT')

                        <x-input
                            type="text"
                            value=" {{ $checklistGroup->name }} "
                            name="name"
                            label="Name"
                            placeholder="Checklist Group Name"
                        ></x-input>
                        <button type="submit" class="btn btn-lg btn-primary">Save</button>
                    </form>
                </div>

            </div>
            <form method="post" action=" {{ route('admin.checklist_groups.destroy',$checklistGroup) }}">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-lg btn-danger" onclick="return confirm('Are you sure?')">Delete this checklist group</button>
            </form>
        </div>
    </div>
@endsection

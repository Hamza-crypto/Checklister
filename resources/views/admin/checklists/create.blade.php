@extends('layouts.app')

@section('title', 'Checklist Group')


@section('content')
    <h1 class="h3 mb-3">New Checklist in {{ $checklistGroup->name }}</h1>

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
                    <form method="post" action=" {{ route('admin.checklist_groups.checklists.store',$checklistGroup) }}">
                        @csrf

                        <x-input
                            type="text"
                            name="name"
                            label="Name"
                            placeholder="Checklist Name"
                        ></x-input>
                        <button type="submit" class="btn btn-lg btn-primary">Save</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')

    @if(session('Success'))
        <x-alert type="success">{{ session('Success') }}</x-alert>
    @endif

    @if(session('warning'))
        <x-alert type="warning">{{ session('warning') }}</x-alert>
    @endif

    @if(session('danger'))
        <x-alert type="danger">{{ session('danger') }}</x-alert>
    @endif
<h1>This is dashboard</h1>

@endsection

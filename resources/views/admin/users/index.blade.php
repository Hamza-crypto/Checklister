@extends('layouts.app')

@section('title', 'Checklist Group')


@section('content')

    <div class="card">
        <div class="card-header">
            <h5 class="card-title">All Users</h5>
        </div>
        <table class="table table-striped" style="width:100%">
            <thead>
            <tr>
                <th>Register Time</th>
                <th>Name</th>
                <th>Email</th>
                <th>Website</th>

            </tr>
            </thead>
            <tbody>
            @foreach($users as $user)
                <tr>
                    <td> {{ $user->created_at->diffForHumans() }}</td>
                    <td> {{ $user->name }}</td>
                    <td> {{ $user->email }}</td>
                    <td> {{ $user->website }}</td>

                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

    {{ $users->links() }}
@endsection

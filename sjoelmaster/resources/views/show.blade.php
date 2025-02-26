@extends('layouts.app')

@section('content')
<div class="container">
    <h2>User Details</h2>
    <p><strong>ID:</strong> {{ $user->id }}</p>
    <p><strong>Name:</strong> {{ $user->name }}</p>
    <p><strong>Email:</strong> {{ $user->email }}</p>
    <a href="{{ route('users.index') }}" class="btn btn-secondary">Back to Users</a>
</div>
@endsection

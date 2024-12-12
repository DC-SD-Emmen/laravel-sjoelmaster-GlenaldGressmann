@extends('layouts.app')
<link rel="stylesheet" href="{{ asset('css/navigation.css') }}">

@section('content')
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('scores.store') }}" method="POST">
        @csrf
        <label for="user" style="color: white;">Gebruiker:</label>
        <select id="user" name="user" required style="background-color: #333; color: white; border: 1px solid #ccc; padding: 5px; border-radius: 4px;">
            <option value="" disabled selected>-- Selecteer een gebruiker --</option>
            @foreach ($users as $user)
                <option value="{{ $user->id }}" {{ old('user') == $user->id ? 'selected' : '' }}>
                    {{ $user->name }}
                </option>
            @endforeach
        </select>
        
        <label for="score" style="color: white;">Score:</label>
        <input type="number" id="score" name="score" value="{{ old('score') }}" required>
        
        <button type="submit" style="background-color: white; color: black; border: 1px solid #ccc; padding: 8px 12px; border-radius: 4px;">Opslaan</button>
    </form>
@endsection
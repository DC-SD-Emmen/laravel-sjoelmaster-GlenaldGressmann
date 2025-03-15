@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-6">
    <h2 class="text-xl font-bold text-white">Edit Score</h2>

    <form action="{{ route('users.scores.update', ['user' => $user->id, 'score' => $score->id]) }}" method="POST" class="mt-4">
        @csrf
        @method('PUT')

        <label class="block text-gray-300 text-sm mb-2">Score</label>
        <input type="number" name="score" value="{{ $score->score }}" 
               class="w-full p-2 rounded bg-gray-700 text-white border-gray-600 focus:outline-none focus:ring-2 focus:ring-blue-400">
        
        <div class="mt-4 flex space-x-2">
            <button type="submit" class="px-4 py-2 bg-blue-500 hover:bg-blue-600 text-white rounded-lg">
                Update Score
            </button>
            <a href="{{ route('users.scores', $user->id) }}" class="px-4 py-2 bg-gray-500 hover:bg-gray-600 text-white rounded-lg">
                Cancel
            </a>
        </div>
    </form>
</div>
@endsection

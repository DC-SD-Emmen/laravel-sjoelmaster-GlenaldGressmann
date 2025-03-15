@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-6">
    <h2 class="text-2xl font-bold text-white mb-4">{{ $user->name }}'s Scores</h2>

    @if(session('success'))
        <div class="bg-green-600 text-white p-3 rounded-lg mb-4">
            {{ session('success') }}
        </div>
    @endif

    <div class="bg-gray-800 shadow-lg rounded-lg overflow-hidden">
        <table class="w-full text-sm text-gray-300">
            <thead class="bg-gray-700 text-gray-200">
                <tr>
                    <th class="px-6 py-3 text-left">ID</th>
                    <th class="px-6 py-3 text-left">Score</th>
                    <th class="px-6 py-3 text-left">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($scores as $score)
                <tr class="border-b border-gray-700 hover:bg-gray-700">
                    <td class="px-6 py-4">{{ $score->id }}</td>
                    <td class="px-6 py-4">{{ $score->score }}</td>
                    <td class="px-6 py-4 flex space-x-2">
                        <a href="{{ route('users.scores.edit', ['user' => $user->id, 'score' => $score->id]) }}" 
                           class="px-3 py-1 bg-blue-500 hover:bg-blue-600 text-white rounded-md text-xs font-medium">
                            Edit
                        </a>
                        <form action="{{ route('users.scores.delete', ['user' => $user->id, 'score' => $score->id]) }}" 
                              method="POST" class="inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" 
                                    class="px-3 py-1 bg-red-500 hover:bg-red-600 text-white rounded-md text-xs font-medium">
                                Delete
                            </button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="mt-6">
        <a href="{{ route('users.index') }}" 
           class="px-4 py-2 bg-gray-600 hover:bg-gray-700 text-white rounded-lg text-sm font-medium">
            Back to Users
        </a>
    </div>
</div>
@endsection

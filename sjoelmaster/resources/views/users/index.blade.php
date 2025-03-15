@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-6">
    <div class="flex justify-between items-center mb-4">
        <h2 class="text-2xl font-bold text-white">Users</h2>
        <a href="{{ route('users.create') }}" class="px-4 py-2 bg-blue-500 text-white rounded-lg hover:bg-blue-600 transition">
            + Create New User
        </a>
    </div>

    @if (session('success'))
        <div class="mb-4 p-4 bg-green-600 text-white rounded-lg shadow-md">
            {{ session('success') }}
        </div>
    @endif

    <div class="overflow-x-auto bg-gray-800 shadow-lg rounded-lg">
        <table class="min-w-full text-gray-300">
            <thead class="bg-gray-700 text-gray-200">
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-semibold uppercase">Name</th>
                    <th class="px-6 py-3 text-left text-xs font-semibold uppercase">Email</th>
                    <th class="px-6 py-3 text-left text-xs font-semibold uppercase">Actions</th>
                </tr>
            </thead>

            <tbody>
                @foreach($users as $user)
                    <tr class="border-b border-gray-700 hover:bg-gray-700 transition">
                        <td class="px-6 py-4 text-sm">{{ $user->name }}</td>
                        <td class="px-6 py-4 text-sm">{{ $user->email }}</td>
                        <td class="px-6 py-4 flex space-x-2">
                            <a href="{{ route('users.scores', $user->id) }}" 
                               class="px-3 py-1 bg-green-500 hover:bg-green-600 text-white rounded-lg text-xs font-medium transition">
                                View
                            </a>
                            
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="mt-6">
        {{ $users->links('pagination::tailwind') }}
    </div>
</div>
@endsection

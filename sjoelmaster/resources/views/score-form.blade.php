@extends('layouts.app')

@section('content')
    <!-- Main Content -->
    <main class="flex-1">
        <div class="max-w-3xl mx-auto py-10 px-4 sm:px-6 lg:px-8">
            <div class="bg-gray-800 shadow rounded-lg">
                <div class="px-8 py-6 border-b border-gray-700">
                    <h1 class="text-2xl font-semibold text-white">Add Score</h1>
                    <p class="mt-2 text-sm text-gray-400">Add a score for the selected user.</p>
                </div>

                <!-- Success and Error Messages -->
                @if (session('success'))
                    <div class="bg-green-900 p-4 rounded-lg">
                        <div class="flex">
                            <div class="flex-shrink-0">
                                <i class="fas fa-check-circle text-green-400"></i>
                            </div>
                            <div class="ml-3">
                                <p class="text-sm font-medium text-green-400">{{ session('success') }}</p>
                            </div>
                        </div>
                    </div>
                @endif

                @if ($errors->any())
                    <div class="bg-red-900 p-4 rounded-lg">
                        <div class="flex">
                            <div class="flex-shrink-0">
                                <i class="fas fa-exclamation-circle text-red-400"></i>
                            </div>
                            <div class="ml-3">
                                <p class="text-sm font-medium text-red-400">Please correct the errors below.</p>
                                <ul class="mt-2 text-sm text-red-300">
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                @endif

                <!-- Form -->
                <form action="{{ route('score.store') }}" method="POST" class="px-8 py-6 space-y-6">
                    @csrf
                    <div class="space-y-6">
                        <h2 class="text-lg font-medium text-white">Score Information</h2>
                        <div class="space-y-4">
                            <!-- User Selection -->
                            <div>
                                <label for="user" class="block text-sm font-medium text-gray-300">User <span class="text-red-500">*</span></label>
                                <div class="mt-1">
                                    <select name="user" id="user" required class="block w-full bg-gray-700 border-gray-600 text-white focus:border-custom focus:ring-custom !rounded-button">
                                        <option value="">Select a user</option>
                                        @foreach ($users as $user)
                                            <option value="{{ $user->id }}">{{ $user->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <!-- Score Input -->
                            <div>
                                <label for="score" class="block text-sm font-medium text-gray-300">Score <span class="text-red-500">*</span></label>
                                <div class="mt-1">
                                    <input type="number" name="score" id="score" required class="block w-full bg-gray-700 border-gray-600 text-white focus:border-custom focus:ring-custom !rounded-button">
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Submit Buttons -->
                    <div class="flex justify-end space-x-4 pt-6 border-t border-gray-700">
                        <button type="button" class="!rounded-button px-4 py-2 border border-gray-600 text-sm font-medium text-gray-300 hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-custom">
                            Cancel
                        </button>
                        <button type="submit" class="!rounded-button px-4 py-2 bg-custom text-white text-sm font-medium hover:bg-custom/90 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-custom">
                            Save Score
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </main>

    <!-- Footer -->
@endsection

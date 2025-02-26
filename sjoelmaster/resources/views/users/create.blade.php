

       
    @extends('layouts.app')
    @section('content')
        <!-- Main Content -->
        <main class="flex-1">
            <div class="max-w-3xl mx-auto py-10 px-4 sm:px-6 lg:px-8">
                <div class="bg-gray-800 shadow rounded-lg">
                    <div class="px-8 py-6 border-b border-gray-700">
                        <h1 class="text-2xl font-semibold text-white">Add New User</h1>
                        <p class="mt-2 text-sm text-gray-400">Create a new user account by filling in the information below.</p>
                    </div>

                    <form class="px-8 py-6 space-y-6">
                        <div id="success-message" class="hidden bg-green-900 p-4 rounded-lg">
                            <div class="flex">
                                <div class="flex-shrink-0">
                                    <i class="fas fa-check-circle text-green-400"></i>
                                </div>
                                <div class="ml-3">
                                    <p class="text-sm font-medium text-green-400">User successfully created!</p>
                                </div>
                            </div>
                        </div>
                        <div id="error-message" class="hidden bg-red-900 p-4 rounded-lg">
                            <div class="flex">
                                <div class="flex-shrink-0">
                                    <i class="fas fa-exclamation-circle text-red-400"></i>
                                </div>
                                <div class="ml-3">
                                    <p class="text-sm font-medium text-red-400">Please correct the errors below.</p>
                                </div>
                            </div>
                        </div>
                        <div class="space-y-6">
                            <h2 class="text-lg font-medium text-white">User Information</h2>
                            <div class="space-y-4">
                                <div>
                                    <label class="block text-sm font-medium text-gray-300">Name <span class="text-red-500">*</span></label>
                                    <div class="mt-1">
                                        <input type="text" name="name" required class="block w-full bg-gray-700 border-gray-600 text-white focus:border-custom focus:ring-custom !rounded-button">
                                    </div>
                                </div>

                                <div>
                                    <label class="block text-sm font-medium text-gray-300">Email <span class="text-red-500">*</span></label>
                                    <div class="mt-1">
                                        <input type="email" name="email" required class="block w-full bg-gray-700 border-gray-600 text-white focus:border-custom focus:ring-custom !rounded-button">
                                    </div>
                                </div>

                                <div>
                                    <label class="block text-sm font-medium text-gray-300">Password <span class="text-red-500">*</span></label>
                                    <div class="mt-1 relative">
                                        <input type="password" name="password" required class="block w-full bg-gray-700 border-gray-600 text-white focus:border-custom focus:ring-custom !rounded-button">
                                        <button type="button" class="absolute inset-y-0 right-0 pr-3 flex items-center">
                                            <i class="fas fa-eye text-gray-400"></i>
                                        </button>
                                    </div>
                                </div>
                                <div>
                                    <label class="block text-sm font-medium text-gray-300">Confirm Password <span class="text-red-500">*</span></label>
                                    <div class="mt-1 relative">
                                        <input type="password" name="password_confirmation" required class="block w-full bg-gray-700 border-gray-600 text-white focus:border-custom focus:ring-custom !rounded-button">
                                        <button type="button" class="absolute inset-y-0 right-0 pr-3 flex items-center">
                                            <i class="fas fa-eye text-gray-400"></i>
                                        </button>
                                    </div>
                                </div>
                                
                            </div>
                        </div>

                        <div class="flex justify-end space-x-4 pt-6 border-t border-gray-700">
                            <button type="button" class="!rounded-button px-4 py-2 border border-gray-600 text-sm font-medium text-gray-300 hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-custom">
                                Cancel
                            </button>
                            <button type="submit" class="!rounded-button px-4 py-2 bg-custom text-white text-sm font-medium hover:bg-custom/90 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-custom">
                                Create User
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </main>

        <!-- Footer -->
        
    </div>
    @endsection
</body>
</html>

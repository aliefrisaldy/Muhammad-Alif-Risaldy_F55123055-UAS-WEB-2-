@extends('components.main_layout')

@section('content')
<!-- Profile Header - Reduced vertical spacing -->
<div class="bg-gradient-to-b from-gray-50 to-white py-16">
    <div class="container mx-auto px-4">
        <div class="text-center mb-10 max-w-lg mx-auto">
            <h6 class="text-orange-500 font-bold uppercase text-2xl mb-2">My Profile</h6>
            <h1 class="text-5xl font-bold text-gray-800 leading-tight mb-4">Manage Your Account</h1>
        </div>
    </div>
</div>

<!-- Profile Content - Removed negative margin -->
<div class="py-6 relative z-10">
    <div class="container mx-auto px-4">
        <div class="max-w-4xl mx-auto">
            <!-- Alert Messages -->
            @if(session('success'))
                <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded-lg mb-6 shadow-sm">
                    <div class="flex items-center">
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                        </svg>
                        {{ session('success') }}
                    </div>
                </div>
            @endif

            @if(session('error'))
                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded-lg mb-6 shadow-sm">
                    <div class="flex items-center">
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                        </svg>
                        {{ session('error') }}
                    </div>
                </div>
            @endif

            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                <!-- Profile Info Card -->
                <div class="lg:col-span-1">
                    <div class="bg-white rounded-2xl shadow-lg p-6 text-center">
                        <!-- Avatar -->
                        <div class="w-24 h-24 bg-gradient-to-r from-green-600 to-green-700 rounded-full flex items-center justify-center mx-auto mb-4">
                            <span class="text-white text-3xl font-bold">
                                {{ strtoupper(substr($user->name, 0, 1)) }}
                            </span>
                        </div>
                        
                        <h2 class="text-xl font-bold text-gray-800 mb-2">{{ $user->name }}</h2>
                        <p class="text-gray-600 mb-4">{{ $user->email }}</p>
                        
                        @if($user->role)
                            <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium bg-blue-100 text-blue-800">
                                {{ ucfirst($user->role) }}
                            </span>
                        @endif
                        
                        <div class="mt-6 pt-6 border-t border-gray-200">
                            <p class="text-sm text-gray-500">Member since</p>
                            <p class="font-medium text-gray-800">{{ $user->created_at->format('d M Y') }}</p>
                        </div>
                    </div>
                </div>

                <!-- Forms Section -->
                <div class="lg:col-span-2 space-y-8">
                    <!-- Edit Profile Form -->
                    <div class="bg-white rounded-2xl shadow-lg overflow-hidden">
                        <div class="p-6 border-b border-gray-100">
                            <h3 class="text-xl font-bold text-gray-800 flex items-center">
                                <svg class="w-5 h-5 mr-2 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                                </svg>
                                Edit Profile
                            </h3>
                        </div>
                        
                        <form action="{{ route('profile.update') }}" method="POST" class="p-6">
                            @csrf
                            @method('PUT')
                            
                            <div class="space-y-6">
                                <div>
                                    <label for="name" class="block text-sm font-medium text-gray-700 mb-2">Full Name</label>
                                    <input type="text" id="name" name="name" value="{{ old('name', $user->name) }}" 
                                           class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-green-500 transition-colors" required>
                                    @error('name')
                                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div>
                                    <label for="email" class="block text-sm font-medium text-gray-700 mb-2">Email</label>
                                    <input type="email" id="email" name="email" value="{{ old('email', $user->email) }}" 
                                           class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-green-500 transition-colors" required>
                                    @error('email')
                                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="flex justify-end">
                                    <button type="submit" class="bg-gradient-to-r from-green-600 to-green-700 hover:from-green-700 hover:to-green-800 text-white font-bold py-3 px-6 rounded-lg transition-all duration-300 transform hover:scale-105 shadow-lg">
                                        Save Changes
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>

                    <!-- Change Password Form -->
                    <div class="bg-white rounded-2xl shadow-lg overflow-hidden">
                        <div class="p-6 border-b border-gray-100">
                            <h3 class="text-xl font-bold text-gray-800 flex items-center">
                                <svg class="w-5 h-5 mr-2 text-orange-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path>
                                </svg>
                                Change Password
                            </h3>
                        </div>
                        
                        <form action="{{ route('profile.change-password') }}" method="POST" class="p-6">
                            @csrf
                            @method('PUT')
                            
                            <div class="space-y-6">
                                <div>
                                    <label for="current_password" class="block text-sm font-medium text-gray-700 mb-2">Current Password</label>
                                    <div class="relative">
                                        <input type="password" id="current_password" name="current_password" 
                                               class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-green-500 transition-colors pr-10" required>
                                        <button type="button" class="toggle-password absolute inset-y-0 right-0 pr-3 flex items-center text-gray-600 focus:outline-none" data-target="current_password">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 eye-icon" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                            </svg>
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 eye-off-icon hidden" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.88 9.88l-3.29-3.29m7.532 7.532l3.29 3.29M3 3l3.59 3.59m0 0A9.953 9.953 0 0112 5c4.478 0 8.268 2.943 9.543 7a10.025 10.025 0 01-4.132 5.411m0 0L21 21" />
                                            </svg>
                                        </button>
                                    </div>
                                    @error('current_password')
                                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div>
                                    <label for="new_password" class="block text-sm font-medium text-gray-700 mb-2">New Password</label>
                                    <div class="relative">
                                        <input type="password" id="new_password" name="new_password" 
                                               class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-green-500 transition-colors pr-10" required>
                                        <button type="button" class="toggle-password absolute inset-y-0 right-0 pr-3 flex items-center text-gray-600 focus:outline-none" data-target="new_password">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 eye-icon" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                            </svg>
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 eye-off-icon hidden" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.88 9.88l-3.29-3.29m7.532 7.532l3.29 3.29M3 3l3.59 3.59m0 0A9.953 9.953 0 0112 5c4.478 0 8.268 2.943 9.543 7a10.025 10.025 0 01-4.132 5.411m0 0L21 21" />
                                            </svg>
                                        </button>
                                    </div>
                                    @error('new_password')
                                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                    @enderror
                                    <p class="text-sm text-gray-500 mt-1">Password must be at least 8 characters</p>
                                </div>

                                <div>
                                    <label for="new_password_confirmation" class="block text-sm font-medium text-gray-700 mb-2">Confirm New Password</label>
                                    <div class="relative">
                                        <input type="password" id="new_password_confirmation" name="new_password_confirmation" 
                                               class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-green-500 transition-colors pr-10" required>
                                        <button type="button" class="toggle-password absolute inset-y-0 right-0 pr-3 flex items-center text-gray-600 focus:outline-none" data-target="new_password_confirmation">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 eye-icon" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                            </svg>
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 eye-off-icon hidden" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.88 9.88l-3.29-3.29m7.532 7.532l3.29 3.29M3 3l3.59 3.59m0 0A9.953 9.953 0 0112 5c4.478 0 8.268 2.943 9.543 7a10.025 10.025 0 01-4.132 5.411m0 0L21 21" />
                                            </svg>
                                        </button>
                                    </div>
                                </div>

                                <div class="flex justify-end">
                                    <button type="submit" class="bg-gradient-to-r from-orange-500 to-orange-600 hover:from-orange-600 hover:to-orange-700 text-white font-bold py-3 px-6 rounded-lg transition-all duration-300 transform hover:scale-105 shadow-lg">
                                        Update Password
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>

                    <!-- Account Actions -->
                    <div class="bg-white rounded-2xl shadow-lg overflow-hidden">
                        <div class="p-6 border-b border-gray-100">
                            <h3 class="text-xl font-bold text-gray-800 flex items-center">
                                <svg class="w-5 h-5 mr-2 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path>
                                </svg>
                                Logout
                            </h3>
                        </div>
                        
                        <div class="p-6">
                            <div class="flex items-center justify-between p-4 bg-gray-50 rounded-lg">
                                <div>
                                    <h4 class="font-medium text-gray-800">Sign Out</h4>
                                    <p class="text-sm text-gray-600">End your session securely</p>
                                </div>
                                <form action="{{ route('auth.logout') }}" method="POST" class="inline">
                                    @csrf
                                    <button type="submit" onclick="return confirm('Are you sure you want to logout?')" 
                                            class="bg-gray-600 hover:bg-gray-700 text-white font-medium py-2 px-4 rounded-lg transition-colors flex items-center">
                                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path>
                                        </svg>
                                        Logout
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- JavaScript for password toggle -->
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Get all password toggle buttons
    const toggleButtons = document.querySelectorAll('.toggle-password');
    
    // Add click event to each button
    toggleButtons.forEach(button => {
        button.addEventListener('click', function() {
            // Get the target input field
            const targetId = this.getAttribute('data-target');
            const passwordInput = document.getElementById(targetId);
            
            // Toggle the password visibility
            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
                this.querySelector('.eye-icon').classList.add('hidden');
                this.querySelector('.eye-off-icon').classList.remove('hidden');
            } else {
                passwordInput.type = 'password';
                this.querySelector('.eye-icon').classList.remove('hidden');
                this.querySelector('.eye-off-icon').classList.add('hidden');
            }
        });
    });
});
</script>
@endsection

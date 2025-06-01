<x-auth-layout title="Login" section_title="Welcome Back" section_description="Login to your account">
    <form action="{{ route('auth.login') }}" method="POST" class="flex flex-col gap-4 mt-2">
        @csrf
        @method("POST")

        <!-- Email Field -->
        <div class="flex flex-col gap-2">
            <label for="email" class="font-semibold text-sm text-gray-700 flex items-center gap-2">
                <svg class="w-4 h-4 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 4.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                </svg>
                Email
            </label>
            <input type="email" id="email" name="email" 
                   class="px-4 py-3 border-2 border-gray-200 bg-white rounded-lg focus:border-green-500 focus:ring-2 focus:ring-green-200 transition-all duration-200 outline-none"
                   placeholder="Your email" value="{{ old('email') }}" required>
            @error('email')
                <div class="text-red-500 text-sm bg-red-50 border border-red-200 rounded-md px-3 py-2">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <!-- Password Field -->
        <div class="flex flex-col gap-2">
            <label for="password" class="font-semibold text-sm text-gray-700 flex items-center gap-2">
                <svg class="w-4 h-4 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path>
                </svg>
                Password
            </label>
            <div class="relative">
                <input type="password" id="password" name="password" 
                       class="w-full px-4 py-3 pr-12 border-2 border-gray-200 bg-white rounded-lg focus:border-green-500 focus:ring-2 focus:ring-green-200 transition-all duration-200 outline-none"
                       placeholder="Your password" required>
                <button type="button" onclick="togglePassword('password')" 
                        class="absolute right-3 top-1/2 transform -translate-y-1/2 text-gray-500 hover:text-orange-500 transition-colors">
                    <svg id="eye-password" class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                    </svg>
                </button>
            </div>
            @error('password')
                <div class="text-red-500 text-sm bg-red-50 border border-red-200 rounded-md px-3 py-2">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <!-- Remember Me & Forgot Password -->
        <div class="flex items-center justify-between mt-2">
            <label class="flex items-center">
                <input type="checkbox" name="remember" class="w-4 h-4 text-green-600 bg-gray-100 border-gray-300 rounded focus:ring-green-500 focus:ring-2">
                <span class="ml-2 text-sm text-gray-600">Remember me</span>
            </label>
        </div>

        <!-- General Error Message -->
        @if(session('error'))
            <div class="text-red-500 text-sm bg-red-50 border border-red-200 rounded-md px-3 py-2">
                {{ session('error') }}
            </div>
        @endif

        <!-- Success Message -->
        @if(session('success'))
            <div class="text-green-700 text-sm bg-green-50 border border-green-200 rounded-md px-3 py-2">
                {{ session('success') }}
            </div>
        @endif

        <!-- Login Button -->
        <button type="submit" 
                class="bg-gradient-to-r from-green-600 to-green-700 hover:from-green-700 hover:to-green-800 text-white font-semibold px-6 py-3 rounded-lg transition-all duration-200 transform hover:scale-[1.02] shadow-lg hover:shadow-xl mt-4">
            <span class="flex items-center justify-center gap-2">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1"></path>
                </svg>
                Login
            </span>
        </button>

        <!-- Register Link -->
        <div class="text-center mt-6">
            <p class="text-gray-600 text-sm">
                Don't have an account?
                <a href="{{ route('auth.register') }}" 
                   class="text-orange-600 font-semibold hover:text-orange-700 underline transition-colors ml-1">
                    Register Here!
                </a>
            </p>
        </div>


    <script>
        function togglePassword(fieldId) {
            const field = document.getElementById(fieldId);
            const eyeIcon = document.getElementById('eye-' + fieldId);
            
            if (field.type === 'password') {
                field.type = 'text';
                eyeIcon.innerHTML = `
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.878 9.878L3 3m6.878 6.878L21 21"></path>
                `;
            } else {
                field.type = 'password';
                eyeIcon.innerHTML = `
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                `;
            }
        }
    </script>
</x-auth-layout>
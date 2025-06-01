<x-auth-layout title="Register" section_title="Register" section_description="Register using your email">
    <form action="{{ route('auth.store') }}" method="POST" class="flex flex-col gap-4 mt-2">
        @csrf
        @method("POST")

        <div class="flex flex-col gap-2">
            <label for="name" class="font-semibold text-sm text-gray-700 flex items-center gap-2">
                <svg class="w-4 h-4 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                </svg>
                Name
            </label>
            <input type="text" id="name" name="name" 
                   class="px-4 py-3 border-2 border-gray-200 bg-white rounded-lg focus:border-green-500 focus:ring-2 focus:ring-green-200 transition-all duration-200 outline-none"
                   placeholder="Your name" value="{{ old('name') }}">
            @error('name')
                <div class="text-red-500 text-sm bg-red-50 border border-red-200 rounded-md px-3 py-2">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <div class="flex flex-col gap-2">
            <label for="email" class="font-semibold text-sm text-gray-700 flex items-center gap-2">
                <svg class="w-4 h-4 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 4.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                </svg>
                Email
            </label>
            <input type="email" id="email" name="email" 
                   class="px-4 py-3 border-2 border-gray-200 bg-white rounded-lg focus:border-green-500 focus:ring-2 focus:ring-green-200 transition-all duration-200 outline-none"
                   placeholder="Your email" value="{{ old('email') }}">
            @error('email')
                <div class="text-red-500 text-sm bg-red-50 border border-red-200 rounded-md px-3 py-2">
                    {{ $message }}
                </div>
            @enderror
        </div>

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
                       placeholder="Your password">
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

        <div class="flex flex-col gap-2">
            <label for="confirm_password" class="font-semibold text-sm text-gray-700 flex items-center gap-2">
                <svg class="w-4 h-4 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                </svg>
                Confirm Password
            </label>
            <div class="relative">
                <input type="password" id="confirm_password" name="confirm_password"
                       class="w-full px-4 py-3 pr-12 border-2 border-gray-200 bg-white rounded-lg focus:border-green-500 focus:ring-2 focus:ring-green-200 transition-all duration-200 outline-none" 
                       placeholder="Confirm your password">
                <button type="button" onclick="togglePassword('confirm_password')" 
                        class="absolute right-3 top-1/2 transform -translate-y-1/2 text-gray-500 hover:text-orange-500 transition-colors">
                    <svg id="eye-confirm_password" class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                    </svg>
                </button>
            </div>
            @error('confirm_password')
                <div class="text-red-500 text-sm bg-red-50 border border-red-200 rounded-md px-3 py-2">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <button type="submit" 
                class="bg-gradient-to-r from-green-600 to-green-700 hover:from-green-700 hover:to-green-800 text-white font-semibold px-6 py-3 rounded-lg transition-all duration-200 transform hover:scale-[1.02] shadow-lg hover:shadow-xl mt-4">
            <span class="flex items-center justify-center gap-2">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z"></path>
                </svg>
                Register
            </span>
        </button>

        <div class="text-center mt-6">
            <p class="text-gray-600 text-sm">
                Already have an account?
                <a href="{{ route('auth.login') }}" 
                   class="text-orange-600 font-semibold hover:text-orange-700 underline transition-colors ml-1">
                    Login Here!
                </a>
            </p>
        </div>
    </form>

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
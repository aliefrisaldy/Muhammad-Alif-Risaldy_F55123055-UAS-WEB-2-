<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'Auth' }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="min-h-screen bg-gradient-to-br from-green-50 via-white to-orange-50">
    <div class="min-h-screen flex items-center justify-center p-4 py-15">
        <div class="w-full max-w-md">
            <!-- Logo Section -->
            <div class="text-center mb-6">
                <h1 class="text-4xl font-bold text-gray-800">
                    <span class="text-orange-500">Farm</span><span class="text-green-600">Fresh</span>
                </h1>
                <div class="w-20 h-1 bg-gradient-to-r from-orange-500 to-green-600 mx-auto mt-2 rounded-full"></div>
            </div>
            
            <!-- Header Card -->
            <div class="bg-gradient-to-r from-green-600 to-green-700 text-white rounded-t-xl p-6 shadow-lg">
                <div class="text-center">
                    <h2 class="text-2xl font-bold mb-2">{{ $title ?? 'Authentication' }}</h2>
                    <p class="text-green-100 text-sm">{{ $section_description ?? 'Please authenticate to continue' }}</p>
                </div>
            </div>
            
            <!-- Form Card -->
            <div class="bg-white rounded-b-xl shadow-xl border-t-0 p-6">
                {{ $slot }}
            </div>
            
            <!-- Footer -->
            <div class="text-center mt-6">
                <p class="text-gray-500 text-sm">
                    © {{ date('Y') }} <span class="font-medium text-orange-500">Farm</span><span class="font-medium text-green-600">Fresh</span>. All rights reserved.
                </p>
            </div>
        </div>
    </div>
</body>
</html>
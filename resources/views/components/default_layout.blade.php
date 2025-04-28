<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'Default Title')</title>
    @vite('resources/css/app.css')
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <script src="//unpkg.com/alpinejs" defer></script>
    <!-- Menambahkan Google Fonts untuk font Inter -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600&display=swap" rel="stylesheet">
</head>
<body class="bg-gray-100 min-h-screen dark:bg-gray-900 dark:text-gray-200">

    <!-- Sidebar -->
    <x-sidebar />

    <!-- Main Content -->
    <div class="ml-64 flex flex-col min-h-screen"> <!-- Ini supaya semua (header & content) mundur 64 -->
        
        <!-- Navbar -->
        <header class="bg-gray-800 shadow p-4 sticky top-0 z-50">
            <h1 class="text-2xl font-bold text-white">@yield('header', 'Dashboard')</h1>
        </header>

        <!-- Page Content -->
        <main class="flex-1 p-6">
            @yield('content')
        </main>

    </div>

</body>
</html>

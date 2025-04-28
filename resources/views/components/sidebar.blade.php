<div class="fixed top-0 left-0 w-64 bg-gray-800 h-screen shadow-md flex flex-col">
    <!-- Logo / Title -->
    <div class="p-6 text-2xl font-bold text-white border-b">
        FarmFresh
    </div>

    <!-- Navigation -->
    <nav class="flex-1 p-4 space-y-4">
        <a href="{{ route('dashboard.index') }}"
            class="block py-2 px-4 rounded hover:bg-gray-700 text-xl text-white font-bold {{ request()->routeIs('dashboard.index') ? 'bg-gray-700 font-semibold' : '' }}">
            Dashboard
        </a>
        <!-- Produk -->
        <a href="{{ route('produk.index') }}"
            class="block py-2 px-4 rounded hover:bg-gray-700 text-xl text-white font-bold {{ request()->routeIs('produk.*') ? 'bg-gray-700 font-semibold' : '' }}">
            Produk
        </a>

        <!-- Kategori -->
        <a href="{{ route('kategori.index') }}"
           class="block py-2 px-4 rounded hover:bg-gray-700 text-xl text-white-500 font-bold {{ request()->routeIs('kategori.*') ? 'bg-gray-700 font-semibold' : '' }}">
            Kategori
        </a>

        <!-- Petani -->
        <a href="{{ route('petani.index') }}"
           class="block py-2 px-4 rounded hover:bg-gray-700 text-xl text-white-500 font-bold {{ request()->routeIs('petani.*') ? 'bg-gray-700 font-semibold' : '' }}">
            Petani
        </a>
    </nav>
</div>

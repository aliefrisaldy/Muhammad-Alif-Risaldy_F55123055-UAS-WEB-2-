<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>FarmFresh</title>
    @vite('resources/css/app.css')
    <link
      href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;300;400;600;700;900&display=swap"
      rel="stylesheet"
    />
    <script
      src="https://kit.fontawesome.com/a076d05399.js"
      crossorigin="anonymous"
    ></script>

    <link href="img/favicon.ico" rel="icon" />
    
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
    />

    <link
      href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600&family=Roboto:wght@500;700&display=swap"
      rel="stylesheet"
    />
    <link
      href="https://fonts.googleapis.com/css2?family=Poppins:wght@600;800&family=Roboto:wght@400;500&display=swap"
      rel="stylesheet"
    />

    <style>
        /* Pastikan body tidak memiliki margin/padding yang mengganggu */
        body {
            margin: 0;
            padding: 0;
        }
        
        /* Pastikan navbar sticky berfungsi dengan baik */
        .navbar-sticky {
            position: sticky;
            top: 0;
            z-index: 1000;
            background-color: #3BA549;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }
        
        /* Smooth transition untuk hover effect */
        .nav-link {
            transition: background-color 0.3s ease;
        }
        
        .nav-link:hover {
            background-color: #FFA740;
        }
        
        /* Pastikan konten utama tidak tertutup navbar */
        .main-content {
            position: relative;
            z-index: 1;
        }
    </style>
</head>
<body>
    <!-- Header Section (Non-sticky) -->
    <header class="bg-white">
        <div class="container mx-auto px-5 hidden lg:block">
            <div class="grid grid-cols-3 items-center py-3">
                <!-- Logo -->
                <div class="flex items-center">
                    <img
                        src="{{ asset('images/Logo.jpg') }}" alt="Logo"
                        class="w-24 h-24 mr-3"
                    />
                </div>

                <!-- Title -->
                <div class="flex justify-center">
                    <h1 class="text-5xl font-bold text-green-600">
                        <span class="text-orange-500">Farm</span>Fresh
                    </h1>
                </div>

                <!-- Social Media Links -->
                <div class="flex justify-end space-x-2 items-center">
                    <a class="bg-green-600 text-white w-10 h-10 flex items-center justify-center rounded-full hover:bg-green-700 transition-colors" href="https://freewebsitecode.com/">
                        <i class="fab fa-twitter"></i>
                    </a>
                    <a class="bg-green-600 text-white w-10 h-10 flex items-center justify-center rounded-full hover:bg-green-700 transition-colors" href="https://facebook.com/freewebsitecode/">
                        <i class="fab fa-facebook-f"></i>
                    </a>
                    <a class="bg-green-600 text-white w-10 h-10 flex items-center justify-center rounded-full hover:bg-green-700 transition-colors" href="https://freewebsitecode.com/">
                        <i class="fab fa-linkedin-in"></i>
                    </a>
                    <a class="bg-green-600 text-white w-10 h-10 flex items-center justify-center rounded-full hover:bg-green-700 transition-colors" href="https://youtube.com/freewebsitecode/">
                        <i class="fab fa-youtube"></i>
                    </a>
                </div>
            </div>
        </div>
    </header>

    <!-- Navigation Bar (Sticky) -->
    <nav class="navbar-sticky w-full">
        <div class="container mx-auto">
            <ul class="flex items-center justify-center h-[80px] list-none m-0 p-0">
                <li class="relative">
                    <a
                        href="{{ route('home.index') }}"
                        class="nav-link block px-8 py-5 text-white text-lg font-bold uppercase"
                    >HOME</a>
                </li>
                <li class="relative">
                    <a
                        href="{{ route('service.index') }}"
                        class="nav-link block px-8 py-5 text-white text-lg font-bold uppercase"
                    >SERVICE</a>
                </li>
                <li class="relative">
                    <a
                        href="{{ route('products.index') }}"
                        class="nav-link block px-8 py-5 text-white text-lg font-bold uppercase"
                    >PRODUCT</a>
                </li>
                <li class="relative">
                    <a
                        href="{{ route('cart.index') }}"
                        class="nav-link block px-8 py-5 text-white text-lg font-bold uppercase"
                    >CART</a>
                </li>
                <li class="relative">
                    <a
                        href="{{ route('checkout.daftar-pesanan') }}"
                        class="nav-link block px-8 py-5 text-white text-lg font-bold uppercase"
                    >ORDERS</a>
                </li>
                <li class="relative">
                    <a
                        href="{{ route('farmers.index') }}"
                        class="nav-link block px-8 py-5 text-white text-lg font-bold uppercase"
                    >FARMERS</a>
                </li>
                <li class="relative">
                    <a
                        href="{{ route('profile.index') }}"
                        class="nav-link block px-8 py-5 text-white text-lg font-bold uppercase"
                    >PROFILE</a>
                </li>
            </ul>
        </div>
    </nav>

    <!-- Main Content -->
    <main class="main-content">
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="bg-green-500 text-white mt-10">
        <div class="container mx-auto py-10 px-5">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                <!-- Get In Touch -->
                <div class="space-y-5">
                    <h4 class="text-xl font-semibold">Get In Touch</h4>
                    <div class="flex items-center space-x-3">
                        <i class="fa-solid fa-location-dot"></i>
                        <p class="m-0">Universitas Tadulako, Palu, Indonesia</p>
                    </div>
                    <div class="flex items-center space-x-3">
                        <i class="fa-solid fa-envelope"></i>
                        <p class="m-0">FarmFresh@gmail.com</p>
                    </div>
                    <div class="flex items-center space-x-3">
                        <i class="fa-solid fa-phone"></i>
                        <p class="m-0">+62-822-5970-9369</p>
                    </div>
                    <div class="flex space-x-3 mt-4">
                        <a
                            class="bg-orange-500 text-white rounded-full p-3 hover:bg-orange-600 transition-colors"
                            href="https://twitter.com"
                        ><i class="fab fa-twitter"></i></a>
                        <a
                            class="bg-orange-500 text-white rounded-full p-3 hover:bg-orange-600 transition-colors"
                            href="https://facebook.com"
                        ><i class="fab fa-facebook-f"></i></a>
                        <a
                            class="bg-orange-500 text-white rounded-full p-3 hover:bg-orange-600 transition-colors"
                            href="https://linkedin.com"
                        ><i class="fab fa-linkedin-in"></i></a>
                        <a
                            class="bg-orange-500 text-white rounded-full p-3 hover:bg-orange-600 transition-colors"
                            href="https://youtube.com"
                        ><i class="fab fa-youtube"></i></a>
                    </div>
                </div>

                <!-- Quick Links -->
                <div class="space-y-5">
                    <h4 class="text-xl font-semibold">Quick Links</h4>
                    <ul class="space-y-2">
                        <li>
                            <a class="text-white flex items-center space-x-2 hover:text-orange-300 transition-colors" href="#">
                                <i class="fa-solid fa-arrow-right"></i><span>Home</span>
                            </a>
                        </li>
                        <li>
                            <a class="text-white flex items-center space-x-2 hover:text-orange-300 transition-colors" href="#">
                                <i class="fa-solid fa-arrow-right"></i><span>About Us</span>
                            </a>
                        </li>
                        <li>
                            <a class="text-white flex items-center space-x-2 hover:text-orange-300 transition-colors" href="#">
                                <i class="fa-solid fa-arrow-right"></i><span>Our Services</span>
                            </a>
                        </li>
                        <li>
                            <a class="text-white flex items-center space-x-2 hover:text-orange-300 transition-colors" href="#">
                                <i class="fa-solid fa-arrow-right"></i><span>Meet The Team</span>
                            </a>
                        </li>
                        <li>
                            <a class="text-white flex items-center space-x-2 hover:text-orange-300 transition-colors" href="#">
                                <i class="fa-solid fa-arrow-right"></i><span>Latest Blog</span>
                            </a>
                        </li>
                        <li>
                            <a class="text-white flex items-center space-x-2 hover:text-orange-300 transition-colors" href="#">
                                <i class="fa-solid fa-arrow-right"></i><span>Contact Us</span>
                            </a>
                        </li>
                    </ul>
                </div>

                <!-- Popular Links -->
                <div class="space-y-5">
                    <h4 class="text-xl font-semibold">Popular Links</h4>
                    <ul class="space-y-2">
                        <li>
                            <a class="text-white flex items-center space-x-2 hover:text-orange-300 transition-colors" href="#">
                                <i class="fa-solid fa-arrow-right"></i><span>Home</span>
                            </a>
                        </li>
                        <li>
                            <a class="text-white flex items-center space-x-2 hover:text-orange-300 transition-colors" href="#">
                                <i class="fa-solid fa-arrow-right"></i><span>About Us</span>
                            </a>
                        </li>
                        <li>
                            <a class="text-white flex items-center space-x-2 hover:text-orange-300 transition-colors" href="#">
                                <i class="fa-solid fa-arrow-right"></i><span>Our Services</span>
                            </a>
                        </li>
                        <li>
                            <a class="text-white flex items-center space-x-2 hover:text-orange-300 transition-colors" href="#">
                                <i class="fa-solid fa-arrow-right"></i><span>Meet The Team</span>
                            </a>
                        </li>
                        <li>
                            <a class="text-white flex items-center space-x-2 hover:text-orange-300 transition-colors" href="#">
                                <i class="fa-solid fa-arrow-right"></i><span>Latest Blog</span>
                            </a>
                        </li>
                        <li>
                            <a class="text-white flex items-center space-x-2 hover:text-orange-300 transition-colors" href="#">
                                <i class="fa-solid fa-arrow-right"></i><span>Contact Us</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </footer>

    <!-- Copyright -->
    <div class="bg-orange-500 text-white py-4">
        <div class="container mx-auto text-center px-5">
            <p>
                &copy;
                <a
                    class="text-white font-semibold hover:text-orange-200 transition-colors"
                    href="https://freewebsitecode.com"
                >FarmFresh</a>. All Rights Reserved. Designed by
                <a
                    class="text-white font-semibold hover:text-orange-200 transition-colors"
                >Muhammad Alif Risaldy_F55123055</a>
            </p>
        </div>
    </div>
</body>
</html>
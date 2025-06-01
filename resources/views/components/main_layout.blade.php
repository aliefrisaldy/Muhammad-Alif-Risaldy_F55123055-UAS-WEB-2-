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

    

    
</head>
<body>
    <header>
    <div class="container mx-auto px-5 hidden lg:block">
    <div class="grid grid-cols-3 items-center py-3">
        <!-- Logo -->
        <div class="flex items-center">
            <img
                src="{{ asset('images/Logo.jpg') }}" alt="Logo"
                class="w-24 h-24 mr-3"
            />
        </div>

        <div class="flex justify-center">
            <h1 class="text-5xl font-bold text-green-600">
                <span class="text-orange-500">Farm</span>Fresh
            </h1>
        </div>


        <div class="flex justify-end space-x-2 items-center">

            <a class="bg-green-600 text-white w-10 h-10 flex items-center justify-center rounded-full" href="https://freewebsitecode.com/">
                <i class="fab fa-twitter"></i>
            </a>
            <a class="bg-green-600 text-white w-10 h-10 flex items-center justify-center rounded-full" href="https://facebook.com/freewebsitecode/">
                <i class="fab fa-facebook-f"></i>
            </a>
            <a class="bg-green-600 text-white w-10 h-10 flex items-center justify-center rounded-full" href="https://freewebsitecode.com/">
                <i class="fab fa-linkedin-in"></i>
            </a>
            <a class="bg-green-600 text-white w-10 h-10 flex items-center justify-center rounded-full" href="https://youtube.com/freewebsitecode/">
                <i class="fab fa-youtube"></i>
            </a>
        </div>
    </div>
    </div>


    <nav class="bg-[#3BA549] w-full flex justify-center h-[80px] sticky top-0 z-50">
      <ul class="flex items-center h-full list-none">
        <li class="relative">
          <a
            href="{{ route('home.index') }}"
            class="block px-8 py-5 text-white text-lg font-bold uppercase hover:bg-[#FFA740] transition duration-300"
            >HOME</a>
        </li>
        <li class="relative">

        <a
          href="{{ route('service.index') }}"
          class="block px-8 py-5 text-white text-lg font-bold uppercase hover:bg-[#FFA740] transition duration-300"
          >SERVICE</a
        >
      </li>

      <li class="relative">
          <a
            href="{{ route('products.index') }}"
            class="block px-8 py-5 text-white text-lg font-bold uppercase hover:bg-[#FFA740] transition duration-300"
            >PRODUCT</a
          >
        
        <li class="relative">
          <a
            href="{{ route('cart.index') }}"
            class="block px-8 py-5 text-white text-lg font-bold uppercase hover:bg-[#FFA740] transition duration-300"
            >CART</a
          >
          </li>

          <li class="relative">
          <a
            href="{{ route('checkout.daftar-pesanan') }}"
            class="block px-8 py-5 text-white text-lg font-bold uppercase hover:bg-[#FFA740] transition duration-300"
            >ORDERS</a
          >
          </li>

          <li class="relative">
          <a
            href="{{ route('farmers.index') }}"
            class="block px-8 py-5 text-white text-lg font-bold uppercase hover:bg-[#FFA740] transition duration-300"
            >FARMERS</a
          >
          </li>

          <li class="relative">
          <a
            href="{{ route('profile.index') }}"
            class="block px-8 py-5 text-white text-lg font-bold uppercase hover:bg-[#FFA740] transition duration-300"
            >Profile</a
          >
          </li>

      </ul>
    </nav>
    </header>

    <main>
            @yield('content')
    </main>


    <div class="bg-green-500 text-white mt-10">
      <div class="container mx-auto py-10 pl-[150px]">
        <div class="flex flex-wrap -mx-3">
          <div class="w-full md:w-1/2 lg:w-1/3 px-3 space-y-5">
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
                class="bg-orange-500 text-white rounded-full p-3"
                href="https://twitter.com"
                ><i class="fab fa-twitter"></i
              ></a>
              <a
                class="bg-orange-500 text-white rounded-full p-3"
                href="https://facebook.com"
                ><i class="fab fa-facebook-f"></i
              ></a>
              <a
                class="bg-orange-500 text-white rounded-full p-3"
                href="https://linkedin.com"
                ><i class="fab fa-linkedin-in"></i
              ></a>
              <a
                class="bg-orange-500 text-white rounded-full p-3"
                href="https://youtube.com"
                ><i class="fab fa-youtube"></i
              ></a>
            </div>
          </div>

          <div class="w-full md:w-1/2 lg:w-1/3 px-3 space-y-5">
            <h4 class="text-xl font-semibold">Quick Links</h4>
            <ul class="space-y-2">
              <li>
                <a class="text-white flex items-center space-x-2" href="#"
                  ><i class="fa-solid fa-arrow-right"></i><span>Home</span></a
                >
              </li>
              <li>
                <a class="text-white flex items-center space-x-2" href="#"
                  ><i class="fa-solid fa-arrow-right"></i><span>About Us</span></a
                >
              </li>
              <li>
                <a class="text-white flex items-center space-x-2" href="#"
                  ><i class="fa-solid fa-arrow-right"></i><span>Our Services</span></a
                >
              </li>
              <li>
                <a class="text-white flex items-center space-x-2" href="#"
                  ><i class="fa-solid fa-arrow-right"></i><span>Meet The Team</span></a
                >
              </li>
              <li>
                <a class="text-white flex items-center space-x-2" href="#"
                  ><i class="fa-solid fa-arrow-right"></i><span>Latest Blog</span></a
                >
              </li>
              <li>
                <a class="text-white flex items-center space-x-2" href="#"
                  ><i class="fa-solid fa-arrow-right"></i><span>Contact Us</span></a
                >
              </li>
            </ul>
          </div>

          <div class="w-full md:w-1/2 lg:w-1/3 px-3 space-y-5">
            <h4 class="text-xl font-semibold">Popular Links</h4>
            <ul class="space-y-2">
              <li>
                <a class="text-white flex items-center space-x-2" href="#"
                  ><i class="fa-solid fa-arrow-right"></i><span>Home</span></a
                >
              </li>
              <li>
                <a class="text-white flex items-center space-x-2" href="#"
                  ><i class="fa-solid fa-arrow-right"></i></i><span>About Us</span></a
                >
              </li>
              <li>
                <a class="text-white flex items-center space-x-2" href="#"
                  ><i class="fa-solid fa-arrow-right"></i><span>Our Services</span></a
                >
              </li>
              <li>
                <a class="text-white flex items-center space-x-2" href="#"
                  ><i class="fa-solid fa-arrow-right"></i></i
                  ><span>Meet The Team</span></a
                >
              </li>
              <li>
                <a class="text-white flex items-center space-x-2" href="#"
                  ><i class="fa-solid fa-arrow-right"></i><span>Latest Blog</span></a
                >
              </li>
              <li>
                <a class="text-white flex items-center space-x-2" href="#"
                  ><i class="fa-solid fa-arrow-right"></i></i><span>Contact Us</span></a
                >
              </li>
            </ul>
          </div>
        </div>
            </div>
          </form>
        </div>
      </div>
    </div>
    <div class="bg-orange-500 text-white py-4">
      <div class="container mx-auto text-center">
        <p>
          &copy;
          <a
            class="text-secondary font-semibold"
            href="https://freewebsitecode.com"
            >FarmFresh</a
          >. All Rights Reserved. Designed by
          <a
            class="text-secondary font-semibold"
            >Muhammad Alif Risaldy_F55123055</a
          >
        </p>
      </div>
    </div>
    

    
</body>
</html>
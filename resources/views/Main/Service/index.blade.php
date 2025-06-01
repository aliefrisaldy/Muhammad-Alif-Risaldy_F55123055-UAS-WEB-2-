@extends('components.main_layout')

@section('content')


<div class="bg-gradient-to-b from-gray-50 to-white py-16">
    <div class="container mx-auto px-4">
        <div class="text-center mb-10 max-w-lg mx-auto">
            <h6 class="text-orange-500 font-bold uppercase text-2xl mb-2">Our Service</h6>
            <h1 class="text-5xl font-bold text-gray-800 leading-tight mb-4">What We Can Do for You</h1>
        </div>
    </div>
</div>


  <div class="container pt-5 px-10">
    <div
      class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-10 items-stretch mb-20"
    >
      <div>
        <div class="mb-6">
          <h6 class="text-green-500 font-bold uppercase text-xl mb-2">
            Services
          </h6>
          <h1 class="text-5xl font-bold text-gray-800 leading-tight mb-4">
            Organic Farm Services
          </h1>
        </div>
        <p class="mb-6 text-gray-600">
          Our organic farm offers a wide range of 
          services to help you grow healthier and more sustainable crops, 
          from soil management to harvesting, all while respecting nature's balance.
        </p>
        <a
          href="#"
          class="bg-green-500 text-white py-3 px-5 inline-block rounded text-xl font-bold"
          >Contact Us</a
        >
      </div>
      <div
        class="bg-gray-100 text-center p-6 rounded flex flex-col items-center gap-3"
      >
        <svg
          xmlns="http://www.w3.org/2000/svg"
          viewBox="0 0 512 512"
          width="60"
          height="60"
        >
          <defs>
            <linearGradient id="gradient" x1="0" x2="1" y1="0" y2="1">
              <stop offset="0%" stop-color="#67b26f" />
              <stop offset="100%" stop-color="#ffa64d" />
            </linearGradient>
          </defs>
          <path
            fill="url(#gradient)"
            d="M346.7 6C337.6 17 320 42.3 320 72c0 40 15.3 55.3 40 80s40 40 80 
            40c29.7 0 55-17.6 66-26.7c4-3.3 6-8.2 6-13.3s-2-10-6-13.2c-11.4-9.1-38.3-26.8-74-26.8c-32 
            0-40 8-40 8s8-8 8-40c0-35.7-17.7-62.6-26.8-74C370 
            2 365.1 0 360 0s-10 2-13.3 6zM244.6 136c-40 0-77.1 
            18.1-101.7 48.2l60.5 60.5c6.2 6.2 6.2 16.4 0 
            22.6s-16.4 6.2-22.6 0l-55.3-55.3 0 .1L2.2 477.9C-2 
            487-.1 497.8 7 505s17.9 9 27.1 4.8l134.7-62.4-52.1-52.1c-6.2-6.2-6.2-16.4 0-22.6s16.4-6.2 22.6 
            0L199.7 433l100.2-46.4c46.4-21.5 76.2-68 76.2-119.2C376 194.8 317.2 136 244.6 136z"
          />
        </svg>
        <h4 class="text-xl font-semibold mb-2">Fresh Vegetables</h4>
        <p class="text-gray-600">
          We provide a variety of fresh, organic vegetables harvested with
           care and grown without pesticides to ensure the highest quality and nutrition.
        </p>
      </div>
      <div
        class="bg-gray-100 text-center p-6 rounded flex flex-col items-center gap-3"
      >
        <svg
          xmlns="http://www.w3.org/2000/svg"
          viewBox="0 0 512 512"
          width="60"
          height="60"
        >
          <defs>
            <linearGradient id="gradient" x1="0" x2="1" y1="0" y2="1">
              <stop offset="0%" stop-color="#67b26f" />
              <stop offset="100%" stop-color="#ffa64d" />
            </linearGradient>
          </defs>
          <path
            fill="url(#gradient)"
            d="M224 112c-8.8 0-16-7.2-16-16l0-16c0-44.2
             35.8-80 80-80l16 0c8.8 0 16 7.2 16 16l0 16c0 
             44.2-35.8 80-80 80l-16 0zM0 288c0-76.3 35.7-160 
             112-160c27.3 0 59.7 10.3 82.7 19.3c18.8 7.3 39.9 7.3 58.7 
             0c22.9-8.9 55.4-19.3 82.7-19.3c76.3 0 112 83.7 112 160c0 
             128-80 224-160 224c-16.5 0-38.1-6.6-51.5-11.3c-8.1-2.8-16.9-2.8-25 
             0c-13.4 4.7-35 11.3-51.5 11.3C80 512 0 416 0 288z"
          />
        </svg>

        <h4 class="text-xl font-semibold mb-2">Fresh Fruits</h4>
        <p class="text-gray-600">
          Our farm produces a range of seasonal fruits, 
          handpicked for freshness and flavor, ensuring the
           best taste without harmful chemicals.
        </p>
      </div>
      <div
        class="bg-gray-100 text-center p-6 rounded flex flex-col items-center gap-3"
      >
        <svg
          xmlns="http://www.w3.org/2000/svg"
          viewBox="0 0 640 512"
          width="60"
          height="60"
        >
          <defs>
            <linearGradient id="gradient" x1="0" x2="1" y1="0" y2="1">
              <stop offset="0%" stop-color="#67b26f" />
              <stop offset="100%" stop-color="#ffa64d" />
            </linearGradient>
          </defs>
          <path
            fill="url(#gradient)"
            d="M96 224l0 32 0 160c0 17.7 14.3 32 32 32l32 0c17.7 
            0 32-14.3 32-32l0-88.2c9.9 6.6 20.6 12 32 16.1l0 24.2c0 
            8.8 7.2 16 16 16s16-7.2 16-16l0-16.9c5.3 .6 10.6 .9 
            16 .9s10.7-.3 16-.9l0 16.9c0 8.8 7.2 16 16 16s16-7.2 16-16l0-24.2c11.4-4 22.1-9.4 
            32-16.1l0 88.2c0 17.7 14.3 32 32 32l32 0c17.7 0 32-14.3 32-32l0-160 32 32 0 49.5c0 9.5 2.8 18.7 
            8.1 26.6L530 427c8.8 13.1 23.5 21 39.3 21c22.5 0 41.9-15.9 
            46.3-38l20.3-101.6c2.6-13-.3-26.5-8-37.3l-3.9-5.5 0-81.6c0-13.3-10.7-24-24-24s-24 10.7-24 24l0 
            14.4-52.9-74.1C496 86.5 452.4 64 405.9 64L272 64l-16 0-64 0-48 0C77.7 64 24 117.7 24 184l0 54C9.4 
            249.8 0 267.8 0 288l0 17.6c0 8 6.4 14.4 14.4 14.4C46.2 320 72 294.2 72 262.4l0-6.4 0-32 0-40c0-24.3 
            12.1-45.8 30.5-58.9C98.3 135.9 96 147.7 96 160l0 64zM560 336a16 16 0 1 1 
            32 0 16 16 0 1 1 -32 0zM166.6 166.6c-4.2-4.2-6.6-10-6.6-16c0-12.5 10.1-22.6 22.6-22.6l178.7 
            0c12.5 0 22.6 10.1 22.6 22.6c0 6-2.4 11.8-6.6 16l-23.4 23.4C332.2 211.8 302.7 224 272 
            224s-60.2-12.2-81.9-33.9l-23.4-23.4z"
          />
        </svg>

        <h4 class="text-xl font-semibold mb-2">Healty Cattle</h4>
        <p class="text-gray-600">
          Our livestock is raised with care and free-range practices, 
          ensuring that the cattle remain healthy while providing high-quality, 
          organic meat and dairy products.
        </p>
      </div>
      <div
        class="bg-gray-100 text-center p-6 rounded flex flex-col items-center gap-3"
      >
        <svg
          xmlns="http://www.w3.org/2000/svg"
          viewBox="0 0 640 512"
          width="60"
          height="60"
        >
          <defs>
            <linearGradient id="gradient" x1="0" x2="1" y1="0" y2="1">
              <stop offset="0%" stop-color="#4facfe" />
              <stop offset="100%" stop-color="#00f2fe" />
            </linearGradient>
          </defs>
          <path
            fill="url(#gradient)"
            d="M96 64c0-35.3 28.7-64 64-64L266.3 0c26.2 0 49.7 15.9 59.4 40.2L373.7 160 480 160l0-33.8c0-24.8 5.8-49.3 16.9-71.6l2.5-5c7.9-15.8 27.1-22.2 42.9-14.3s22.2 27.1 14.3 42.9l-2.5 5c-6.7 13.3-10.1 28-10.1 42.9l0 33.8 56 0c22.1 0 40 17.9 40 40l0 45.4c0 16.5-8.5 31.9-22.6 40.7l-43.3 27.1c-14.2-5.9-29.8-9.2-46.1-9.2c-39.3 0-74.1 18.9-96 48l-80 0c0 17.7-14.3 32-32 32l-8.2 0c-1.7 4.8-3.7 9.5-5.8 14.1l5.8 5.8c12.5 12.5 12.5 32.8 0 45.3l-22.6 22.6c-12.5 12.5-32.8 12.5-45.3 0l-5.8-5.8c-4.6 2.2-9.3 4.1-14.1 5.8l0 8.2c0 17.7-14.3 32-32 32l-32 0c-17.7 0-32-14.3-32-32l0-8.2c-4.8-1.7-9.5-3.7-14.1-5.8l-5.8 5.8c-12.5 12.5-32.8 12.5-45.3 0L40.2 449.1c-12.5-12.5-12.5-32.8 0-45.3l5.8-5.8c-2.2-4.6-4.1-9.3-5.8-14.1L32 384c-17.7 0-32-14.3-32-32l0-32c0-17.7 14.3-32 32-32l8.2 0c1.7-4.8 3.7-9.5 5.8-14.1l-5.8-5.8c-12.5-12.5-12.5-32.8 0-45.3l22.6-22.6c9-9 21.9-11.5 33.1-7.6l0-.6 0-32 0-96zm170.3 0L160 64l0 96 32 0 112.7 0L266.3 64zM176 256a80 80 0 1 0 0 160 80 80 0 1 0 0-160zM528 448a24 24 0 1 0 0-48 24 24 0 1 0 0 48zm0 64c-48.6 0-88-39.4-88-88c0-29.8 14.8-56.1 37.4-72c14.3-10.1 31.8-16 50.6-16c2.7 0 5.3 .1 7.9 .3c44.9 4 80.1 41.7 80.1 87.7c0 48.6-39.4 88-88 88z"
          />
        </svg>

        <h4 class="text-xl font-semibold mb-2">Modern Truck</h4>
        <p class="text-gray-600">
          The latest technology in organic farming helps increase crop yields sustainably with environmentally friendly methods. We use farming techniques that prioritize soil and plant health.
        </p>
      </div>
      <div
        class="bg-gray-100 text-center p-6 rounded flex flex-col items-center justify-center gap-3"
      >
        <svg
          xmlns="http://www.w3.org/2000/svg"
          viewBox="0 0 512 512"
          width="60"
          height="60"
        >
          <defs>
            <linearGradient id="gradient" x1="0" x2="1" y1="0" y2="1">
              <stop offset="0%" stop-color="#67b26f" />
              <stop offset="100%" stop-color="#ffa64d" />
            </linearGradient>
          </defs>
          <path
            fill="url(#gradient)"
            d="M512 32c0 113.6-84.6 207.5-194.2 222c-7.1-53.4-30.6-101.6-65.3-139.3C290.8 46.3 364 0 448 0l32 0c17.7 0 32 14.3 32 32zM0 96C0 78.3 14.3 64 32 64l32 0c123.7 0 224 100.3 224 224l0 32 0 160c0 17.7-14.3 32-32 32s-32-14.3-32-32l0-160C100.3 320 0 219.7 0 96z"
          />
        </svg>
        <h4 class="text-xl font-semibold mb-2">Farming Plans</h4>
        <p class="text-gray-600">
          Our farming plans are designed to optimize organic crop production through sustainable practices. We provide tailored strategies to improve soil fertility and enhance biodiversity.
        </p>
      </div>
    </div>
  </div>
@endsection

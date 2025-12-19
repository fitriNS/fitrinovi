<!DOCTYPE html>
<html lang="id">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>MentalCare - @yield('title')</title>

  <!-- Font Awesome untuk ikon -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" />

  <!-- Tailwind CSS -->
  <script src="https://cdn.tailwindcss.com"></script>

  <!-- Animate.css -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />

  <!-- Inter Font -->
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" rel="stylesheet" />

  <!-- Tailwind Config -->
  <script>
    tailwind.config = {
      theme: {
        fontFamily: {
          inter: ['Inter', 'sans-serif'],
        },
        extend: {
          colors: {
            primary: '#0d47a1',
            cyan: {
              400: '#22d3ee',
            },
          }
        }
      }
    }
  </script>

  <style>
    body {
      font-family: 'Inter', sans-serif;
    }
  </style>
</head>

<body class="text-gray-800 bg-gray-50">

  <!-- Navbar -->
  <header class="fixed top-0 left-0 right-0 z-50 shadow-sm" style="background-color: #0d47a1;">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
      <div class="flex justify-between items-center h-16">
        <!-- Logo -->
        <a href="/" class="flex items-center space-x-2">
          <img src="{{ asset('landing/img/logo.png') }}" alt="Logo" class="h-9">
          <span class="text-white text-lg font-bold">MentalCare</span>
        </a>

        <!-- Menu -->
        <div class="hidden md:flex space-x-6 items-center">
          <a href="/" class="text-white hover:text-cyan-300 font-medium transition">Home</a>
          @guest
        <a href="/login"
        class="px-4 py-2 bg-cyan-400 text-white rounded-full font-semibold hover:bg-white hover:text-blue-900 border-2 border-white transition duration-300">
        <i class="fas fa-sign-in-alt mr-1"></i> Login
        </a>
      @endguest

          @auth
        <div class="relative">
        <button id="dropdownButton"
          class="px-4 py-2 bg-transparent text-white border border-white rounded-full font-semibold flex items-center space-x-2 hover:bg-white hover:text-blue-900 transition duration-300 focus:outline-none">
          <i class="fas fa-user text-white"></i>
          <span>{{ Auth::user()->name }}</span>
          <i class="fas fa-caret-down text-white text-sm"></i>
        </button>

        <!-- Dropdown -->
        <div id="dropdownMenu" class="absolute right-0 mt-2 w-48 bg-white rounded-md shadow-lg py-2 z-50 hidden">
          <form method="POST" action="{{ route('logout') }}">
          @csrf
          <button type="submit"
            class="w-full text-left px-4 py-2 text-red-600 hover:bg-gray-100 flex items-center space-x-2 transition duration-200">
            <i class="fas fa-sign-out-alt"></i>
            <span>Logout</span>
          </button>
          </form>
        </div>
        </div>
      @endauth
        </div>
      </div>
    </div>
  </header>

  <!-- Script Dropdown -->
  <script>
    document.addEventListener("DOMContentLoaded", function () {
      const btn = document.getElementById("dropdownButton");
      const menu = document.getElementById("dropdownMenu");

      btn?.addEventListener("click", function (e) {
        e.stopPropagation();
        menu.classList.toggle("hidden");
      });

      document.addEventListener("click", function () {
        menu.classList.add("hidden");
      });
    });
  </script>

  <!-- Spacer for navbar -->
  <div class="h-16"></div>

  <!-- Main Content -->
  <main class="min-h-screen">
    @yield('cl_content')
  </main>

  <!-- Footer -->
  <footer class="text-center text-xs py-6 text-gray-500 mt-10 bg-white border-t">
    &copy; {{ date('Y') }} MentalCare. All rights reserved.
  </footer>

</body>

</html>
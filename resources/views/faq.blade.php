<!DOCTYPE html>
<html lang="id">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>MentalCare - Informasi</title>

  <!-- Tailwind CSS -->
  <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" />
  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" rel="stylesheet" />

  <style>
    body {
      font-family: 'Inter', sans-serif;
    }
  </style>
</head>

<body class="bg-gray-100 text-gray-800">

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

      document.addEventListener("click", function (e) {
        if (!btn.contains(e.target) && !menu.contains(e.target)) {
          menu.classList.add("hidden");
        }
      });
    });
  </script>

  <!-- Spacer untuk Navbar -->
  <div class="h-16"></div>

  <!-- Header Diagnosa -->
  <header class="bg-indigo-600 text-white shadow">
    <div class="max-w-4xl mx-auto px-4 py-6">
      <h1 class="text-3xl font-bold">Diagnosa Tingkat Depresi Mahasiswa</h1>
      <p class="mt-1 text-sm">Pahami kondisi Mental Anda Secara Dini.</p>
    </div>
  </header>

  <!-- Step Navigasi -->
  <div class="bg-white shadow-sm border-b">
    <div class="max-w-4xl mx-auto px-4 pt-6 pb-2">
      <div class="flex justify-between text-sm font-medium text-gray-500">
        <div class="w-1/3 text-center text-indigo-600">
          <span class="block">1. Informasi</span>
          <div class="h-1 bg-indigo-600 rounded mt-1"></div>
        </div>
        <div class="w-1/3 text-center">
          <span class="block">2. Pertanyaan</span>
        </div>
        <div class="w-1/3 text-center">
          <span class="block">3. Hasil</span>
        </div>
      </div>
    </div>
  </div>

  <!-- Konten Utama -->
  <main class="max-w-4xl mx-auto px-4 py-10">
    <section class="bg-white rounded-2xl shadow-lg p-8">
      <h2 class="text-2xl font-semibold mb-6">Sebelum Memulai</h2>
      <ul class="list-disc list-inside space-y-3 text-gray-700">
        <li>Tes ini <strong>gratis</strong> dan ditujukan khusus untuk <strong>mahasiswa</strong>.</li>
        <li>Terdiri dari <strong>20 pertanyaan</strong>.</li>
      </ul>
      <p class="mt-6 text-gray-600">
        Jika Anda merasa perlu bantuan lebih lanjut, kami sarankan untuk berkonsultasi dengan profesional kesehatan
        mental.
      </p>

      <div class="text-center mt-8">
        <a href="/form"
          class="inline-block bg-gradient-to-r from-indigo-500 to-purple-600 hover:from-indigo-600 hover:to-purple-700 text-white font-semibold px-6 py-3 rounded-full shadow-lg transition duration-300 ease-in-out">
          Next
        </a>
      </div>
    </section>
  </main>

  <!-- Footer -->
  <footer class="text-center text-sm text-gray-500 py-6">
    &copy; 2025 MentalCare. All rights reserved.
  </footer>

</body>

</html>
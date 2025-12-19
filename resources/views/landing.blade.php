<!DOCTYPE html>
<html lang="id">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>MentalCare - Diagnosa Depresi Mahasiswa</title>

  <!-- Bootstrap & AOS -->
  <link rel="stylesheet" href="landing/css/bootstrap.min.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.css" />
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet" />

  <style>
 body {
      font-family: 'Poppins', sans-serif;
      margin: 0;
      padding: 0;
    }

    /* Navbar Modern */
    .navbar {
      padding-top: 1rem;
      padding-bottom: 1rem;
      box-shadow: 0 2px 8px rgba(0, 0, 0, 0.05);
      background-color: #0d47a1 !important;
    }

    .navbar-brand img {
      height: 40px;
    }

    .navbar-brand span {
      color: #ffffff;
      font-weight: 700;
      font-size: 1.3rem;
      margin-left: 0.5rem;
    }

    .nav-link {
      color: #ffffff !important;
      font-weight: 500;
      transition: color 0.3s ease;
    }

    .nav-link:hover {
      color: #4fc3f7 !important;
    }

.login-btn,
.user-btn {
  font-weight: 600;
  border-radius: 25px;
  transition: 0.3s;
  border: 2px solid #ffffff;
  padding: 6px 18px;
  background-color: #0d47a1; /* Biru tua */
  color: #ffffff !important;
}

.login-btn:hover,
.user-btn:hover {
  background-color: #ffffff;
  color: #0d47a1 !important; /* Warna teks saat hover */
}


    .dropdown-menu.animated {
      animation: fadeInDown 0.3s ease-in-out both;
    }

    @keyframes fadeInDown {
      from {
        opacity: 0;
        transform: translateY(-10px);
      }

      to {
        opacity: 1;
        transform: translateY(0);
      }
    }

    /* Hero */
    .hero-section {
      background: linear-gradient(135deg, #417dd7 20%, #3383d3 100%);
      padding: 140px 0;
      text-align: center;
      color: white;
      position: relative;
    }

    .hero-section::after {
      content: '';
      position: absolute;
      inset: 0;
      background: rgba(0, 0, 0, 0.2);
      z-index: 1;
    }

    .hero-section .container {
      position: relative;
      z-index: 2;
    }

    .btn-glow {
      background-color: #fff;
      color: #0d47a1;
      font-weight: 600;
      padding: 12px 30px;
      border-radius: 30px;
      transition: 0.4s;
      border: none;
    }

    .btn-glow:hover {
      box-shadow: 0 0 15px rgba(16, 137, 193, 0.6);
      transform: scale(1.05);
    }

    /* Sections */
    .section {
      padding: 80px 0;
    }

    .section.bg-white {
      background-color: #e3f2fd;
    }

    .section.bg-light {
      background: linear-gradient(to right, #bbdefb, #e3f2fd);
    }

    .card-header {
      background-color: #e3f2fd;
    }

    .card-body {
      background-color: #ffffff;
    }

    .team-card:hover {
      transform: translateY(-5px);
    }

    .full-line {
      height: 3px;
      background: linear-gradient(to right, #64b5f6, #4fc3f7);
      margin: 60px 0;
      border-radius: 2px;
    }

    footer .social-icons a {
      color: #999;
      margin: 0 10px;
      transition: 0.3s;
    }

    @media (max-width: 768px) {
      .navbar-nav .nav-link {
        padding: 10px 0;
      }
    }
  </style>
</head>

<body>
  <!-- NAVBAR -->
  <header class="shadow-sm fixed-top">
    <nav class="navbar navbar-expand-lg navbar-light bg-white">
      <div class="container">
        <a class="navbar-brand d-flex align-items-center" href="/">
          <img src="{{ asset('landing/img/logo.png') }}" alt="Logo">
          <span>MentalCare</span>
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
          <ul class="navbar-nav align-items-center">
            <li class="nav-item"><a class="nav-link" href="/">Home</a></li>

            @guest
                <li class="nav-item ml-lg-3">
                  <a href="/login" class="btn login-btn text-primary">
                    <i class="fas fa-sign-in-alt mr-1"></i> Login
                  </a>
                </li>
            @endguest

            @auth
                <li class="nav-item dropdown ml-lg-3">
                  <a class="nav-link dropdown-toggle btn user-btn text-primary" href="#" id="navbarDropdown"
                    role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fas fa-user-circle mr-1"></i> {{ Auth::user()->name }}
                  </a>
                  <div class="dropdown-menu dropdown-menu-right animated shadow-sm mt-2" aria-labelledby="navbarDropdown">
                    <form method="POST" action="{{ route('logout') }}">
                      @csrf
                      <button class="dropdown-item text-danger" type="submit">
                        <i class="fas fa-sign-out-alt mr-2"></i> Logout
                      </button>
                    </form>
                  </div>
                </li>
            @endauth
          </ul>
        </div>
      </div>
    </nav>
  </header>

  <!-- HERO -->
  <main>
    
<section class="hero-section text-white d-flex align-items-center" style="min-height: 100vh;">
  <div class="container">
    <div class="row align-items-center">
      <!-- TEKS KIRI -->
      <div class="col-md-6 mb-4 mb-md-0" data-aos="fade-right">
      <h2 class="display-3 fw-bold">MentalCare</h2>
<p class="mt-3 fs-5">
  Sistem pakar diagnosa tingkat depresi mahasiswa dengan metode <strong><em>Forward Chaining</em></strong>.</p>

        @auth
      <a href="/form-faq" class="btn btn-glow mt-3">
        Diagnosa Sekarang
      </a>
    @else
      <a href="/login" class="btn btn-glow mt-3"
        onclick="alert('Silakan login terlebih dahulu untuk melakukan diagnosa.')">
        Diagnosa Sekarang
      </a>
    @endauth
      </div>

      <!-- GAMBAR KANAN -->
      <div class="col-md-6" data-aos="fade-left">
        <img src="landing/img/hero-mentalcare.png" alt="Ilustrasi Kesehatan Mental" class="img-fluid rounded shadow" />
      </div>
    </div>
  </div>
</section>


<!-- ABOUT -->
<section class="section bg-white" data-aos="fade-up">
  <div class="container">
    <div class="row align-items-center">
      <!-- Gambar di kiri -->
      <div class="col-md-6 mb-4 mb-md-0" data-aos="fade-right">
        <img src="landing/img/about.png" alt="Ilustrasi Depresi" class="img-fluid rounded shadow">
      </div>

      <!-- Teks di kanan -->
      <div class="col-md-6" data-aos="fade-left">
        <h2 class="mb-4 fw-semibold text-center text-md-start">Tentang MentalCare</h2>
        <p class="lead text-center text-md-start">
          MentalCare adalah sebuah <strong>sistem pakar</strong> yang membantu mahasiswa dalam melakukan
          <strong>skrining awal tingkat depresi</strong> secara mandiri. Sistem ini menggunakan metode <strong>Forward
            Chaining</strong>
          untuk menganalisis gejala yang dialami pengguna dan memberikan hasil berupa indikasi tingkat depresi
          berdasarkan pengetahuan pakar.
        </p>
        <p class="lead text-center text-md-start">
          Tampilan yang sederhana dan mudah digunakan memungkinkan pengguna untuk mengakses layanan ini dengan nyaman.
          Hasil yang ditampilkan bersifat awal dan tidak menggantikan diagnosis dari tenaga profesional.
        </p>
      </div>
    </div>
  </div>
</section>


    <!-- FAQ -->
    <section id="faq" class="section bg-light">
      <div class="container">
        <h2 class="text-center mb-5" data-aos="fade-up">Pertanyaan yang Sering Diajukan - FAQ</h2>
<div class="accordion" id="faqAccordion">
    <div class="card mb-3" data-aos="fade-up">
        <div class="card-header" id="faq1">
            <h2 class="mb-0">
                <button class="btn btn-link text-left w-100" type="button" data-toggle="collapse"
                    data-target="#collapse1" aria-expanded="true" aria-controls="collapse1">
                    Apa itu MentalCare?
                </button>
            </h2>
        </div>
        <div id="collapse1" class="collapse show" aria-labelledby="faq1" data-parent="#faqAccordion">
            <div class="card-body">
                MentalCare adalah platform berbasis web untuk membantu mahasiswa mengenali tingkat depresi secara
                mandiri melalui analisis gejala menggunakan metode Forward Chaining.
            </div>
        </div>
    </div>

    <div class="card mb-3" data-aos="fade-up" data-aos-delay="100">
        <div class="card-header" id="faq2">
            <h2 class="mb-0">
                <button class="btn btn-link text-left w-100 collapsed" type="button" data-toggle="collapse"
                    data-target="#collapse2" aria-expanded="false" aria-controls="collapse2">
                    Apakah hasil diagnosa dari MentalCare akurat?
                </button>
            </h2>
        </div>
        <div id="collapse2" class="collapse" aria-labelledby="faq2" data-parent="#faqAccordion">
            <div class="card-body">
Hasil yang diberikan bersifat skrining awal berdasarkan pengetahuan pakar menggunakan metode Forward Chaining.
Meski hasilnya membantu memberi gambaran umum, diagnosis akhir tetap perlu dikonsultasikan ke tenaga profesional.
            </div>
        </div>
    </div>

    <div class="card mb-3" data-aos="fade-up" data-aos-delay="200">
        <div class="card-header" id="faq3">
            <h2 class="mb-0">
                <button class="btn btn-link text-left w-100 collapsed" type="button" data-toggle="collapse"
                    data-target="#collapse3" aria-expanded="false" aria-controls="collapse3">
                    Apakah saya perlu login untuk melakukan diagnosa?
                </button>
            </h2>
        </div>
        <div id="collapse3" class="collapse" aria-labelledby="faq3" data-parent="#faqAccordion">
            <div class="card-body">
                Ya. Login diperlukan agar hasil diagnosa kamu dapat disimpan, diakses kembali, dan dijaga
                kerahasiaannya.
            </div>
        </div>
    </div>

    <div class="card mb-3" data-aos="fade-up" data-aos-delay="300">
        <div class="card-header" id="faq4">
            <h2 class="mb-0">
                <button class="btn btn-link text-left w-100 collapsed" type="button" data-toggle="collapse"
                    data-target="#collapse4" aria-expanded="false" aria-controls="collapse4">
                    Apakah data saya aman?
                </button>
            </h2>
        </div>
        <div id="collapse4" class="collapse" aria-labelledby="faq4" data-parent="#faqAccordion">
            <div class="card-body">
                Tentu. Data kamu disimpan secara aman dan tidak akan dibagikan kepada pihak ketiga tanpa izin.
            </div>
        </div>
    </div>

    <div class="card mb-3" data-aos="fade-up" data-aos-delay="400">
        <div class="card-header" id="faq5">
            <h2 class="mb-0">
                <button class="btn btn-link text-left w-100 collapsed" type="button" data-toggle="collapse"
                    data-target="#collapse5" aria-expanded="false" aria-controls="collapse5">
                    Apakah MentalCare gratis?
                </button>
            </h2>
        </div>
        <div id="collapse5" class="collapse" aria-labelledby="faq5" data-parent="#faqAccordion">
            <div class="card-body">
                Ya. MentalCare dapat digunakan secara gratis oleh seluruh mahasiswa untuk mendeteksi kondisi mental
                secara awal.
            </div>
        </div>
    </div>
</div>
      </div>
    </section>
  </main>

  <!-- FOOTER -->
  <footer class="bg-white py-4 text-center border-top">
    <div class="container">
      <p class="mb-2">&copy; 2025 MentalCare. All rights reserved.</p>

      </div>
    </div>
  </footer>

  <!-- Scripts -->
  <script src="landing/js/jquery.js"></script>
  <script src="landing/js/bootstrap.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.js"></script>
  <script>
    AOS.init();
  </script>
</body>

</html>

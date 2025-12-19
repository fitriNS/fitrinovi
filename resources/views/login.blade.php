<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Login & Register</title>
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato:400,700">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

  <style>
    body {
      background-image: url('landing/img/full-1.jpg');
      background-size: cover;
      background-position: center;
      font-family: 'Lato', sans-serif;
    }

    .login-card {
      background-color: rgba(255, 255, 255, 0.9);
      border-radius: 20px;
      box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
      padding: 30px;
      max-width: 400px;
      margin: 100px auto;
    }

    .form-control {
      border-radius: 20px;
      background-color: rgba(0, 0, 0, 0.05);
      border: none;
    }

    .form-control:focus {
      box-shadow: none;
      border-color: #ddd;
    }

    .btn {
      border-radius: 20px;
      background-color: #3498db;
      color: white;
      font-size: 18px;
      padding: 12px 30px;
      border: none;
    }

    .btn:hover {
      background-color: #2980b9;
    }
  </style>
</head>

<body>

  <div class="login-card animate__animated animate__fadeInDown">
    <div class="text-center mb-4">
      <img src="{{ asset('landing/img/mental.png') }}" alt="Logo">
    </div>

    {{-- TOMBOL LOGOUT --}}
    @auth
    <div class="text-center mb-3">
      <form action="{{ route('logout') }}" method="POST">
      @csrf
      <button type="submit" class="btn btn-danger btn-block">Logout</button>
      </form>
      <div class="alert alert-success mt-3">
      Kamu sudah login sebagai <strong>{{ Auth::user()->name }}</strong>
      </div>
    </div>
  @endauth

    {{-- FORM LOGIN hanya tampil jika belum login --}}
    @guest
    <h1 class="text-center mb-3" style="font-size: 1.5rem; font-weight: bold;">Login</h1>

    <form method="POST" action="{{ route('login') }}">
      @csrf

      <div class="form-group">
      <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email"
        value="{{ old('email') }}" required autofocus placeholder="Email">
      @error('email')
      <span class="invalid-feedback d-block" role="alert"><strong>{{ $message }}</strong></span>
    @enderror
      </div>

      <div class="form-group">
      <input id="password" type="password" class="form-control @error('password') is-invalid @enderror"
        name="password" required placeholder="Password">
      @error('password')
      <span class="invalid-feedback d-block" role="alert"><strong>{{ $message }}</strong></span>
    @enderror
      </div>

      <div class="form-check mb-3">
      <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
      <label class="form-check-label" for="remember">Remember Me</label>
      </div>

      <button type="submit" class="btn btn-primary btn-block">Login</button>

      @if (session('success'))
      <div class="alert alert-success text-center mt-3">
      {{ session('success') }}
      </div>
    @endif

      <p class="text-center mt-3">
      Belum punya akun? <a href="#" data-toggle="modal" data-target="#registerModal">Daftar di sini</a>
      </p>
    </form>
  @endguest
  </div>

<!-- Modal Register -->
<div class="modal fade" id="registerModal" tabindex="-1" role="dialog" aria-labelledby="registerModalLabel"
  aria-hidden="true">
  <div class="modal-dialog" role="document">
    <form method="POST" action="{{ route('register') }}">
      @csrf
      <div class="modal-content" style="border-radius: 20px;">
        <div class="modal-header border-0">
          <h5 class="modal-title" id="registerModalLabel" style="font-weight: bold;">Registrasi Akun</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Tutup">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body" style="padding: 2rem;">

          <div class="form-group">
            <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" id="reg_name"
              placeholder="Nama Lengkap" value="{{ old('name') }}" required>
            @error('name')
        <span class="invalid-feedback d-block" role="alert"><strong>{{ $message }}</strong></span>
      @enderror
          </div>

          <div class="form-group">
            <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" id="reg_email"
              placeholder="Email" value="{{ old('email') }}" required>
            @error('email')
        <span class="invalid-feedback d-block" role="alert"><strong>{{ $message }}</strong></span>
      @enderror
          </div>

          <div class="form-group">
            <input type="password" class="form-control @error('password') is-invalid @enderror" name="password"
              id="reg_password" placeholder="Password" required>
            @error('password')
        <span class="invalid-feedback d-block" role="alert"><strong>{{ $message }}</strong></span>
      @enderror
          </div>

          <div class="form-group">
            <input type="password" class="form-control" name="password_confirmation" id="reg_password_confirmation"
              placeholder="Konfirmasi Password" required>
          </div>

        </div>
        <div class="modal-footer border-0">
          <button type="submit" class="btn btn-primary btn-block" style="border-radius: 20px;">Daftar</button>
        </div>
      </div>
    </form>
  </div>
</div>


  <!-- Scripts -->
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

  <!-- Auto open modal if there are register errors -->
  @if ($errors->has('name') || $errors->has('email') || $errors->has('password'))
    <script>
    $(document).ready(function () {
      $('#registerModal').modal('show');
    });
    </script>
  @endif

</body>

</html>
<!-- ======= Header ======= -->
<header class="bg-white border-bottom shadow-sm fixed-top w-100" style="z-index: 1030;">
  <div class="container-fluid d-flex justify-content-between align-items-center py-2 px-4">

    <!-- Logo + Title -->
    <a href="{{ route('admin.dashboard') }}" class="d-flex align-items-center text-decoration-none">
      <img src="{{ asset('assets/img/logo.png') }}" alt="Logo" style="height: 38px;">
      <h5 class="ms-2 mb-0 fw-bold text-primary">MentalCare Admin</h5>
    </a>

    <!-- Hi Admin Text -->
    <div class="d-flex align-items-center text-dark">
      <img
        src="https://ui-avatars.com/api/?name={{ urlencode(auth()->user()->name ?? 'Admin') }}&background=6f42c1&color=fff&rounded=true"
        alt="Avatar" class="rounded-circle me-2" width="36" height="36">
      <span class="fw-semibold">Hi, {{ auth()->user()->name ?? 'Admin' }}!</span>
    </div>

  </div>
</header>
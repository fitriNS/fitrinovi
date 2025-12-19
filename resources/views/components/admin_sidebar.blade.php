<!-- ======= Sidebar ======= -->
<aside id="sidebar" class="sidebar bg-white shadow-md"
  style="width: 230px; position: fixed; height: 100vh; overflow-y: auto; z-index: 1000; font-size: 14px;">

  <ul class="sidebar-nav pt-3 px-2" id="sidebar-nav">

    <li class="nav-item">
      <a class="nav-link" href="{{ route('admin.dashboard') }}">
        <i class="bi bi-grid"></i>
        <span>Dashboard</span>
      </a>
    </li>

    <!-- Heading: Pengetahuan -->
    <li class="nav-heading">Pengetahuan</li>

    <li class="nav-item">
      <a class="nav-link collapsed" href="{{ route('cl.form') }}">
        <i class="bi bi-clipboard-check"></i>
        <span>Diagnosa</span>
      </a>
    </li>

    <li class="nav-item">
      <a class="nav-link collapsed" href="{{ route('gejala.index') }}">
        <i class="bi bi-activity"></i>
        <span>Gejala</span>
      </a>
    </li>

    <li class="nav-item">
      <a class="nav-link collapsed" href="{{ route('depresi.index') }}">
        <i class="bi bi-patch-question"></i>
        <span>Depresi</span>
      </a>
    </li>

    <li class="nav-item">
      <a class="nav-link collapsed" href="{{ route('spk.index') }}">
        <i class="bi bi-clipboard2-data"></i>
        <span>Hasil Diagnosa</span>
      </a>
    </li>

    <li class="nav-item">
      <a class="nav-link collapsed" href="{{ route('rules.index') }}">
        <i class="bi bi-sliders"></i>
        <span>Rules</span>
      </a>
    </li>

    <!-- Heading: Pengaturan -->
    <li class="nav-heading">Pengaturan</li>

    <!-- Langsung: Daftar Admin -->
    <li class="nav-item">
      <a class="nav-link collapsed" href="{{ route('admin.list') }}">
        <i class="bi bi-person"></i>
        <span>Daftar User</span>
      </a>
    </li>
<!-- Kelola User -->
<li class="nav-item">
  <a class="nav-link collapsed" href="{{ route('user.index') }}">
    <i class="bi bi-people-fill"></i>
    <span>Kelola User</span>
  </a>
</li>
    <!-- Logout -->
    <li class="nav-item">
      <a class="nav-link collapsed text-danger" href="{{ route('logout') }}"
        onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
        <i class="bi bi-box-arrow-right"></i> <span>Logout</span>
      </a>
      <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
        @csrf
      </form>
    </li>

  </ul>

</aside><!-- End Sidebar -->
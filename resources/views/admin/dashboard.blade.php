@extends('admin.admin_main')
@section('title', 'Dashboard')

@section('admin_content')
  <main id="main" class="main">
    <div class="pagetitle">
    <h1><i class="bi bi-speedometer2 me-2"></i> Dashboard</h1>
    <nav>
      <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="/dashboard">Home</a></li>
      <li class="breadcrumb-item active">Dashboard</li>
      </ol>
    </nav>
    </div>

    <section class="section dashboard">
    <div class="row">

      <!-- Statistik Cards -->
      <div class="col-md-4 mb-4">
      <div class="card bg-primary text-white shadow h-100">
        <div class="card-body d-flex align-items-center">
        <i class="bi bi-activity display-5 me-3"></i>
        <div>
          <h5 class="card-title mb-1">Total Gejala</h5>
          <h3 class="fw-bold">{{ $gejala->count() }}</h3>
          <span class="badge bg-light text-dark">{{ $gejala->count() }} gejala</span>
        </div>
        </div>
      </div>
      </div>

      <div class="col-md-4 mb-4">
      <div class="card bg-success text-white shadow h-100">
        <div class="card-body d-flex align-items-center">
        <i class="bi bi-emoji-frown display-5 me-3"></i>
        <div>
          <h5 class="card-title mb-1">Tingkat Depresi</h5>
          <h3 class="fw-bold">{{ $tingkat_depresi->count() }}</h3>
          <span class="badge bg-light text-dark">{{ $tingkat_depresi->count() }} tingkat</span>
        </div>
        </div>
      </div>
      </div>

      <div class="col-md-4 mb-4">
      <div class="card bg-danger text-white shadow h-100">
        <div class="card-body d-flex align-items-center">
        <i class="bi bi-people display-5 me-3"></i>
        <div>
          <h5 class="card-title mb-1">Jumlah Users</h5>
          <h3 class="fw-bold">{{ $user->count() }}</h3>
          <span class="badge bg-light text-dark">{{ $user->count() }} Users</span>
        </div>
        </div>
      </div>
      </div>

      <!-- Tabel Gejala -->
      <div class="col-lg-6 mb-4">
      <div class="card shadow">
        <div class="card-header bg-secondary text-white fw-semibold">
        <i class="bi bi-list-ul me-1"></i> Data Gejala
        </div>
        <div class="card-body">
        <table id="table-gejala" class="table table-bordered table-striped">
          <thead class="table-light">
          <tr>
            <th>No</th>
            <th>Kode Gejala</th>
            <th>Gejala</th>
          </tr>
          </thead>
          <tbody>
          @foreach ($gejala as $item)
        <tr>
        <td>{{ $loop->iteration }}</td>
        <td><span class="badge bg-info text-dark">{{ $item->kode_gejala }}</span></td>
        <td>{{ $item->gejala }}</td>
        </tr>
      @endforeach
          </tbody>
        </table>
        </div>
      </div>
      </div>

      <!-- Tabel Depresi -->
      <div class="col-lg-6 mb-4">
      <div class="card shadow">
        <div class="card-header bg-secondary text-white fw-semibold">
        <i class="bi bi-bar-chart-line me-1"></i> Data Tingkat Depresi
        </div>
        <div class="card-body">
        <table id="table-depresi" class="table table-bordered table-striped">
          <thead class="table-light">
          <tr>
            <th>No</th>
            <th>Kode Depresi</th>
            <th>Tingkat Depresi</th>
          </tr>
          </thead>
          <tbody>
          @foreach ($tingkat_depresi as $item)
        <tr>
        <td>{{ $loop->iteration }}</td>
        <td><span class="badge bg-warning text-dark">{{ $item->kode_depresi }}</span></td>
        <td>{{ $item->depresi }}</td>
        </tr>
      @endforeach
          </tbody>
        </table>
        </div>
      </div>
      </div>

      <!-- Tabel Rules -->
      <div class="col-lg-12 mb-4">
      <div class="card shadow">
        <div class="card-header bg-secondary text-white fw-semibold">
        <i class="bi bi-diagram-3 me-1"></i> Data Rules
        </div>
        <div class="card-body">
        <table id="table-rules" class="table table-bordered table-striped">
          <thead class="table-light">
          <tr>
            <th>No</th>
            <th>Kode Depresi</th>
            <th>Tingkat Depresi</th>
            <th>Rentang Nilai</th>
          </tr>
          </thead>
          <tbody>
          @foreach ($rules as $rule)
        <tr>
        <td>{{ $loop->iteration }}</td>
        <td><span class="badge bg-info text-dark">{{ $rule->kode_depresi }}</span></td>
        <td>{{ $rule->tingkat_depresi->depresi ?? '-' }}</td>
        <td>{{ $rule->min }} - {{ $rule->max }}</td>
        </tr>
      @endforeach
          </tbody>
        </table>
        </div>
      </div>
      </div>

    </div>
    </section>
  </main>

  <!-- Scripts -->
  <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css">
  <script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>

  <script>
    $(document).ready(function () {
    $('#table-gejala, #table-depresi, #table-rules').DataTable({
      searching: false,
      responsive: true,
      language: {
      lengthMenu: "Tampilkan _MENU_ data",
      zeroRecords: "Tidak ditemukan data",
      info: "Menampilkan _START_ - _END_ dari _TOTAL_ data",
      infoEmpty: "Tidak ada data",
      paginate: {
        previous: "Sebelumnya",
        next: "Berikutnya"
      }
      }
    });
    });
  </script>
@endsection
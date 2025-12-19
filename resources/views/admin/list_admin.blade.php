@extends('admin.admin_main')
@section('title', 'Dashboard')

{{-- isi --}}
@section('admin_content')
  <main id="main" class="main">
    <div class="pagetitle">
    <h1>Dashboard</h1>
    <nav>
      <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="/dashboard">Admin</a></li>
      <li class="breadcrumb-item active">Daftar Pengguna</li>
      </ol>
    </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard">
    <div class="row">
      <div class="col-lg-10 mx-auto">

      {{-- Tabel Admin --}}
      <div class="card mb-4">
        <div class="card-body">
        <h5 class="card-title">Daftar Admin</h5>
        <table class="table table-bordered table-hover">
          <thead class="table-light">
          <tr>
            <th>No</th>
            <th>Nama</th>
            <th>Email</th>
          </tr>
          </thead>
          <tbody>
          @foreach ($user->where('role', 'admin') as $index => $u)
        <tr>
        <td>{{ $index + 1 }}</td>
        <td>{{ $u->name }}</td>
        <td>{{ $u->email }}</td>
        </tr>
      @endforeach
          </tbody>
        </table>
        </div>
      </div>

      {{-- Tabel Pengguna Non-Admin --}}
      <div class="card">
        <div class="card-body">
        <h5 class="card-title">Daftar User</h5>
        <table class="table table-bordered table-hover">
          <thead class="table-light">
          <tr>
            <th>No</th>
            <th>Nama</th>
            <th>Email</th>
            <th>Role</th>
          </tr>
          </thead>
          <tbody>
          @foreach ($user->where('role', '!=', 'admin') as $index => $u)
        <tr>
        <td>{{ $index + 1 }}</td>
        <td>{{ $u->name }}</td>
        <td>{{ $u->email }}</td>
        <td>{{ $u->role }}</td>
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
@endsection
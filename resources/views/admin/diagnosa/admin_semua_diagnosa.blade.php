@extends('admin.admin_main')
@section('title', 'Data Diagnosa')

@section('admin_content')
    <main id="main" class="main">
        <div class="pagetitle">
            <h1>Dashboard</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/dashboard">Admin</a></li>
                    <li class="breadcrumb-item active">Data Diagnosa Mahasiswa</li>
                </ol>
            </nav>
        </div>

        <section class="section dashboard">
            <div class="row">
                <div class="col-lg-12">

                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Riwayat Diagnosa Mahasiswa</h5>

                            <table class="table table-bordered table-hover mt-3">
                                <thead class="table-light text-center">
                                    <tr>
                                        <th>No</th>
                                        <th>Nama User</th>
                                        <th>Kode Depresi</th>
                                        <th>Tingkat Depresi</th>
                                        <th>Total Nilai</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($diagnosa as $item)
                                        @php
                                            $totalNilai = $item->total_skor;

                                            $rule = \App\Models\Rules::where('min', '<=', $totalNilai)
                                                ->where('max', '>=', $totalNilai)
                                                ->first();

                                            $kodeDepresi = $rule->kode_depresi ?? '-';
                                            $tingkatDepresi = \App\Models\TingkatDepresi::where('kode_depresi', $kodeDepresi)->first();
                                        @endphp
                                        <tr>
                                            <td class="text-center">{{ $loop->iteration }}</td>
                                            <td>{{ $item->user->name ?? '-' }}</td>
                                            <td class="text-center">{{ $kodeDepresi }}</td>
                                            <td>{{ $tingkatDepresi->depresi ?? 'Tidak Diketahui' }}</td>
                                            <td class="text-center">{{ $totalNilai }}</td>
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
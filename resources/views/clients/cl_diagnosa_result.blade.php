@extends('clients.cl_main')
@section('title', 'Hasil Diagnosa')

@section('cl_content')
    <div class="bg-gradient-to-b from-indigo-50 to-indigo-100 min-h-screen py-12 px-4 font-sans">
        <div class="max-w-4xl mx-auto animate__animated animate__fadeInUp animate__faster">
            <div class="bg-white shadow-xl rounded-3xl p-10 border border-slate-200">

                <!-- Judul -->
                <h1 class="text-3xl md:text-4xl font-bold text-indigo-700 mb-6 animate__animated animate__fadeInDown">
                    📊 Hasil Diagnosa Anda
                </h1>

                <!-- Step Progress -->
                <div class="flex justify-between items-center mb-8 text-sm font-semibold text-slate-500">
                    <div class="w-1/3 text-center">1. Informasi</div>
                    <div class="w-1/3 text-center">2. Pertanyaan</div>
                    <div class="w-1/3 text-center text-indigo-600 border-b-4 border-indigo-500 pb-1">3. Hasil</div>
                </div>

                <!-- Rentang Nilai -->
                <section class="mb-8">
                    <h2 class="text-lg font-semibold text-slate-800 mb-2">Rentang Nilai Tingkat Depresi</h2>
                    <ul class="list-disc list-inside text-sm text-slate-600 space-y-1">
                        <li><strong>20 – 39</strong>: Depresi Ringan</li>
                        <li><strong>40 – 69</strong>: Depresi Sedang</li>
                        <li><strong>70 – 100</strong>: Depresi Berat</li>
                    </ul>
                </section>

                <!-- Data Pengguna -->
                <section class="mb-8">
                    <h2 class="text-lg font-semibold text-slate-800 mb-2">Data Pengguna</h2>
                    <div class="bg-indigo-50 border border-indigo-100 rounded-lg p-4 text-sm text-slate-700 space-y-1">
                        <p><strong>Nama:</strong> {{ $diagnosa->user->name ?? '-' }}</p>
                        <p><strong>Email:</strong> {{ $diagnosa->user->email ?? '-' }}</p>
                        <p><strong>Tanggal Diagnosa:</strong> {{ $diagnosa->created_at->format('d M Y, H:i') }}</p>
                    </div>
                </section>

                @php
                    $hasil = json_decode($diagnosa->data_diagnosa, true);
                    $rekomendasi = null;
                    if (isset($hasil['kode_depresi'])) {
                        $depresi = \App\Models\TingkatDepresi::where('kode_depresi', $hasil['kode_depresi'])->first();
                        $rekomendasi = $depresi->rekomendasi ?? null;
                    }
                @endphp

                <!-- Hasil Diagnosa -->
                <section class="mb-8">
                    <h2 class="text-lg font-semibold text-slate-800 mb-2">Hasil Diagnosa</h2>
                    <div class="overflow-x-auto">
                        <table class="w-full text-sm text-slate-700 border border-slate-200 rounded-lg overflow-hidden">
                            <thead class="bg-indigo-100 text-indigo-700">
                                <tr>
                                    <th class="px-4 py-3 text-left">Kode Depresi</th>
                                    <th class="px-4 py-3 text-left">Tingkat</th>
                                    <th class="px-4 py-3 text-left">Nilai</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white">
                                <tr class="border-t border-slate-200">
                                    <td class="px-4 py-3">{{ $hasil['kode_depresi'] ?? '-' }}</td>
                                    <td class="px-4 py-3">{{ $hasil['tingkat'] ?? 'Tidak Diketahui' }}</td>
                                    <td class="px-4 py-3">{{ $hasil['nilai'] ?? '-' }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </section>

                <!-- Rekomendasi -->
                @if ($rekomendasi)
                    <section class="mb-8">
                        <h2 class="text-lg font-semibold text-slate-800 mb-2">Rekomendasi</h2>
                        <div class="bg-green-50 border border-green-100 rounded-lg p-4 text-sm text-green-800">
                            {{ $rekomendasi }}
                        </div>
                    </section>
                @endif

                <!-- Tombol Aksi -->
                <div class="flex flex-col md:flex-row justify-between items-center mt-10 gap-4">
                    <a href="{{ route('diagnosa.cetak', $diagnosa->id) }}"
                        class="bg-green-500 hover:bg-green-600 text-white px-6 py-3 rounded-lg font-semibold shadow transition">
                        📄 Download Hasil PDF
                    </a>
                    <a href="{{ url('/') }}"
                        class="bg-indigo-600 hover:bg-indigo-700 text-white px-6 py-3 rounded-lg font-semibold shadow transition">
                        🔙 Kembali ke Beranda
                    </a>
                </div>

            </div>
        </div>
    </div>
@endsection
@extends('clients.cl_main')
@section('title', 'Form Diagnosa')

@section('cl_content')
  <div class="bg-gradient-to-b from-blue-50 to-blue-100 py-12 px-4 min-h-screen font-sans">
    <div class="max-w-5xl mx-auto animate__animated animate__fadeInUp animate__faster">
      <div class="bg-white shadow-xl rounded-3xl p-10 border border-slate-200">

        <!-- Judul -->
        <h1 class="text-2xl md:text-3xl font-bold text-blue-800 mb-6 text-center">
          📝 Form Diagnosa Tingkat Depresi
        </h1>

        <!-- Penjelasan -->
        <p class="text-center text-sm text-gray-600 mb-8">
          Jawablah pertanyaan berikut sesuai kondisi yang Anda alami belakangan ini.
        </p>

        <!-- Form Diagnosa -->
        <form action="{{ route('spk.store') }}" method="POST">
          @csrf
          <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200 text-sm">
              <thead class="bg-blue-100 text-blue-800 font-semibold text-center">
                <tr>
                  <th class="px-4 py-3">No</th>
                  <th class="px-4 py-3 text-left">Pertanyaan</th>
                  <th class="px-4 py-3 text-center">Pilihan Jawaban</th>
                </tr>
              </thead>
              <tbody class="bg-white divide-y divide-gray-100">
                @foreach ($gejala as $item)
                  <tr>
                    <td class="px-4 py-3 text-center">{{ $loop->iteration }}</td>
                    <td class="px-4 py-3">
                      <p class="mb-0">Apakah Anda merasa <strong>{{ $item->gejala }}</strong>?</p>
                    </td>
                    <td class="px-4 py-3">
                      <div class="flex flex-wrap gap-3 justify-center md:justify-start">
                        @foreach ($kondisi_user as $kondisi)
                          <label class="flex items-center space-x-2">
                            <input type="radio" name="kondisi[{{ $item->kode_gejala }}]"
                              id="kondisi_{{ $item->kode_gejala }}_{{ $kondisi->nilai }}"
                              value="{{ $kondisi->nilai }}"
                              class="text-blue-700 focus:ring-blue-600 border-gray-300 rounded" required>
                            <span>{{ $kondisi->kondisi }}</span>
                          </label>
                        @endforeach
                      </div>
                    </td>
                  </tr>
                @endforeach
              </tbody>
            </table>
          </div>

          <!-- Tombol Kirim -->
          <div class="text-center mt-10">
            <button type="submit"
              class="bg-cyan-400 hover:bg-white hover:text-blue-900 border-2 border-white text-white px-6 py-3 rounded-full font-semibold shadow transition duration-300">
              Kirim Jawaban
            </button>
          </div>
        </form>
      </div>
    </div>
  </div>
@endsection

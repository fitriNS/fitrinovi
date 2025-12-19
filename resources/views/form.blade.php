@extends('clients.cl_main')
@section('title', 'Form Diagnosa')

@section('cl_content')
	<div class="bg-gradient-to-b from-indigo-50 to-indigo-100 min-h-screen py-12 px-4 font-sans">
		<div class="max-w-4xl mx-auto animate__animated animate__fadeInUp animate__faster">
			<div class="bg-white shadow-xl rounded-3xl p-10 border border-slate-200">

				<!-- Judul -->
				<h1 class="text-3xl md:text-4xl font-bold text-indigo-700 mb-6 animate__animated animate__fadeInDown">
					🧠 Diagnosa Depresi Mahasiswa
				</h1>
				<p class="text-slate-600 text-sm mb-8">
					<strong>Dalam 2 minggu terakhir</strong>, seberapa sering kamu mengalami hal-hal berikut? Jawab sesuai
					pengalamanmu.
				</p>

				<!-- Step Progress -->
				<div class="flex justify-between items-center mb-8 text-sm font-semibold text-indigo-600">
					<div class="w-1/3 text-center">1. Informasi</div>
					<div class="w-1/3 text-center border-b-4 border-indigo-500 pb-1">2. Pertanyaan</div>
					<div class="w-1/3 text-center text-slate-400">3. Hasil</div>
				</div>

				<!-- FORM -->
				<form method="POST" action="{{ route('spk.store') }}" class="space-y-6">
					@csrf
					@foreach($gejala as $item)
						<div class="bg-slate-50 border border-slate-200 rounded-xl p-6 shadow-sm hover:shadow-md transition">
							<label class="block text-sm font-medium text-slate-700 mb-2">
								{{ $loop->iteration }}. Apakah Anda merasa {{ strtolower($item->gejala) }}?
								<span class="text-red-500">*</span>
							</label>
							<div class="flex flex-col gap-2">
								@foreach($kondisi_user as $kondisi)
									<label class="inline-flex items-center text-slate-700 text-sm">
										<input type="radio" name="input_{{ $loop->parent->iteration }}"
											value="{{ $kondisi->nilai }}"
											onchange="document.getElementById('kondisi_{{ $item->kode_gejala }}{{ $loop->parent->iteration }}').value = this.value"
											class="accent-indigo-600 focus:ring-indigo-500 transition duration-150" required>
										<span class="ml-2">{{ $kondisi->kondisi }}</span>
									</label>
								@endforeach
							</div>
							<input type="hidden" name="kondisi[{{ $item->kode_gejala }}]"
								id="kondisi_{{ $item->kode_gejala }}{{ $loop->iteration }}" value="">
						</div>
					@endforeach

					<!-- Tombol -->
					<div class="flex justify-between items-center pt-6 border-t border-slate-200">
						<a href="/" class="text-slate-500 hover:text-slate-700 text-sm transition duration-150">
							❌ Batal
						</a>
						<button type="submit"
							class="bg-indigo-600 hover:bg-indigo-700 text-white px-6 py-2 rounded-lg transition font-semibold">
							✅ Diagnosa Sekarang
						</button>
					</div>
				</form>

			</div>
		</div>
	</div>
@endsection
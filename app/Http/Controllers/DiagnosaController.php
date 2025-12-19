<?php

namespace App\Http\Controllers;

use App\Models\Diagnosa;
use App\Http\Requests\StoreDiagnosaRequest;
use App\Http\Requests\UpdateDiagnosaRequest;
use App\Models\Artikel;
use App\Models\Gejala;
use App\Models\Rules;
use App\Models\KondisiUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use PDF; 
use App\Models\TingkatDepresi;
use Illuminate\Support\Facades\Auth;

class DiagnosaController extends Controller
{
   
    public function index()
    {
        $diagnosa = Diagnosa::all();
        return view('admin.diagnosa.admin_semua_diagnosa', ["diagnosa" => $diagnosa]);
    }

    public function create()
    {
        $data = [
            'gejala' => Gejala::all(),
            'kondisi_user' => KondisiUser::all()
        ];
        return view('clients.form_diagnosa', $data);
    }

    public function store(StoreDiagnosaRequest $request)
    {
        $filteredArray = $request->post('kondisi');
        $kondisi = array_filter($filteredArray, function ($value) {
            return $value !== null && $value !== "#"; 
        });

        $kodeGejala = [];
        foreach ($kondisi as $key => $val) {
            $kodeGejala[] = [$key, $val];
        }

        $diagnosa = Diagnosa::create([
            'user_id' => Auth::id(),
            'kondisi' => json_encode($kodeGejala),
            'data_diagnosa' => json_encode([])
        ]);

        return redirect()->route('spk.result', ["id" => $diagnosa->id]);
    }

public function diagnosaResult($id)
{
    $diagnosa = Diagnosa::findOrFail($id);
    $gejala = json_decode($diagnosa->kondisi, true);
    $totalNilai = array_sum(array_column($gejala, 1));

    $rule = Rules::where('min', '<=', $totalNilai)
        ->where('max', '>=', $totalNilai)
        ->first();

    $kodeDepresi = '-';
    $tingkat = 'Tidak Diketahui';
    $rekomendasi = null;

    if ($rule) {
        $kodeDepresi = $rule->kode_depresi;
        $tingkatDepresi = \App\Models\TingkatDepresi::where('kode_depresi', $kodeDepresi)->first();
        $tingkat = $tingkatDepresi->depresi ?? 'Tidak Diketahui';
        $rekomendasi = $tingkatDepresi->rekomendasi ?? null;
    }

    // Simpan hasil diagnosa
    $diagnosa->data_diagnosa = json_encode([
        'kode_depresi' => $kodeDepresi,
        'tingkat' => $tingkat,
        'nilai' => $totalNilai,
         'rekomendasi' => $rekomendasi
    ]);
    $diagnosa->save();

    return view('clients.cl_diagnosa_result', [
        'diagnosa' => $diagnosa,
        'gejala' => $gejala,
        
    ]);
}


    public function show(Diagnosa $diagnosa)
    {
        return view('admin.diagnosa.show', compact('diagnosa'));
    }

    public function edit(Diagnosa $diagnosa)
    {
        return view('admin.diagnosa.edit', compact('diagnosa'));
    }

    public function update(UpdateDiagnosaRequest $request, Diagnosa $diagnosa)
    {
        $diagnosa->update($request->validated());
        return redirect()->route('diagnosa.index')->with('success', 'Data diagnosa berhasil diperbarui');
    }

    public function destroy(Diagnosa $diagnosa)
    {
        $diagnosa->delete();
        return redirect()->route('diagnosa.index')->with('success', 'Data diagnosa berhasil dihapus');
    }
  
public function cetakPDF($id)
{
    $diagnosa = Diagnosa::findOrFail($id);
    $gejala = json_decode($diagnosa->kondisi, true);
    $totalNilai = array_sum(array_column($gejala, 1));

    $rule = \App\Models\Rules::where('min', '<=', $totalNilai)
        ->where('max', '>=', $totalNilai)
        ->first();

    $kodeDepresi = $rule?->kode_depresi ?? '-';
    $tingkatDepresi = \App\Models\TingkatDepresi::where('kode_depresi', $kodeDepresi)->first();

    $pdf = PDF::loadView('clients.cl_diagnosa_pdf', [
        'diagnosa' => $diagnosa,
        'gejala' => $gejala,
        'totalNilai' => $totalNilai,
        'kodeDepresi' => $kodeDepresi,
        'tingkatDepresi' => $tingkatDepresi?->depresi ?? 'Tidak Diketahui',
        'rekomendasi' => $tingkatDepresi?->rekomendasi ?? null,
    ]);

    return $pdf->download('hasil_diagnosa.pdf');
}

}

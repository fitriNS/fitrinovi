<?php

namespace App\Http\Controllers;

use App\Models\Rules;
use Illuminate\Http\Request;

class RulesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Load relasi 'tingkat_depresi' agar bisa ditampilkan di Blade
        $rules = Rules::with('tingkat_depresi')->paginate(15);
        return view('admin.rules.rules', compact('rules'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Tidak digunakan karena menggunakan modal
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $valid = $request->validate([
            'kode_depresi' => 'required|string|max:10|unique:rules,kode_depresi',
            'min' => 'required|numeric|min:0',
            'max' => 'required|numeric|gte:min',
        ]);

        Rules::create($valid);

        return redirect()->route('rules.index')->with('pesan', '<div class="alert alert-success p-3 mt-3" role="alert">Rule berhasil ditambahkan.</div>');
    }

    /**
     * Display the specified resource.
     */
    public function show(Rules $rule)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Rules $rule)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Rules $rule)
    {
        $valid = $request->validate([
            'kode_depresi' => 'required|string|max:10',
            'min' => 'required|numeric|min:0',
            'max' => 'required|numeric|gte:min',
        ]);

        $rule->update($valid);

        return redirect()->route('rules.index')->with('pesan', '<div class="alert alert-info p-3 mt-3" role="alert">Rule berhasil diperbarui.</div>');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Rules $rule)
    {
        $rule->delete();

        return redirect()->route('rules.index')->with('pesan', '<div class="alert alert-danger p-3 mt-3" role="alert">Rule berhasil dihapus.</div>');
    }
}

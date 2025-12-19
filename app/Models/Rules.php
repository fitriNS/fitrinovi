<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rules extends Model
{
    use HasFactory;

    // Menentukan nama tabel (opsional jika nama class dan tabel tidak sama)
    protected $table = 'rules';

    // Izinkan hanya kolom ini untuk mass assignment
    protected $fillable = ['kode_depresi', 'min', 'max'];

    // Relasi ke model TingkatDepresi
public function tingkat_depresi()
{
    return $this->belongsTo(TingkatDepresi::class, 'kode_depresi', 'kode_depresi');
}

    // Method opsional untuk seed data awal
    public function fillTable()
    {
        return [
            [
                'kode_depresi' => 'D01',
                'min' => 20,
                'max' => 39,
            ],
            [
                'kode_depresi' => 'D02',
                'min' => 40,
                'max' => 69,
            ],
            [
                'kode_depresi' => 'D03',
                'min' => 70,
                'max' => 100,
            ],
        ];
    }
}

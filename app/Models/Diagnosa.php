<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Diagnosa extends Model
{
    use HasFactory;

    protected $table = 'diagnosa';

    // Gunakan guarded untuk mencegah mass assignment ke kolom tertentu
    protected $guarded = ['id'];

    /**
     * Relasi ke tabel users (satu diagnosa dimiliki oleh satu user)
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    /**
     * Menghitung total skor dari kolom data_diagnosa (format JSON)
     */
    public function getTotalSkorAttribute()
    {
        $data = json_decode($this->data_diagnosa, true);

        // Jika berhasil didekode dan berupa array, jumlahkan nilainya
        return is_array($data) ? array_sum($data) : 0;
    }

    /**
     * Mengubah data_diagnosa ke bentuk array [id_gejala => nilai]
     */
    public function getJawabanGejalaAttribute()
    {
        $data = json_decode($this->data_diagnosa, true);
        return is_array($data) ? $data : [];
    }
}

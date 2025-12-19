<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gejala extends Model
{
    use HasFactory;
    protected $table = 'gejala';
    protected $guard = ["id"];
    protected $fillable = ["kode_gejala", "gejala"];

    public function fillTable()
    {


        $gejala2 = [
            [
                "kode_gejala" => "G1",
                "gejala" => "Kesulitan Mengatur Waktu"
            ],
            [
                "kode_gejala" => "G2",
                "gejala" => "Merasa Cemas Berlebihan"
            ],
            [
                "kode_gejala" => "G3",
                "gejala" => "Kesulitan Memahami Materi Kuliah "
            ],
            [
                "kode_gejala" => "G4",
                "gejala" => "Kesulitan Berkonsentrasi"
            ],
            [
                "kode_gejala" => "G5",
                "gejala" => "Merasa Kesepian"
            ],
            [
                "kode_gejala" => "G6",
                "gejala" => "Kehilangan Semangat Hidup dan Ingin Mengakhiri  Hidup"
            ],
            [
                "kode_gejala" => "G7",
                "gejala" => "Gangguan Emosional"
            ],
            [
                "kode_gejala" => "G8",
                "gejala" => "Pesimis"
            ],
            [
                "kode_gejala" => "G9",
                "gejala" => "Terisolasi"
            ],
            [
                "kode_gejala" => "G10",
                "gejala" => "Gangguan Pola Tidur"
            ],
            [
                "kode_gejala" => "G11",
                "gejala" => "Kesulitan Mengambil Keputusan"
            ],
            [
                "kode_gejala" => "G12",
                "gejala" => "Kesulitan Beradaptasi"
            ],
            [
                "kode_gejala" => "G13",
                "gejala" => "Tidak Percaya Diri"
            ],
            [
                "kode_gejala" => "G14",
                "gejala" => "Perasaan Bersalah Berlebihan"
            ],
            [
                "kode_gejala" => "G15",
                "gejala" => "Kecanduan Media Sosial"
            ],
            [
                "kode_gejala" => "G16",
                "gejala" => "Merasa Tidak Berguna"
            ],
            [
                "kode_gejala" => "G17",
                "gejala" => "Kehilangan Minat Pada Aktivitas"
            ],
            [
                "kode_gejala" => "G18",
                "gejala" => "Merasa Kehilangan Arah"
            ],
            [
                "kode_gejala" => "G19",
                "gejala" => "Merasa Lelah Melakukan Aktivitas Ringan"
            ],
            [
                "kode_gejala" => "G20",
                "gejala" => "Merasa Terabaikan"
            ],

        ];

        return $gejala2;
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TingkatDepresi extends Model
{
    use HasFactory;
    protected $table = 'tingkat_depresi';
    protected $guard = ["id"];
    protected $fillable = ['kode_depresi', 'depresi', 'rekomendasi'];

    public function fillTable()
    {
        $depresi = [
            [
                "kode_depresi" => "D01",
                "depresi" => "Depresi Ringan",
                 "rekomendasi" => "Anda menunjukkan tanda-tanda depresi ringan. Cobalah menjaga pola hidup sehat, rutin berolahraga, dan tetap terhubung dengan orang-orang terdekat. Jika perasaan tidak membaik dalam beberapa minggu, pertimbangkan untuk berkonsultasi dengan konselor atau psikolog."
            ],
            [
                "kode_depresi" => "D02",
                "depresi" => "Depresi Sedang",
                 "rekomendasi" => "Anda menunjukkan tanda-tanda depresi sedang. Sangat disarankan untuk melakukan konsultasi dengan psikolog atau psikiater untuk mendapatkan diagnosis profesional. Jaga pola tidur dan makan, hindari mengisolasi diri, dan lakukan aktivitas positif yang bisa membantu memperbaiki suasana hati."


            ],
            [
                "kode_depresi" => "D03",
                "depresi" => "Depresi Berat",
                "rekomendasi" => "Anda menunjukkan tanda-tanda depresi berat. Segera cari bantuan dari tenaga profesional seperti psikolog atau psikiater. Jangan menunda untuk mendapatkan pertolongan. Anda tidak sendiri, dan ada banyak pihak yang siap membantu Anda melewati masa sulit ini."
            ],
        ];
        return $depresi;
    }
}

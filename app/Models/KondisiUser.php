<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KondisiUser extends Model
{
    use HasFactory;
    // protected $table = 'kondisi_users';

    public function fillTable()
    {
        $opsi_user = [
            [
                'kondisi' => 'Tidak Pernah',
                'nilai' => 1,
            ],
            [
                'kondisi' => 'Jarang',
                'nilai' => 2,
            ],
            [
                'kondisi' => 'Kadang-kadang',
                'nilai' => 3,
            ],
            [
                'kondisi' => 'Sering',
                'nilai' => 4,
            ],
            [
                'kondisi' => 'Sangat sering',
                'nilai' => 5,
            ],
        ];
        return $opsi_user;
    }
} 


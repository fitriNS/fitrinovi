<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Hasil Diagnosa</title>
    <style>
        @page {
            margin: 40px 30px;
        }

        body {
            font-family: 'DejaVu Sans', sans-serif;
            font-size: 12px;
            color: #333;
        }

        .header {
            text-align: center;
            padding-bottom: 10px;
            border-bottom: 2px solid #0d6efd;
        }

        .header h1 {
            margin: 0;
            color: #0d6efd;
        }

        .info,
        .result {
            margin-top: 25px;
        }

        .info table,
        .result table {
            width: 100%;
            border-collapse: collapse;
        }

        .info td {
            padding: 5px;
        }

        .result th {
            background-color: #0d6efd;
            color: #fff;
            padding: 8px;
            text-align: center;
        }

        .result td {
            border: 1px solid #ccc;
            padding: 8px;
            text-align: center;
        }

        .rekomendasi-box {
            border: 1px solid #ccc;
            padding: 15px;
            background-color: #f8f9fa;
            font-size: 13px;
            text-align: left;
        }

        .signature {
            margin-top: 40px;
            text-align: right;
        }

        .footer {
            position: fixed;
            bottom: 0;
            left: 0;
            font-size: 10px;
            text-align: center;
            width: 100%;
            color: #aaa;
        }
    </style>
</head>

<body>
    <div class="header">
        <h1>Hasil Diagnosa</h1>
        <p style="margin: 0;">Sistem Pakar Tingkat Depresi Mahasiswa</p>
    </div>

    <div class="info">
        <table>
            <tr>
                <td><strong>Nama Pengguna:</strong></td>
                <td>{{ $diagnosa->user->name ?? '-' }}</td>
            </tr>
            <tr>
                <td><strong>Email:</strong></td>
                <td>{{ $diagnosa->user->email ?? '-' }}</td>
            </tr>
            <tr>
                <td><strong>Tanggal Diagnosa:</strong></td>
                <td>{{ $diagnosa->created_at->format('d F Y') }}</td>
            </tr>
        </table>
    </div>

    <div class="result" style="margin-top: 30px;">
        <h3 style="color:#0d6efd;">Hasil Diagnosa</h3>
        <table>
            <tr>
                <th>Kode Depresi</th>
                <th>Tingkat Depresi</th>
                <th>Total Nilai</th>
            </tr>
            <tr>
                <td>{{ $kodeDepresi }}</td>
                <td>{{ $tingkatDepresi }}</td>
                <td>{{ $totalNilai }}</td>
            </tr>
        </table>
    </div>

    @if (!empty($rekomendasi))
        <div class="result" style="margin-top: 30px;">
            <h3 style="color:#0d6efd;">Rekomendasi</h3>
            <div class="rekomendasi-box">
                {{ $rekomendasi }}
            </div>
        </div>
    @endif

    <div class="signature">
        <p>Yogyakarta, {{ now()->format('d F Y') }}</p>
        <p><em>Admin Sistem</em></p>
        <br><br><br>
        <p><strong>______________________</strong></p>
    </div>

    <div class="footer">
        Sistem Pakar Diagnosa Tingkat Depresi &copy; {{ date('Y') }}
    </div>
</body>

</html>
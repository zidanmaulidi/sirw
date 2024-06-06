<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Surat Pengantar</title>
    <style>
        @page {
            size: A4;
            margin: 1.5cm;
        }

        body {
            font-family: sans-serif;
            display: flex;
            flex-direction: column;
            align-items: center;
            margin: 0;
            padding: 0;
        }

        .header {
            text-align: center;
            margin-bottom: 10px;
            flex: 1;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .header h3 {
            font-size: 20px;
            margin-bottom: 5px;
        }

        .header p {
            margin: 2px;
        }

        .body {
            line-height: 1.3;
            flex: 2;
            display: flex;
            flex-direction: column;
            width: 100%;
        }

        .container {
            padding: 15px;
            border: 1px solid #ccc;
            flex: 1;
        }

        .list-unstyled {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        .row {
            display: flex;
            flex-direction: row;
            justify-content: space-between;
        }

        .col {
            flex: 1;
            text-align: center;
        }

        table {
            width: 100%;
        }

        table th:nth-child(2) {
            padding-left: 350px;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="header">
            <h3>SURAT PENGANTAR</h3>
            <p>DESA SIDORAHAYU, KECAMATAN WAGIR, DUSUN BUNDER</p>
            <p>RUKUN TETANGGA 010, RUKUN WARGA 002</p>
            <hr>
        </div>

        <div class="body">
            <h3 style="text-align: center">SURAT PENGANTAR</h3>
            <p style="text-align: center">No: ......................................</p>
            <p>Diberikan kepada:</p>
            @if ($surats)
                <ul class="list-unstyled">
                    <li><strong>Nama:</strong> {{ $surats->nama_pengaju }}</li>
                    <li><strong>NIK:</strong> {{ $surats->NIK }}</li>
                    <li><strong>Tempat Lahir:</strong> {{ $surats->tempat_lahir }}</li>
                    <li><strong>Tanggal Lahir:</strong> {{ $surats->tgl_lahir }}</li>
                    <li><strong>Pekerjaan:</strong> {{ $surats->pekerjaan }}</li>
                    <li><strong>Status:</strong> {{ $surats->status }}</li>
                    <li><strong>Alamat:</strong> {{ $surats->alamat }}</li>
                    <li><strong>Keperluan:</strong> {{ $surats->keperluan }}</li>
                </ul>
            @else
                <p>Data tidak ditemukan</p>
            @endif

            <br>
            <p>Demikian surat pengantar ini kami buat untuk dapat dipergunakan sebagaimana dimaksud</p>
            <br>
            <br><br><br><br><br><br>
            <br><br><br><br><br><br>
            <table>
                <thead>
                    <tr>
                        <th>Mengetahui</th>
                        <th>&nbsp;</th>
                        <th>&nbsp;</th>
                        <th>Sidorahayu, <?php echo date('d-m-Y'); ?></th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Ketua RW</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>Ketua RT</td>
                    </tr>
                    <tr>
                        <td> <br> <br> <br> <br>.................... </td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td><br> <br> <br> <br>................... </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</body>

</html>
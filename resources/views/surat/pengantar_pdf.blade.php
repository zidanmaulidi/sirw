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
            <p style="margin-left: 50px">Diberikan kepada:</p>
            @if ($surats)
                <ul class="list-unstyled" style="margin-left: 50px">
                    <table style="margin: 0 auto">
                        <tr>
                            <td>Nama</td>
                            <td>: {{ $surats->nama_pengaju }}</td>
                        </tr>
                        <tr>
                            <td>NIK</td>
                            <td>: {{ $surats->NIK }}</td>
                        </tr>
                        <tr>
                            <td>Tempat Lahir</td>
                            <td>: {{ $surats->tempat_lahir }}</td>
                        </tr>
                        <tr>
                            <td>Tanggal Lahir</td>
                            <td>: {{ $surats->tgl_lahir }}</td>
                        </tr>
                        <tr>
                            <td>Pekerjaan</td>
                            <td>: {{ $surats->pekerjaan }}</td>
                        </tr>
                        <tr>
                            <td>Status</td>
                            <td>: {{ $surats->status }}</td>
                        </tr>
                        <tr>
                            <td>Alamat</td>
                            <td>: {{ $surats->alamat }}</td>
                        </tr>
                        <tr>
                            <td>Keperluan</td>
                            <td>: {{ $surats->keperluan }}</td>
                        </tr>
                    </table>
                </ul>
            @else
                <p>Data tidak ditemukan</p>
            @endif

            <br>
            <p style="margin-left: 50px">Demikian surat pengantar ini kami buat untuk dapat dipergunakan sebagaimana
                <br>
                dimaksud
            </p>
            <br>
            <br><br><br><br><br><br>

            <table style="margin: 0 auto">
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
                        <td><br><br><br><br>....................</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td><br><br><br><br>...................</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</body>

</html>
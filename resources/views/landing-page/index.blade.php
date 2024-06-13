<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css"
        integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous">
    </script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
    </script>
    <title>Landing Page </title>
    <link rel="icon" href="img/Logo.png">
    <style>
        /* Custom CSS for background colors */
        body {
            background-color: #f8f9fa;
            max-width: 100%;
            height: auto;
            /* Light Gray */
        }

        .navbar {
            background-color: #ffffff;
            /* White */
        }

        footer.footer {
            background-color: #f8f9fa;
            /* Light Gray */
            color: #343a40;
            /* Dark Gray */
            padding-top: 20px;
            /* Add padding for better spacing */
            border-top: 1px solid #dee2e6;
            /* Light Gray border on top */
        }

        .rounded-card {
        border-radius: 5px; /* Sudut melengkung */
        overflow: hidden; /* Agar konten di dalam tidak keluar dari batas kartu */
        }

        .shadow-card{
            box-shadow: 0 4px 5px rgba(0, 0, 0, 0.1);
            transition: box-shadow 0.3s ease;
        }
    </style>
</head>

<body style="background-color: white">
    <nav class="navbar navbar-expand-lg navbar-light bg-white">
        <a class="navbar-brand" href="#"><img src="{{ asset('LOGO/logo.png')}}" alt="logo" width="180px"></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText"
            aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-end" id="navbarText">
            <ul class="navbar-nav ">
                <li class="nav-item">
                    <a class="nav-link" href="#informasi">Informasi</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#kegiatan"> Kegiatan</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#" data-toggle="modal" data-target="#StrukturModal">Struktur
                        Organisasi </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#" data-toggle="modal" data-target="#keuanganModal">Keuangan</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#" data-toggle="modal" data-target="#AduanModal">Pengaduan</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#" data-toggle="modal" data-target="#SuratModal">Pengajuan
                        Surat</a>
                </li>
            </ul>
            <ul></ul>
            <span class="navbar-text">
                <a href="/admin/login" class="btn" role="button"
                    style="color:white; background-color: rgba(245,158,11,255)">Login</a>
            </span>
        </div>
    </nav>
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    {{-- modal keuangan --}}
    <div class="modal fade" id="keuanganModal" tabindex="-1" role="dialog" aria-labelledby="keuanganModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-xl" role="document"> <!-- Added 'modal-xl' class for extra large modal -->
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="keuanganModalLabel">Keuangan</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="container">
                        <h1> Transparansi Data Keuangan</h1>
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th>tanggal</th>
                                        <th>Pemasukan</th>
                                        <th>keterangan</th>
                                        <th>Pengeluaran</th>
                                        <th>saldo</th>
                                        <!-- Add more columns as needed -->
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($keuangans as $data)
                                        <tr>
                                            <td>{{ $data->tanggal }}</td>
                                            <td>{{ $data->uang_masuk }}</td>
                                            <td>{{ $data->keterangan }}</td>
                                            <td>{{ $data->uang_keluar }}</td>
                                            <td>{{ $data->saldo_kas }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    {{-- jumbotron --}}
    <div class="jumbotron jumbotron-fluid"
        style="background-image: url('{{ asset('img/bromo.jpg') }}'); background-size: cover; background-position: center; height: auto;">
        <div class="container">
            <h1 class="display-3" style="color: white">Kami Ada Untuk Melayani Yang Terbaik Untuk Masyarakat</h1>
            <p class="lead" style="color: white">RW O2 Desa Bunder</p>
        </div>
    </div>
    </div>
    {{-- informasi --}}
    <h1 style="text-align: center; font-family: Arial, sans-serif; font-size: 36px; color: #333; text-shadow: 2px 2px 2px #ccc; margin-top: 50px;"
        id="informasi">INFORMASI</h1>
    <br>
    <div class="container-fluid" style="padding: 5S0px;">
        <div class="row" style="display: flex; flex-wrap: wrap; justify-content: flex-start; border: 1px">
            @foreach ($informations as $information)
                <div class="col-md-3">
                    <div class="card mb-4 rounded-card shadow-card" >
                        <img src="{{ asset('storage/' . $information->thumbnail) }}" class="card-img-top"
                            alt="{{ $information->title }}" style="width:auto; " >
                        <div class="card-body">
                            <h5 class="card-title">{{ $information->title }}</h5>
                            <div class="card-text collapse multi-collapse"
                                id="multiCollapseExample{{ $information->id }}">
                                {!! $information->content !!}
                            </div>

                            <button type="button" class="btn btn-primary" data-toggle="collapse" 
                                data-target="#multiCollapseExample{{ $information->id }}" aria-expanded="false"
                                aria-controls="multiCollapseExample{{ $information->id }}">
                                Selengkapnya
                            </button>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    <br>
    {{-- kegiatan --}}
    <h1 style="text-align: center; font-family: Arial, sans-serif; font-size: 36px; color: #333; text-shadow: 2px 2px 2px #ccc; margin-top: 50px;"
        id="kegiatan">KEGIATAN WARGA</h1>
    <br>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="table-responsive">
                    <table class="table table-sm" style="font-size: 16px; margin: auto;">
                        <thead>
                            <tr>
                                <th style="width: 20%;">Kegiatan</th>
                                <th style="width: 15%;">Waktu</th>
                                <th style="width: 15%;">Lokasi</th>
                                <th style="width: 15%;">Peserta</th>
                                <th style="width: 35%;">Agenda</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($kegiatans as $kegiatan)
                                <tr>
                                    <td>{{ $kegiatan->kegiatan }}</td>
                                    <td>{{ $kegiatan->waktu }}</td>
                                    <td>{{ $kegiatan->lokasi }}</td>
                                    <td>{{ $kegiatan->peserta }}</td>
                                    <td>{!! $kegiatan->agenda !!}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>


    <br>


    {{-- modal struktur organisasi --}}
    <div class="modal fade" id="StrukturModal" tabindex="-1" role="dialog" aria-labelledby="StrukturModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-xl" role="document"> <!-- Added 'modal-xl' class for extra large modal -->
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="StrukturModalLabel">Struktur Organisasi</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <h1 style="text-align: center; font-family: Arial, sans-serif; font-size: 36px; color: #333; text-shadow: 2px 2px 2px #ccc; margin-top: 50px;"
                        id="struktur">Struktur Organisasi</h1>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-auto">
                                <div class="card text-white bg-warning mb-3" style="max-width: 18rem;">
                                    <div class="card-header">RW</div>
                                    <div class="card-body">
                                        <h5 class="card-title"> RW 02</h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row justify-content-center">
                            <div class="col-auto">
                                <div class="card text-white bg-success mb-3" style="max-width: 18rem;">
                                    <div class="card-header">Sekretaris</div>
                                    <div class="card-body">
                                        <h5 class="card-title"> Sekretaris RW</h5>
                                    </div>
                                </div>
                            </div>
                            <div class="col-auto">
                                <div class="card text-white bg-success mb-3" style="max-width: 18rem;">
                                    <div class="card-header">Bendahara</div>
                                    <div class="card-body">
                                        <h5 class="card-title"> Bendahara RW</h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row justify-content-center">
                            <div class="col-auto">
                                <div class="card text-white bg-primary mb-3" style="max-width: 18rem;">
                                    <div class="card-header">RT</div>
                                    <div class="card-body">
                                        <h5 class="card-title"> RT 10</h5>
                                    </div>
                                </div>
                            </div>
                            <div class="col-auto">
                                <div class="card text-white bg-primary mb-3" style="max-width: 18rem;">
                                    <div class="card-header">RT</div>
                                    <div class="card-body">
                                        <h5 class="card-title"> RT 11</h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                        {{-- <div class="row justify-content-center">
                            <div class="col-auto">
                                <div class="card text-white bg-primary mb-3" style="max-width: 18rem;">
                                    <div class="card-header">RT</div>
                                    <div class="card-body">
                                        <h5 class="card-title"> RT 10</h5>
                                        <h5 class="card-title"> RT 11</h5>
                                    </div>
                                </div>
                            </div>
                        </div> --}}
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    {{-- modal form pengaduan --}}
    <div class="modal fade" id="AduanModal" tabindex="-1" role="dialog" aria-labelledby="AduanModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-xl" role="document"> <!-- Added 'modal-xl' class for extra large modal -->
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="AduanModalLabel">Aduan</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="container">
                        <div class="table-responsive">
                            <div class="container mt-5">
                                <h2>Form Pengaduan</h2>
                                <form action="/create" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group">
                                        <label for="nama_pengadu">Nama Pengadu</label>
                                        <input type="text" class="form-control" id="nama_pengadu"
                                            name="nama_pengadu" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="aduan">Judul Aduan</label>
                                        <input type="text" class="form-control" id="aduan" name="aduan"
                                            required>
                                    </div>
                                    <div class="form-group">
                                        <label for="isi_aduan">Isi Aduan</label>
                                        <textarea class="form-control" id="isi_aduan" name="isi_aduan" rows="5" required></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="bukti">Upload File:</label>
                                        <input type="file" class="form-control-file" id="bukti"
                                            name="bukti" required>
                                    </div>
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    {{-- Model Pengajuan Surat --}}

    <div class="modal fade" id="SuratModal" tabindex="-1" role="dialog" aria-labelledby="SuratModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-xl" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="SuratModalLabel">Pengajuan Surat</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="container">
                        <div class="table-responsive">
                            <a href="/file/FormatSuratPengantar.pdf" download="FormatSuratPengantar.pdf" class="btn btn-success">
                                Download Format Surat
                            </a>
                            <div class="container mt-5">
                                <h2>Form Pengajuan Surat</h2>
                                <form id="suratForm" enctype="multipart/form-data" class="needs-validation"
                                    novalidate>
                                    @csrf
                                    <div class="form-group">
                                        <label for="nama_pengaju">Nama Lengkap</label>
                                        <input type="text" class="form-control" id="nama_pengaju"
                                            name="nama_pengaju" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="NIK">NIK</label>
                                        <input type="number" pattern="[0-9]{16}" class="form-control"
                                            id="NIK" name="NIK" required
                                            title="NIK harus terdiri dari 16 digit angka">
                                        <div class="invalid-feedback">NIK harus terdiri dari 16 digit angka</div>
                                    </div>
                                    <div class="form-group">
                                        <label for="tempat_lahir">Tempat Lahir</label>
                                        <input type="text" class="form-control" id="tempat_lahir"
                                            name="tempat_lahir" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="tgl_lahir">Tanggal Lahir</label>
                                        <input type="date" class="form-control" id="tgl_lahir" name="tgl_lahir"
                                            required>
                                    </div>
                                    <div class="form-group">
                                        <label for="pekerjaan">Pekerjaan</label>
                                        <input type="text" class="form-control" id="pekerjaan" name="pekerjaan"
                                            required>
                                    </div>
                                    <div class="form-group">
                                        <label for="status">Status</label>
                                        <select class="form-control" id="status" name="status" required>
                                            <option value="Menikah">Menikah</option>
                                            <option value="Belum Menikah">Belum Menikah</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="alamat">Alamat</label>
                                        <input type="text" class="form-control" id="alamat" name="alamat"
                                            required>
                                    </div>
                                    <div class="form-group">
                                        <label for="keperluan">Keperluan</label>
                                        <textarea class="form-control" id="keperluan" name="keperluan" rows="5" required></textarea>
                                    </div>
                                    <button type="button" id="submitButton" class="btn btn-primary">Submit</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    <BR></BR>

    {{-- footer --}}
    <footer class="footer bg-light mt-auto py-3">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <h5>Profile </h5>
                    <ul class="list-unstyled">
                        <li>
                            <p>RW 02 Desa Bunder, Kecamatan Wagir: Komitmen pada pelayanan masyarakat, pembangunan
                                berkelanjutan, dan gotong royong</p>
                        </li>

                    </ul>
                </div>
                <div class="col-md-4">
                    <h5>Alamat </h5>
                    <ul class="list-unstyled">
                        <li>
                            <p>RW 02 Desa Bunder, Desa Bunder, Kecamatan Wagir, Kabupaten Malang, Jawa Timur,
                                Indonesia.
                            </p>
                        </li>

                    </ul>
                </div>

                <div class="col-md-4">
                    <h5>Kontak Kami</h5>
                    <ul class="list-unstyled">
                        <li><a href="#">Facebook</a></li>
                        <li><a href="#">Twitter</a></li>
                        <li><a href="#">Instagram</a></li>
                        <li>telepon: <a href="#">089567482429</a></li>
                        <li>email: <a href="#">rw02bunder@gmail.com</a></li>
                        <li>maps: <a href=""></a></li>
                    </ul>
                </div>

            </div>
        </div>
    </footer>
    <footer class="footer bg-light mt-auto py-3">
        <div class="container text-center">
            <span class="text-muted">Sistem Informasi Rukun Warga Dusun Bunder &copy; kelompok 6</span>
            <br>
            <span class="text-muted">Kecamatan Wagir - Kabupaten Malang</span>
        </div>
    </footer>


</body>

</html>
<script>
    $(document).ready(function() {
        $('.multi-collapse').on('show.bs.collapse', function() {
            $('.multi-collapse').not(this).collapse('hide');
        });
    });
    document.addEventListener("DOMContentLoaded", function() {
        var nikInput = document.getElementById("NIK");
        var submitButton = document.getElementById("submitButton");

        nikInput.addEventListener("input", function() {
            var isValid = /^\d{16}$/.test(nikInput.value);

            if (!isValid) {
                nikInput.classList.add("is-invalid");
                submitButton.disabled = true; // Menonaktifkan tombol submit
            } else {
                nikInput.classList.remove("is-invalid");
                submitButton.disabled = false; // Mengaktifkan tombol submit
            }
        });
    });
    $(document).ready(function() {
        $('.read-more-btn').on('click', function() {
            var card = $(this).closest('.my-card');
            var cardBody = card.find('.card-body');
            var cardText = card.find('.card-text.agenda');
            var footer = card.find('.card-footer');

            if (card.hasClass('full-card')) {
                // Contract the card
                cardBody.css('max-height', '150px');
                card.removeClass('full-card');
                cardText.hide(); // Sematkan tulisan saat belum di klik
                footer.css('position', 'relative'); // Atur posisi footer kembali ke relatif
                $(this).text('Baca Lebih Lanjut');
            } else {
                // Expand the card
                cardBody.css('max-height', 'none');
                card.addClass('full-card');
                cardText.show(); // Tampilkan tulisan saat di klik
                footer.css('position',
                    'static'); // Atur posisi footer ke statis untuk mengikuti ke bawah
                $(this).text('Tutup');
            }
        });
    });
    document.addEventListener('DOMContentLoaded', function() {
        const submitButton = document.getElementById('submitButton');
        const suratForm = document.getElementById('suratForm');

        submitButton.disabled = false;

        submitButton.addEventListener('click', function() {
            let formData = new FormData(suratForm);

            fetch('/create/surat', {
                    method: 'POST',
                    body: formData,
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    }
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        fetch(`/surat/generate-pdf/${data.id}`)
                            .then(pdfResponse => {
                                if (pdfResponse.ok) {
                                    return pdfResponse.blob();
                                } else {
                                    throw new Error('Failed to generate PDF');
                                }
                            })
                            .then(blob => {
                                const url = window.URL.createObjectURL(blob);
                                const a = document.createElement('a');
                                a.style.display = 'none';
                                a.href = url;
                                a.download = 'surat_pengajuan.pdf';
                                document.body.appendChild(a);
                                a.click();
                                window.URL.revokeObjectURL(url);
                                // Redirect to index page after download
                                window.location.href = '/';
                            })
                            .catch(error => console.error('PDF Generation Error:', error));
                    } else {
                        // Handle validation errors or other errors
                        console.log(data.errors);
                    }
                })
                .catch(error => console.error('Error:', error));
        });
    });
</script>
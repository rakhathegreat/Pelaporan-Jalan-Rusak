<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Tamu</title>
    <link rel="stylesheet" href="{{ asset('css/filament/laporan-tamu.css') }}">
</head>
<body>
    <div class="container">
        <h1>Laporan Tamu</h1>

        @if(session('success'))
        <div class="success-message">
            {{ session('success') }}
        </div>
        @endif

        <form action="/laporan-tamu" method="POST" enctype="multipart/form-data" class="form">
            @csrf
            <div class="form-group">
                <label for="kelurahan">Kelurahan<span>*</span></label>
                <input type="text" id="kelurahan" name="kelurahan" required>
            </div>

            <div class="form-group">
                <label for="lingkungan">Lingkungan<span>*</span></label>
                <input type="text" id="lingkungan" name="lingkungan" required>
            </div>

            <div class="form-group">
                <label for="rt">RT<span>*</span></label>
                <input type="text" id="rt" name="rt" required>
            </div>

            <div class="form-group">
                <label for="rw">RW<span>*</span></label>
                <input type="text" id="rw" name="rw" required>
            </div>

            <div class="form-group">
                <label for="nama_jalan">Nama Jalan<span>*</span></label>
                <input type="text" id="nama_jalan" name="nama_jalan" required>
            </div>

            <div class="form-group">
                <label for="lebar_jalan">Lebar Jalan<span>*</span></label>
                <input type="text" id="lebar_jalan" name="lebar_jalan" required>
            </div>

            <div class="form-group">
                <label for="panjang_jalan">Panjang Jalan<span>*</span></label>
                <input type="text" id="panjang_jalan" name="panjang_jalan" required>
            </div>

            <div class="form-group">
                <label for="kondisi">Kondisi<span>*</span></label>
                <select id="kondisi" name="kondisi" required>
                    <option value="">Select an option</option>
                    <option value="Bagus">Bagus</option>
                    <option value="Rusak Sedang">Rusak Sedang</option>
                    <option value="Rusak Berat">Rusak Berat</option>
                </select>
            </div>

            <div class="form-group">
                <label for="image">Gambar:</label>
                <input type="file" id="image" name="image" accept="image/*">
            </div>

            <div class="form-buttons">
                <button type="submit" class="submit-button">Kirim Laporan</button>
                <button type="button" class="back-button" onclick="history.back()">Kembali</button>
            </div>
        </form>
    </div>
</body>
</html>

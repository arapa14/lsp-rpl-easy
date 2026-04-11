<!DOCTYPE html>
<html>
<head>
    <title>Detail Pemesanan</title>
</head>
<body>
    <h2>Konfirmasi Pemesanan Tiket</h2>
    <a href="/dashboard"><- Kembali ke Jadwal</a>
    <hr>

    <h3>Rincian Pesawat</h3>
    <p><strong>Nama Pesawat:</strong> {{ $schedule->plane_name }}</p>
    <p><strong>Rute:</strong> {{ $schedule->origin }} ke {{ $schedule->destination }}</p>
    <p><strong>Waktu Berangkat:</strong> {{ $schedule->departure }}</p>
    <p><strong>Harga per Kursi:</strong> Rp {{ number_format($schedule->price) }}</p>
    <p><strong>Stok Tersedia:</strong> {{ $schedule->stock }} Kursi</p>

    <hr>

    <form action="/booking/{{ $schedule->id }}" method="POST">
        @csrf
        <label>Masukkan Jumlah Kursi:</label><br>
        <input type="number" name="total_seats" min="1" max="{{ $schedule->stock }}" required id="input_kursi">
        
        <br><br>
        
        <p><strong>Total Harga:</strong> <span id="total_harga">0</span></p>

        <button type="submit">Konfirmasi & Pesan Sekarang</button>
    </form>

    <script>
        const inputKursi = document.getElementById('input_kursi');
        const displayTotal = document.getElementById('total_harga');
        const hargaSatuan = {{ $schedule->price }};

        inputKursi.addEventListener('input', function() {
            const jumlah = inputKursi.value;
            const total = jumlah * hargaSatuan;
            
            // Format ke rupiah sederhana
            displayTotal.innerText = "Rp " + total.toLocaleString();
        });
    </script>
</body>
</html>
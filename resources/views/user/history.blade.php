<!DOCTYPE html>
<html>

<head>
    <title>Riwayat Pemesanan</title>
</head>

<body>
    <h2>Riwayat Pemesanan Tiket Anda</h2>
    <a href="/dashboard"><- Kembali ke Dashboard</a>
            <hr>

            @if ($orders->isEmpty())
                <p>Anda belum memiliki riwayat pemesanan.</p>
            @else
                <table border="1" cellpadding="10" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Pesawat</th>
                            <th>Rute</th>
                            <th>Kursi</th>
                            <th>Total Harga</th>
                            <th>Status</th>
                            <th>Tanggal</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($orders as $item)
                            <tr>
                                {{-- Akses data melalui relasi schedule --}}
                                <td>{{ $item->schedule->plane_name }}</td>
                                <td>{{ $item->schedule->origin }} ke {{ $item->schedule->destination }}</td>
                                <td>{{ $item->total_seats }}</td>
                                <td>Rp {{ number_format($item->total_price) }}</td>
                                <td>{{ $item->status }}</td>
                                <td>{{ $item->created_at->format('d M Y') }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @endif
</body>

</html>

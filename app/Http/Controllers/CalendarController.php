<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Peminjaman;

class CalendarController extends Controller
{
    public function getEvents()
    {
        $peminjamans = Peminjaman::where('status', 'disetujui')->get();

        $events = [];

        foreach ($peminjamans as $p) {
            $color = match ($p->jenis) {
                'Dekorasi' => '#28a745', // Soft green
                'Perkakas' => '#dc3545', // Soft red
                'Elektronik' => '#007bff', // Soft blue
                default => '#6c757d', // Gray
            };

            $events[] = [
                'title' => $p->barang->nama_barang,
                'start' => $p->tanggal . 'T' . $p->jam_mulai,
                'end' => $p->tanggal . 'T' . $p->jam_berakhir,
                'color' => $color,
                'textColor' => 'white', // Biar kontras
            ];

        }

        return response()->json($events);
    }
}

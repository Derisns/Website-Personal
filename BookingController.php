<?php

namespace App\Http\Controllers;
use App\Models\Booking;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    public function store(Request $request)
{
    $request->validate([
        'nama' => 'required|string|max:255',
        'tanggal' => 'required|date',
        'jumlah' => 'required|integer|min:1',
    ]);

    Booking::create([
        'nama' => $request->nama,
        'tanggal_kunjungan' => $request->tanggal,
        'jumlah_peserta' => $request->jumlah,
    ]);

    return redirect()->back()->with('success', 'Booking berhasil dikirim!');
}
// app/Http/Controllers/BookingController.php
public function index()
{
    $bookings = Booking::latest()->get(); // atau bisa juga filter berdasarkan user jika ada sistem login
    return view('booking.index', compact('bookings'));
}

}

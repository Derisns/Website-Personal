<?php
// app/Http/Controllers/ContactController.php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function store(Request $request)
    {
        // Validasi data formulir
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'pesan' => 'required|string',
        ]);

        // Simpan data ke dalam tabel contacts
        Contact::create($validated);

        // Kembali ke halaman kontak dengan pesan sukses
        return redirect()->route('kontak')->with('success', 'Pesan Anda telah terkirim!');
    }
}

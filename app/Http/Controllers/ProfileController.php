<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProfileController extends Controller
{
    /**
     * Menampilkan halaman profil.
     *
     * @return \Illuminate\View\View
     */
    public function show()
    {
        return view('profile'); // Pastikan 'profile' adalah nama file view Anda
    }
}

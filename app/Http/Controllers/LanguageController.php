<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\URL;

class LanguageController extends Controller
{
    /**
     * Daftar locale yang didukung oleh aplikasi.
     */
    private array $supportedLocales = ['id', 'en'];

    /**
     * Mengganti locale (bahasa) aplikasi dan menyimpannya di session.
     *
     * @param  string  $locale  Kode bahasa yang ingin diaktifkan (misal: 'id' atau 'en')
     * @return \Illuminate\Http\RedirectResponse
     */
    public function switch(string $locale)
    {
        // Pastikan locale yang diminta memang didukung
        if (! in_array($locale, $this->supportedLocales)) {
            return redirect()->back()->with('error', 'Bahasa tidak didukung.');
        }

        // Simpan locale ke session pengguna agar persisten di semua halaman
        Session::put('locale', $locale);

        // Terapkan locale untuk request ini
        App::setLocale($locale);

        // Kembalikan pengguna ke halaman sebelumnya (atau halaman utama jika tidak ada)
        return redirect()->back();
    }
}
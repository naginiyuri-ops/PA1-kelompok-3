<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;
use Symfony\Component\HttpFoundation\Response;

class LanguageMiddleware
{
    /**
     * Menangani setiap request yang masuk.
     * Middleware ini membaca locale yang tersimpan di session pengguna
     * dan menerapkannya ke aplikasi Laravel.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Daftar locale yang didukung oleh aplikasi
        $supportedLocales = config('app.supported_locales', ['id', 'en']);

        // Ambil locale dari session, atau gunakan default dari config
        $locale = Session::get('locale', config('app.locale', 'id'));

        // Validasi: pastikan locale yang ada di session memang didukung
        if (! in_array($locale, $supportedLocales)) {
            $locale = config('app.locale', 'id');
        }

        // Terapkan locale ke aplikasi untuk request ini
        App::setLocale($locale);

        return $next($request);
    }
}

<?php

namespace App\Http\Controllers;

use App\Services\PosterService;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class AdminController extends Controller
{
    /**
     * Tampilkan halaman login CMS.
     */
    public function showLogin()
    {
        if (session('admin_authenticated')) {
            return redirect()->route('admin.dashboard');
        }

        return view('admin.login');
    }

    /**
     * Proses autentikasi berbasis .env.
     */
    public function login(Request $request)
    {
        $request->validate([
            'username' => 'required|string',
            'password' => 'required|string',
        ]);

        $validUser = env('ADMIN_USER', 'admin');
        $validPass = env('ADMIN_PASSWORD', 'adminxlhome');

        if ($request->input('username') === $validUser && $request->input('password') === $validPass) {
            $request->session()->regenerate();
            $request->session()->put('admin_authenticated', true);
            $request->session()->put('admin_user', $validUser);

            return redirect()->route('admin.dashboard')->with('success', 'Selamat datang di Panel CMS XL SATU.');
        }

        return back()->withInput($request->only('username'))->with('error', 'Username atau Password salah!');
    }

    /**
     * Proses logout admin.
     */
    public function logout(Request $request)
    {
        $request->session()->forget(['admin_authenticated', 'admin_user']);
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('admin.login')->with('success', 'Anda telah berhasil keluar.');
    }

    /**
     * Tampilkan dashboard pengelola poster CMS.
     */
    public function dashboard()
    {
        $slots = PosterService::slots();
        $saved = PosterService::all();

        return view('admin.dashboard', compact('slots', 'saved'));
    }

    /**
     * Simpan perubahan poster (file upload atau custom URL).
     */
    public function update(Request $request)
    {
        $slots = PosterService::slots();
        $uploadDir = public_path('uploads/posters');

        if (!is_dir($uploadDir)) {
            mkdir($uploadDir, 0755, true);
        }

        $saved = PosterService::all();

        foreach ($slots as $key => $slotInfo) {
            // Cek apakah ada permintaan reset ke default
            if ($request->has("reset_{$key}")) {
                if (!empty($saved[$key]) && str_starts_with($saved[$key], '/uploads/posters/')) {
                    $oldPath = public_path(ltrim($saved[$key], '/'));
                    if (file_exists($oldPath)) {
                        @unlink($oldPath);
                    }
                }
                PosterService::set($key, null);
                continue;
            }

            // Cek apakah ada file yang diunggah
            if ($request->hasFile("file_{$key}")) {
                $file = $request->file("file_{$key}");
                if ($file->isValid()) {
                    // Hapus file lama jika ada
                    if (!empty($saved[$key]) && str_starts_with($saved[$key], '/uploads/posters/')) {
                        $oldPath = public_path(ltrim($saved[$key], '/'));
                        if (file_exists($oldPath)) {
                            @unlink($oldPath);
                        }
                    }

                    $ext = $file->getClientOriginalExtension() ?: 'png';
                    $filename = "{$key}_" . time() . '_' . Str::random(6) . ".{$ext}";
                    $file->move($uploadDir, $filename);

                    PosterService::set($key, "/uploads/posters/{$filename}");
                    continue;
                }
            }

            // Cek apakah ada URL teks yang diinputkan
            if ($request->filled("url_{$key}")) {
                $newUrl = trim($request->input("url_{$key}"));
                PosterService::set($key, $newUrl);
            }
        }

        return redirect()->route('admin.dashboard')->with('success', 'Semua poster dan banner berhasil diperbarui!');
    }
}

<?php

namespace App\Services;

class PosterService
{
    /**
     * Definisi seluruh slot poster default di landing page.
     */
    public static function slots(): array
    {
        return [
            'hero_banner' => [
                'label' => 'Banner Promo Hero',
                'section' => 'Hero Section',
                'description' => 'Banner promo lebar yang terletak persis di bawah tombol Cek Area.',
                'default' => 'https://cdn.phototourl.com/member/2026-10-16-7d057154-6e53-4383-9a8f-bc284ca9d97e.png',
            ],
            'fwa_banner_1' => [
                'label' => 'Banner Wireless FWA (Atas)',
                'section' => 'Paket FWA Wireless',
                'description' => 'Banner promo 5G di bawah judul Paket Wireless.',
                'default' => 'https://www.image2url.com/r2/default/images/1786349065971-dd18e28f-ff6e-43b8-baa7-f78936da8f3b.png',
            ],
            'fwa_banner_2' => [
                'label' => 'Banner Wireless FWA (Tengah 1)',
                'section' => 'Paket FWA Wireless',
                'description' => 'Banner promo di bawah paket bulanan FWA.',
                'default' => 'https://www.image2url.com/r2/default/images/1791428508299-0056174c-c8b3-4608-a99e-dad4bd50d7fb.jpg',
            ],
            'fwa_banner_3' => [
                'label' => 'Banner Wireless FWA (Tengah 2)',
                'section' => 'Paket FWA Wireless',
                'description' => 'Banner fitur perangkat/modem FWA.',
                'default' => 'https://www.image2url.com/r2/default/images/1785995744396-ba8ebcfa-36ac-420f-9517-2dab859c97d1.png',
            ],
            'fwa_banner_4' => [
                'label' => 'Banner Wireless FWA (Bawah)',
                'section' => 'Paket FWA Wireless',
                'description' => 'Banner penutup section paket wireless.',
                'default' => 'https://www.image2url.com/r2/default/images/1791428815463-6e324c8e-8ea3-4e76-87c8-07288507919d.jpg',
            ],
            'promo_1' => [
                'label' => 'Banner Promo Spesial 1',
                'section' => 'Promo Pelanggan',
                'description' => 'Poster promo diskon pelanggan.',
                'default' => 'https://www.image2url.com/r2/default/images/1779504319331-19825023-a90d-44ad-b551-966cf008b8b3.png',
            ],
            'promo_2' => [
                'label' => 'Banner Promo Spesial 2',
                'section' => 'Promo Pelanggan',
                'description' => 'Poster ketentuan dan rincian promo tambahan.',
                'default' => 'https://www.image2url.com/r2/default/images/1779505591349-bf0822dd-4463-4b8a-a8a5-7e93b6c154c2.png',
            ],
            'video_1_poster' => [
                'label' => 'Poster Thumbnail Video 1',
                'section' => 'Video Experience',
                'description' => 'Thumbnail cover sebelum video 1 diputar.',
                'default' => 'https://www.image2url.com/r2/default/images/1792124537502-e932d28b-c9c8-4558-80c9-16a95b15faaf.png',
            ],
            'video_2_poster' => [
                'label' => 'Poster Thumbnail Video 2',
                'section' => 'Video Experience',
                'description' => 'Thumbnail cover sebelum video 2 diputar.',
                'default' => 'https://www.image2url.com/r2/default/images/1779509062481-155fed39-1894-4f23-9b0b-e19a41ba7d12.png',
            ],
        ];
    }

    /**
     * Ambil path file json penyimpanan data poster.
     */
    protected static function getStoragePath(): string
    {
        return storage_path('app/posters.json');
    }

    /**
     * Ambil seluruh konfigurasi tersimpan.
     */
    public static function all(): array
    {
        $path = self::getStoragePath();
        if (!file_exists($path)) {
            return [];
        }

        $data = json_decode(file_get_contents($path), true);
        return is_array($data) ? $data : [];
    }

    /**
     * Dapatkan URL poster untuk key tertentu (dengan fallback ke default).
     */
    public static function get(string $key): string
    {
        $saved = self::all();
        if (!empty($saved[$key])) {
            return $saved[$key];
        }

        $slots = self::slots();
        return $slots[$key]['default'] ?? '';
    }

    /**
     * Simpan nilai poster untuk slot tertentu.
     */
    public static function set(string $key, ?string $value): void
    {
        $saved = self::all();
        if ($value === null || trim($value) === '') {
            unset($saved[$key]);
        } else {
            $saved[$key] = trim($value);
        }

        $dir = dirname(self::getStoragePath());
        if (!is_dir($dir)) {
            mkdir($dir, 0755, true);
        }

        file_put_contents(self::getStoragePath(), json_encode($saved, JSON_PRETTY_PRINT));
    }
}

# XL SATU - Website Provider Internet Rumah & Hiburan

Website landing page responsif untuk promosi dan pendaftaran layanan internet **XL SATU** (Fibre & FWA), dibangun menggunakan **Laravel 12**, **Tailwind CSS**, dan siap dijalankan dengan **Docker**.

---

## 🚀 Fitur Website
- **Hero & Promo Section**: Headline promo dan banner informasi produk.
- **Paket Internet WiFi Rumah**: Slider interaktif (Swiper) paket Starter 20 Mbps hingga Extreme 1 Gbps lengkap dengan badge Mbps interaktif.
- **Paket Wireless FWA 5G**: Pilihan paket Fixed Wireless Access bulanan & paket hemat multi-bulan.
- **Produk Lainnya**: TV Kabel, Streaming Apps, X1 Smart Box, Telepon Rumah, CCTV Smart Home, dan Wi-Fi Extender.
- **Video Experience**: Highlight video portrait untuk edukasi pelanggan.
- **Keunggulan Layanan**: 6 kartu keunggulan fitur jaringan modern.
- **Testimoni Pelanggan**: Review pelanggan pengguna XL SATU.
- **Coverage Checker Terintegrasi**:
  - Auto-detect lokasi via browser GPS (Geolocation API + OpenStreetMap reverse geocoding).
  - Validasi area coverage & mini map preview.
  - Kirim lead otomatis ke Google Sheet & redirect WhatsApp admin dengan format pesan rapi.
- **Floating WhatsApp Button**: Akses cepat konsultasi langsung via WhatsApp.
- **Mobile Responsive**: Tampilan optimal di desktop, tablet, dan smartphone.

---

## 🐳 Cara Menjalankan Menggunakan Docker di VPS

### 1. Clone Repository
```bash
git clone https://github.com/GiskaSaputra/xlhomejogja.git
cd xlhomejogja
```

### 2. Konfigurasi Environment
Salin file `.env.example` ke `.env`:
```bash
cp .env.example .env
```

Sesuaikan port jika diperlukan di `.env`:
```env
APP_PORT=80
APP_URL=http://your-vps-ip-or-domain
```

### 3. Jalankan Docker Compose
Jalankan perintah build dan start container di background:
```bash
docker compose up -d --build
```

Container akan otomatis:
- Menginstall dependensi composer yang dibutuhkan
- Generate `APP_KEY` jika belum ada
- Mengatur permission folder `storage` & `bootstrap/cache`
- Menjalankan Nginx pada port yang ditentukan (default `8000` atau `80`)

### 4. Cek Status Container
```bash
docker compose ps
docker compose logs -f
```

### 5. Mematikan Container
```bash
docker compose down
```

---

## 💻 Menjalankan Secara Lokal (Non-Docker)

1. Pastikan **PHP >= 8.2**, **Composer**, dan **Node.js** sudah terinstall.
2. Install PHP dependencies:
   ```bash
   composer install
   ```
3. Install JavaScript dependencies & build assets:
   ```bash
   npm install
   npm run build
   ```
4. Salin environment dan generate key:
   ```bash
   cp .env.example .env
   php artisan key:generate
   ```
5. Jalankan development server:
   ```bash
   php artisan serve
   ```
6. Buka browser di `http://127.0.0.1:8000`.

---

## 🛠️ Tech Stack
- **Framework**: Laravel 12
- **CSS Framework**: Tailwind CSS v4
- **Slider**: Swiper.js
- **Containerization**: Docker & Docker Compose (PHP 8.3 FPM + Nginx Alpine)

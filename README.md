# XL SATU - Website Provider Internet Rumah & Hiburan

Website landing page responsif untuk promosi dan pendaftaran layanan internet **XL SATU** (Fibre & FWA), dibangun menggunakan **Laravel 12**, **Tailwind CSS**, dan siap dijalankan dengan **Docker** di balik **Reverse Proxy Nginx VPS**.

---

## 🚀 Arsitektur Reverse Proxy

```
[ Pengunjung ]
      │
      ▼ (Port 80 / 443 SSL)
[ Nginx VPS Host ]  (Reverse Proxy / SSL Certbot)
      │
      ▼ (proxy_pass http://127.0.0.1:8080)
[ Nginx Container (xlhome_webserver) ]
      │
      ▼ (fastcgi app:9000)
[ PHP-FPM Container (xlhome_app) ]
```

Dengan arsitektur ini:
- Container Docker hanya mengikat ke `127.0.0.1:8080` (tidak terbuka langsung ke publik, aman).
- Nginx utama di VPS mengurus domain, firewall, dan sertifikat SSL (Certbot / Let's Encrypt).
- Laravel dipercayakan membaca header proxy (`trustProxies: *`) sehingga URL, aset, dan skema HTTPS otomatis valid.

---

## 🐳 Panduan Deployment di VPS

### 1. Clone Repository ke VPS
```bash
git clone https://github.com/GiskaSaputra/xlhomejogja.git
cd xlhomejogja
```

### 2. Siapkan File `.env`
Salin template konfigurasi:
```bash
cp .env.example .env
```
Isi konfigurasi di `.env` (sesuaikan domain kamu):
```env
APP_NAME="XL SATU"
APP_ENV=production
APP_DEBUG=false
APP_URL=https://domainanda.com
APP_PORT=8080
APP_BIND_IP=127.0.0.1
```

### 3. Jalankan Docker Compose
```bash
docker compose up -d --build
```
Container akan melakukan:
- Build multi-stage aset frontend (Vite & Tailwind CSS)
- Setup PHP-FPM 8.3 & ekstensi lengkap
- Generate `APP_KEY` dan optimize cache produksi
- Menjalankan Nginx container di `127.0.0.1:8080`

Periksa status container:
```bash
docker compose ps
```

---

### 4. Konfigurasi Nginx di VPS Host (Reverse Proxy)

Buat file konfigurasi di VPS (misal: `/etc/nginx/sites-available/xlhomejogja`):
```nginx
server {
    listen 80;
    listen [::]:80;
    server_name domainanda.com www.domainanda.com;

    location / {
        proxy_pass http://127.0.0.1:8080;

        proxy_http_version 1.1;
        proxy_set_header Host $host;
        proxy_set_header X-Real-IP $remote_addr;
        proxy_set_header X-Forwarded-For $proxy_add_x_forwarded_for;
        proxy_set_header X-Forwarded-Proto $scheme;
        proxy_set_header X-Forwarded-Host $host;
        proxy_set_header X-Forwarded-Port $server_port;

        proxy_connect_timeout 60s;
        proxy_send_timeout 60s;
        proxy_read_timeout 60s;
    }
}
```

Aktifkan konfigurasi dan reload Nginx VPS:
```bash
sudo ln -s /etc/nginx/sites-available/xlhomejogja /etc/nginx/sites-enabled/
sudo nginx -t
sudo systemctl reload nginx
```

*(Opsional: pasang SSL gratis via Certbot)*
```bash
sudo certbot --nginx -d domainanda.com -d www.domainanda.com
```

---

## 🛠️ Perintah Berguna di VPS

- **Lihat log container**:
  ```bash
  docker compose logs -f
  ```
- **Restart container**:
  ```bash
  docker compose restart
  ```
- **Hentikan container**:
  ```bash
  docker compose down
  ```
- **Update ke versi terbaru dari Git**:
  ```bash
  git pull origin main
  docker compose up -d --build
  ```

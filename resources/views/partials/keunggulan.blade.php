{{-- Keunggulan Layanan --}}
<section class="xl-feature-section">
    <div class="container">
        <div class="xl-bg-glow glow1"></div>
        <div class="xl-bg-glow glow2"></div>

        <div class="xl-feature-container">
            <div class="xl-feature-title-wrap">
                <span class="xl-feature-mini">KEUNGGULAN LAYANAN</span>
                <h2 class="xl-feature-title">XL SATU <span>Premium Internet Experience</span></h2>
                <p class="xl-feature-desc">Nikmati layanan internet rumah modern dengan koneksi cepat, stabil dan dukungan profesional untuk seluruh keluarga.</p>
            </div>

            <div class="xl-feature-grid">
                @php
                $features = [
                    ['icon' => '⚡', 'title' => 'Internet Cepat', 'desc' => 'Koneksi stabil untuk streaming, gaming dan aktivitas harian tanpa hambatan.'],
                    ['icon' => '📡', 'title' => 'Fiber Optic Modern', 'desc' => 'Teknologi jaringan terbaru dengan performa maksimal dan latensi rendah.'],
                    ['icon' => '🎮', 'title' => 'Gaming Lancar', 'desc' => 'Ping rendah dan koneksi responsif untuk pengalaman gaming lebih stabil.'],
                    ['icon' => '🎬', 'title' => 'Hiburan Lengkap', 'desc' => 'Streaming film dan video kualitas HD hingga 4K tanpa buffering.'],
                    ['icon' => '🛡️', 'title' => 'Aman & Terpercaya', 'desc' => 'Infrastruktur jaringan berkualitas dengan keamanan modern dan stabil.'],
                    ['icon' => '🎧', 'title' => 'Support 24/7', 'desc' => 'Customer service profesional siap membantu kapan saja dibutuhkan.'],
                ];
                @endphp

                @foreach($features as $feature)
                <div class="xl-feature-card">
                    <div class="xl-feature-icon">{{ $feature['icon'] }}</div>
                    <div>
                        <h3>{{ $feature['title'] }}</h3>
                        <p>{{ $feature['desc'] }}</p>
                    </div>
                </div>
                @endforeach
            </div>

            <div class="xl-bottom-highlight">
                <div class="xl-highlight-item">🚀 Upload Cepat</div>
                <div class="xl-highlight-item">📶 Stabil Semua Device</div>
                <div class="xl-highlight-item">🏠 Cocok Untuk Keluarga</div>
                <div class="xl-highlight-item">💙 Prioritas Pelanggan</div>
            </div>
        </div>
    </div>
</section>

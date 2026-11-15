{{-- Coverage Checker --}}
<section id="coverage-checker" class="relative py-16 bg-gradient-to-br from-blue-950 via-blue-900 to-cyan-700 overflow-hidden">
    <div class="absolute top-0 left-0 w-72 h-72 bg-cyan-400/20 blur-3xl rounded-full"></div>
    <div class="absolute bottom-0 right-0 w-72 h-72 bg-blue-500/20 blur-3xl rounded-full"></div>

    <div class="max-w-5xl mx-auto px-4 relative z-10">
        <div class="text-center mb-10">
            <h2 class="text-3xl sm:text-4xl font-extrabold text-white">Cek Coverage Area XL SATU</h2>
            <p class="mt-3 text-blue-100 max-w-2xl mx-auto">Pastikan lokasi rumah kamu sudah terjangkau layanan internet XL SATU.</p>
        </div>

        <div class="grid lg:grid-cols-2 gap-8 items-start">
            <div class="bg-white/10 backdrop-blur-xl border border-white/10 rounded-3xl p-6 shadow-2xl">
                <div class="space-y-5">
                    <button id="btnGetLocation" class="w-full bg-cyan-400 hover:bg-cyan-300 text-slate-900 font-bold py-4 rounded-2xl transition flex items-center justify-center gap-3">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M12 2a1 1 0 0 1 1 1v1.06A8.002 8.002 0 0 1 19.94 11H21a1 1 0 1 1 0 2h-1.06A8.002 8.002 0 0 1 13 19.94V21a1 1 0 1 1-2 0v-1.06A8.002 8.002 0 0 1 4.06 13H3a1 1 0 1 1 0-2h1.06A8.002 8.002 0 0 1 11 4.06V3a1 1 0 0 1 1-1Zm0 4a6 6 0 1 0 0 12 6 6 0 0 0 0-12Z"/>
                        </svg>
                        Gunakan Lokasi Saya
                    </button>

                    <div id="gpsLoading" class="hidden">
                        <div class="flex items-center gap-3 text-white">
                            <div class="w-6 h-6 border-4 border-cyan-300 border-t-transparent rounded-full animate-spin"></div>
                            Mengambil lokasi GPS...
                        </div>
                    </div>

                    <div>
                        <label class="block text-sm text-blue-100 mb-2">Kota</label>
                        <input type="text" id="city" class="w-full rounded-2xl bg-white/90 border-0 px-5 py-4 outline-none focus:ring-4 focus:ring-cyan-300" placeholder="Contoh: Bandung" />
                    </div>

                    <div>
                        <label class="block text-sm text-blue-100 mb-2">Alamat Lengkap</label>
                        <textarea id="address" rows="4" class="w-full rounded-2xl bg-white/90 border-0 px-5 py-4 outline-none focus:ring-4 focus:ring-cyan-300" placeholder="Masukkan alamat lengkap rumah"></textarea>
                    </div>

                    <input type="hidden" id="latitude">
                    <input type="hidden" id="longitude">

                    <div id="mapPreview" class="hidden rounded-3xl overflow-hidden border border-white/20">
                        <iframe id="mapFrame" class="w-full h-64" loading="lazy" allowfullscreen></iframe>
                    </div>

                    <button id="btnCoverage" class="w-full bg-gradient-to-r from-cyan-400 to-blue-500 hover:scale-[1.02] transition-all duration-300 text-white font-extrabold py-4 rounded-2xl shadow-2xl">
                        Cek Coverage Sekarang
                    </button>
                </div>
            </div>

            <div class="xl-cs-right">
                <div class="xl-glow"></div>
                <img src="https://www.image2url.com/r2/default/images/1786067794115-ed971ec7-9db8-4211-8959-bba7013ab18a.png" alt="Customer Service" class="xl-cs-image">
            </div>
        </div>
    </div>
</section>

<button onclick="document.getElementById('coverage-checker').scrollIntoView({behavior:'smooth'})"
        class="fixed bottom-24 right-5 z-[9999] bg-cyan-400 hover:bg-cyan-300 text-slate-900 font-bold px-5 py-4 rounded-full shadow-2xl animate-bounce">
    📡 Cek Coverage
</button>

<div class="max-w-6xl mx-auto px-4 sm:px-6">
    <div class="mt-10">
        <a href="https://wa.me/6285942116452?text=Halo%2C%20saya%20siap%20berlangganan%20XL%20SATU.%20Mohon%20dipandu%20dari%20cek%20area%20hingga%20instalasi."
           target="_blank" rel="noopener"
           class="inline-flex items-center justify-center w-full sm:w-auto bg-brand-700 hover:bg-brand-800 text-white font-semibold px-6 py-3 rounded-xl shadow-card">
            Daftar Sekarang via WhatsApp
        </a>
    </div>
</div>

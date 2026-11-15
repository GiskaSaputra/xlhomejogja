{{-- Sticky Navigation --}}
<header class="sticky top-0 z-50 bg-white/90 backdrop-blur border-b border-slate-100">
    <div class="max-w-6xl mx-auto px-3 sm:px-6 h-16 flex items-center justify-between">
        <div class="flex items-center gap-4">
            <div class="w-9 h-9 rounded-md bg-brand-900 grid place-items-center text-white font-black text-xs">Xl</div>
            <div class="w-[2px] h-6 bg-slate-200"></div>
            <div class="w-10 h-9 rounded-md bg-emerald-500 grid place-items-center text-white font-black text-xs">Satu</div>
        </div>
        <button id="btnMenu"
                class="p-2 rounded-lg hover:bg-slate-100 md:hidden"
                aria-label="Buka menu"
                aria-controls="mobileNav"
                aria-expanded="false">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
            </svg>
        </button>
    </div>

    {{-- Mobile menu --}}
    <nav id="mobileNav" class="md:hidden hidden border-t border-slate-100 bg-white" aria-label="Navigasi Mobile">
        <div class="max-w-6xl mx-auto px-4 py-3 flex flex-col gap-2 text-sm">
            <a href="#hero" class="py-2">Home</a>
            <a href="#paket-xl" class="py-2">Paket Populer</a>
            <a href="#fwa-section" class="py-2">Paket Wireless</a>
            <a href="#produk-lainnya" class="py-2">Produk Lainnya</a>
            <a href="#testimoni" class="py-2">Testimoni</a>
            <a href="#coverage-checker" class="py-2">Cek Area Coverage</a>
        </div>
    </nav>
</header>

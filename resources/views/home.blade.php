@extends('layouts.app')

@section('content')

    @include('partials.hero')
    @include('partials.paket')
    @include('partials.fwa')
    @include('partials.produk-lainnya')
    @include('partials.video')
    @include('partials.keunggulan')
    @include('partials.testimoni')
    @include('partials.promo')
    @include('partials.coverage')
    @include('partials.faq')

@endsection

@push('scripts')
<script>
// === Mobile Menu ===
(function(){
    const btn  = document.getElementById('btnMenu');
    const menu = document.getElementById('mobileNav');
    if(!btn || !menu) return;
    btn.addEventListener('click', () => {
        menu.classList.toggle('hidden');
        const expanded = btn.getAttribute('aria-expanded') === 'true';
        btn.setAttribute('aria-expanded', String(!expanded));
    });
    menu.addEventListener('click', (e) => {
        const a = e.target.closest('a');
        if(a){ menu.classList.add('hidden'); btn.setAttribute('aria-expanded','false'); }
    });
})();

// === Swiper Init ===
new Swiper(".paketSwiper", {
    slidesPerView: 1.1,
    spaceBetween: 16,
    autoHeight: true,
    pagination: {
        el: ".swiper-pagination",
        clickable: true,
    },
    breakpoints: {
        768: { slidesPerView: 2.2 },
        1024: { slidesPerView: 3 }
    }
});

// === WhatsApp Helper ===
function openWA(message) {
    const base = "https://wa.me/6285942116452?text=" + encodeURIComponent(message);
    window.open(base, "_blank");
}
document.querySelectorAll("[data-wa]").forEach(btn => {
    btn.addEventListener("click", () => {
        const msg = btn.getAttribute("data-wa") || "Halo, saya tertarik dengan paket WiFi.";
        openWA(msg);
    });
});

// === Coverage Checker ===
const WHATSAPP_NUMBER = "6285942116452";
const GOOGLE_SHEET_WEBAPP = "https://script.google.com/macros/s/XXXXXXXXXXXXXXXXXXXX/exec";
let currentLat = "";
let currentLng = "";

document.getElementById("btnGetLocation")?.addEventListener("click", () => {
    const loading = document.getElementById("gpsLoading");
    loading.classList.remove("hidden");
    if (!navigator.geolocation) {
        alert("Browser tidak support GPS");
        loading.classList.add("hidden");
        return;
    }
    navigator.geolocation.getCurrentPosition(
        async (position) => {
            currentLat = position.coords.latitude;
            currentLng = position.coords.longitude;
            document.getElementById("latitude").value = currentLat;
            document.getElementById("longitude").value = currentLng;
            try {
                const response = await fetch(`https://nominatim.openstreetmap.org/reverse?format=json&lat=${currentLat}&lon=${currentLng}`);
                const data = await response.json();
                const city = data.address.city || data.address.town || data.address.village || "";
                document.getElementById("city").value = city;
            } catch (err) { console.log(err); }
            document.getElementById("mapPreview").classList.remove("hidden");
            document.getElementById("mapFrame").src = `https://maps.google.com/maps?q=${currentLat},${currentLng}&z=15&output=embed`;
            loading.classList.add("hidden");
        },
        (error) => {
            loading.classList.add("hidden");
            alert("Gagal mengambil lokasi.");
            console.log(error);
        },
        { enableHighAccuracy: true, timeout: 15000, maximumAge: 0 }
    );
});

document.getElementById("btnCoverage")?.addEventListener("click", async () => {
    const city = document.getElementById("city").value;
    const address = document.getElementById("address").value;
    if (!city || !address) { alert("Mohon isi kota & alamat lengkap"); return; }
    let coverageStatus = "Unknown";
    try {
        const coverageAPI = await fetch(`https://nominatim.openstreetmap.org/search?q=${encodeURIComponent(address + " " + city)}&format=json`);
        const coverageData = await coverageAPI.json();
        coverageStatus = coverageData.length > 0 ? "Coverage Available" : "Area Not Found";
    } catch (err) { console.log(err); }
    try {
        await fetch(GOOGLE_SHEET_WEBAPP, {
            method: "POST", mode: "no-cors",
            headers: { "Content-Type": "application/json" },
            body: JSON.stringify({
                city, address, latitude: currentLat, longitude: currentLng, coverageStatus,
                mapsLink: `https://www.google.com/maps?q=${currentLat},${currentLng}`,
                createdAt: new Date().toISOString(),
            }),
        });
    } catch (err) { console.log(err); }
    const message = `Halo Admin XL SATU\n\nSaya ingin cek coverage area.\n\nKota: ${city}\nAlamat: ${address}\nLatitude: ${currentLat}\nLongitude: ${currentLng}\nGoogle Maps: https://www.google.com/maps?q=${currentLat},${currentLng}\nStatus Coverage: ${coverageStatus}`;
    window.open(`https://wa.me/${WHATSAPP_NUMBER}?text=${encodeURIComponent(message)}`, "_blank");
});

// === Billing Card Animation ===
const billingCard = document.querySelector(".xl-billing-card");
if (billingCard) {
    billingCard.style.opacity = "0";
    billingCard.style.transform = "translateY(30px)";
    billingCard.style.transition = ".8s ease";
    window.addEventListener("scroll", () => {
        const pos = billingCard.getBoundingClientRect().top;
        if (pos < window.innerHeight - 80) {
            billingCard.style.opacity = "1";
            billingCard.style.transform = "translateY(0)";
        }
    });
}

// === Feature Cards Animation ===
const featureCards = document.querySelectorAll(".xl-feature-card");
const featureObserver = new IntersectionObserver((entries) => {
    entries.forEach((entry) => {
        if (entry.isIntersecting) entry.target.classList.add("show-feature");
    });
}, { threshold: .2 });
featureCards.forEach((card, index) => {
    card.style.opacity = "0";
    card.style.transform = "translateY(40px)";
    card.style.transition = `all .7s ease ${index * .08}s`;
    featureObserver.observe(card);
});

// === Contact Card Hover ===
document.querySelectorAll(".xl-contact-card").forEach((card) => {
    card.addEventListener("mouseenter", () => { card.style.transform = "translateY(-6px) scale(1.01)"; });
    card.addEventListener("mouseleave", () => { card.style.transform = "translateY(0) scale(1)"; });
});
</script>
<style>.show-feature{opacity:1 !important;transform:translateY(0) !important;}</style>
@endpush

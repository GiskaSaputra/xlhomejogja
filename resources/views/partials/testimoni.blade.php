{{-- Testimoni --}}
<section id="testimoni" class="py-14 sm:py-20 bg-slate-50">
    <div class="max-w-6xl mx-auto px-4 sm:px-6">
        <div class="mb-8">
            <p class="text-brand-700 font-semibold tracking-wide uppercase text-xs">Testimoni</p>
            <h2 class="mt-2 text-2xl sm:text-3xl font-extrabold text-slate-900">Kata Mereka Tentang Kami</h2>
            <p class="mt-2 text-slate-600">Cerita singkat dari pelanggan yang sudah merasakan layanan kami.</p>
        </div>

        <div class="space-y-4">
            @php
            $testimonials = [
                ['name' => 'Anisa Putri', 'role' => 'UI/UX Designer', 'img' => 'https://images.unsplash.com/photo-1544005313-94ddf0286df2?q=80&w=400&auto=format&fit=crop', 'text' => '“Instalasi cepat, sinyal stabil di semua ruangan. Streaming dan WFH jalan bareng tanpa buffering.”'],
                ['name' => 'Raka Mahendra', 'role' => 'Content Creator', 'img' => 'https://images.unsplash.com/photo-1502685104226-ee32379fefbe?q=80&w=400&auto=format&fit=crop', 'text' => '“Timnya responsif. Paket Family cukup untuk 5 perangkat aktif + TV box, anak-anak happy nonton.”'],
                ['name' => 'Agung Wijaya', 'role' => 'Photographer', 'img' => 'https://storage.googleapis.com/workspace-0f70711f-8b4e-4d94-86f1-2a93ccde5887/image/66f2c7ac-8255-4693-8a1e-36b3763ca256.png', 'text' => '“Upgrade ke 150 Mbps bikin upload video kerjaan jauh lebih cepat. Worth it banget.”'],
                ['name' => 'Dwi Yuliana', 'role' => 'IT Support', 'img' => 'https://storage.googleapis.com/workspace-0f70711f-8b4e-4d94-86f1-2a93ccde5887/image/64ebc3be-7cee-4704-90d4-ce9d3ce5dc60.png', 'text' => '“CS ramah, proses pasang rapi. Coverage Wi-Fi makin luas setelah dibantu setting.”'],
            ];
            @endphp

            @foreach($testimonials as $t)
            <article class="bg-[#0f2c66] text-white rounded-2xl p-6 shadow-card">
                <div class="flex items-start gap-4">
                    <img class="w-12 h-12 rounded-full object-cover ring-2 ring-emerald-400" src="{{ $t['img'] }}" alt="{{ $t['name'] }}" />
                    <div class="flex-1">
                        <p class="text-xs italic text-white/90 leading-relaxed">{{ $t['text'] }}</p>
                        <div class="mt-3">
                            <p class="font-semibold">{{ $t['name'] }}</p>
                            <p class="text-xs text-white/70">{{ $t['role'] }}</p>
                        </div>
                    </div>
                </div>
            </article>
            @endforeach
        </div>

        <div class="mt-10">
            <a href="https://wa.me/6285942116452?text=Halo%2C%20saya%20siap%20berlangganan%20XL%20SATU.%20Mohon%20dipandu%20dari%20cek%20area%20hingga%20instalasi."
               target="_blank" rel="noopener"
               class="inline-flex items-center justify-center w-full sm:w-auto bg-brand-700 hover:bg-brand-800 text-white font-semibold px-6 py-3 rounded-xl shadow-card">
                Daftar Sekarang via WhatsApp
            </a>
        </div>
    </div>
</section>

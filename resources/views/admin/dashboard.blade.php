<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Dashboard CMS Poster — XL SATU</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700;800;900&display=swap" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-slate-900 text-slate-100 font-sans min-h-screen">

    {{-- Top Navbar --}}
    <header class="sticky top-0 z-50 bg-slate-950/80 backdrop-blur border-b border-white/10 px-4 sm:px-8 py-3.5 flex items-center justify-between">
        <div class="flex items-center gap-3">
            <div class="w-8 h-8 rounded-lg bg-brand-900 grid place-items-center text-white font-black text-xs">Xl</div>
            <div class="w-[2px] h-5 bg-white/20"></div>
            <div class="w-9 h-8 rounded-lg bg-emerald-500 grid place-items-center text-white font-black text-xs">Satu</div>
            <span class="ml-2 font-bold text-sm tracking-wide text-cyan-300 hidden sm:inline">CMS Poster Manager</span>
        </div>

        <div class="flex items-center gap-3">
            <a href="{{ url('/') }}" target="_blank"
               class="inline-flex items-center gap-1.5 px-3.5 py-1.5 rounded-lg bg-white/10 hover:bg-white/15 text-xs font-semibold text-slate-200 transition">
                <span>Lihat Web</span>
                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"/></svg>
            </a>

            <form method="POST" action="{{ route('admin.logout') }}">
                @csrf
                <button type="submit"
                        class="px-3.5 py-1.5 rounded-lg bg-rose-500/20 hover:bg-rose-500/30 text-rose-300 text-xs font-bold transition">
                    Keluar
                </button>
            </form>
        </div>
    </header>

    {{-- Main Container --}}
    <main class="max-w-7xl mx-auto px-4 sm:px-8 py-8">

        {{-- Page Heading --}}
        <div class="mb-8 flex flex-col md:flex-row md:items-center justify-between gap-4">
            <div>
                <h1 class="text-2xl sm:text-3xl font-black text-white">Kelola Poster &amp; Banner</h1>
                <p class="text-slate-400 text-sm mt-1">Ubah poster dan banner yang tampil di halaman depan. Anda dapat mengunggah file gambar langsung atau memasukkan URL gambar.</p>
            </div>
            <div>
                <button type="submit" form="postersForm"
                        class="inline-flex items-center gap-2 bg-gradient-to-r from-cyan-400 to-blue-500 hover:from-cyan-300 hover:to-blue-400 text-slate-950 font-black px-6 py-3 rounded-xl shadow-lg transition duration-200 cursor-pointer">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                    <span>Simpan Semua Perubahan</span>
                </button>
            </div>
        </div>

        {{-- Alerts --}}
        @if(session('success'))
            <div class="mb-6 p-4 rounded-2xl bg-emerald-500/10 border border-emerald-500/30 text-emerald-300 text-sm flex items-center justify-between">
                <div class="flex items-center gap-3">
                    <svg class="w-5 h-5 text-emerald-400 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                    <span>{{ session('success') }}</span>
                </div>
                <a href="{{ url('/') }}" target="_blank" class="underline text-xs text-emerald-300 font-bold">Cek Hasil di Landing Page &rarr;</a>
            </div>
        @endif

        {{-- Form Edit Posters --}}
        <form id="postersForm" method="POST" action="{{ route('admin.posters.update') }}" enctype="multipart/form-data">
            @csrf

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">

                @foreach($slots as $key => $slot)
                    @php
                        $isCustom = !empty($saved[$key]);
                        $currentUrl = $isCustom ? $saved[$key] : $slot['default'];
                    @endphp

                    <div class="bg-slate-950/60 border border-white/10 rounded-2xl p-5 flex flex-col justify-between hover:border-cyan-500/40 transition duration-200">
                        
                        <div>
                            {{-- Header Card --}}
                            <div class="flex items-start justify-between gap-2 mb-3">
                                <div>
                                    <span class="text-[10px] uppercase tracking-wider font-extrabold px-2.5 py-0.5 rounded-full bg-cyan-400/10 text-cyan-300 border border-cyan-400/20">
                                        {{ $slot['section'] }}
                                    </span>
                                    <h3 class="font-extrabold text-base text-white mt-1.5">{{ $slot['label'] }}</h3>
                                    <p class="text-slate-400 text-xs mt-0.5 leading-relaxed">{{ $slot['description'] }}</p>
                                </div>

                                @if($isCustom)
                                    <span class="shrink-0 text-[10px] font-bold px-2 py-0.5 rounded-full bg-emerald-500/20 text-emerald-300 border border-emerald-500/30">
                                        Custom
                                    </span>
                                @else
                                    <span class="shrink-0 text-[10px] font-bold px-2 py-0.5 rounded-full bg-slate-800 text-slate-400 border border-white/5">
                                        Default
                                    </span>
                                @endif
                            </div>

                            {{-- Image Preview --}}
                            <div class="relative rounded-xl overflow-hidden bg-slate-900 border border-white/10 mb-4 aspect-video flex items-center justify-center group">
                                <img src="{{ $currentUrl }}" alt="{{ $slot['label'] }}"
                                     id="preview_{{ $key }}"
                                     class="w-full h-full object-contain p-1">

                                <a href="{{ $currentUrl }}" target="_blank"
                                   class="absolute inset-0 bg-black/60 opacity-0 group-hover:opacity-100 transition flex items-center justify-center text-xs font-bold text-white gap-1.5 backdrop-blur-xs">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"/></svg>
                                    Buka Ukuran Penuh
                                </a>
                            </div>

                            {{-- Option 1: File Upload --}}
                            <div class="mb-3">
                                <label class="block text-xs font-semibold text-slate-300 mb-1">Upload File Baru</label>
                                <input type="file" name="file_{{ $key }}" accept="image/*"
                                       onchange="previewFile(event, 'preview_{{ $key }}')"
                                       class="w-full text-xs text-slate-400 file:mr-2 file:py-1.5 file:px-3 file:rounded-lg file:border-0 file:text-xs file:font-bold file:bg-cyan-500/20 file:text-cyan-300 hover:file:bg-cyan-500/30 file:cursor-pointer cursor-pointer">
                            </div>

                            {{-- Option 2: Image URL --}}
                            <div class="mb-3">
                                <label class="block text-xs font-semibold text-slate-300 mb-1">Atau Gunakan URL Gambar</label>
                                <input type="url" name="url_{{ $key }}"
                                       value="{{ $isCustom && !str_starts_with($saved[$key], '/uploads/') ? $saved[$key] : '' }}"
                                       placeholder="https://..."
                                       class="w-full text-xs rounded-lg bg-slate-900/80 border border-white/10 px-3 py-2 text-white placeholder-slate-600 outline-none focus:ring-1 focus:ring-cyan-400">
                            </div>
                        </div>

                        {{-- Reset Option --}}
                        @if($isCustom)
                            <div class="pt-3 border-t border-white/5 flex items-center justify-between">
                                <label class="flex items-center gap-2 cursor-pointer text-xs text-rose-300 hover:text-rose-200">
                                    <input type="checkbox" name="reset_{{ $key }}" value="1" class="rounded border-slate-700 text-rose-500 focus:ring-rose-500">
                                    <span>Reset ke gambar bawaan</span>
                                </label>
                            </div>
                        @endif

                    </div>
                @endforeach

            </div>

            {{-- Bottom Floating Bar --}}
            <div class="sticky bottom-4 mt-8 bg-slate-950/90 backdrop-blur-xl border border-white/10 rounded-2xl p-4 shadow-2xl flex items-center justify-between">
                <span class="text-xs text-slate-400 hidden sm:inline">Perubahan disimpan langsung ke file data tanpa database.</span>
                <button type="submit"
                        class="w-full sm:w-auto ml-auto inline-flex items-center justify-center gap-2 bg-gradient-to-r from-cyan-400 to-blue-500 hover:from-cyan-300 hover:to-blue-400 text-slate-950 font-black px-8 py-3 rounded-xl shadow-lg transition duration-200 cursor-pointer">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                    <span>Simpan Perubahan</span>
                </button>
            </div>
        </form>

    </main>

    <script>
    function previewFile(event, previewId) {
        const file = event.target.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = function(e) {
                const img = document.getElementById(previewId);
                if (img) img.src = e.target.result;
            };
            reader.readAsDataURL(file);
        }
    }
    </script>

</body>
</html>

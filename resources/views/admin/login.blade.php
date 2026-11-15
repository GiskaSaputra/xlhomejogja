<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login CMS — XL SATU</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700;800&display=swap" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-slate-950 text-white font-sans min-h-screen flex items-center justify-center p-4 relative overflow-hidden">

    {{-- Background Glow --}}
    <div class="absolute -top-32 -left-32 w-96 h-96 bg-cyan-500/15 rounded-full blur-3xl pointer-events-none"></div>
    <div class="absolute -bottom-32 -right-32 w-96 h-96 bg-blue-600/15 rounded-full blur-3xl pointer-events-none"></div>

    <div class="w-full max-w-md bg-white/5 backdrop-blur-xl border border-white/10 rounded-3xl p-8 shadow-2xl relative z-10">
        
        {{-- Header Logo --}}
        <div class="text-center mb-8">
            <div class="inline-flex items-center gap-3 mb-4">
                <div class="w-10 h-10 rounded-xl bg-brand-900 grid place-items-center text-white font-black text-sm">Xl</div>
                <div class="w-[2px] h-6 bg-white/20"></div>
                <div class="w-11 h-10 rounded-xl bg-emerald-500 grid place-items-center text-white font-black text-sm">Satu</div>
            </div>
            <h1 class="text-2xl font-black text-white">Panel CMS Poster</h1>
            <p class="text-slate-400 text-xs mt-1">Masuk untuk mengelola banner &amp; poster landing page</p>
        </div>

        {{-- Flash Messages --}}
        @if(session('error'))
            <div class="mb-5 p-4 rounded-xl bg-rose-500/10 border border-rose-500/20 text-rose-300 text-sm flex items-center gap-3">
                <svg class="w-5 h-5 shrink-0 text-rose-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
                <span>{{ session('error') }}</span>
            </div>
        @endif

        @if(session('success'))
            <div class="mb-5 p-4 rounded-xl bg-emerald-500/10 border border-emerald-500/20 text-emerald-300 text-sm flex items-center gap-3">
                <svg class="w-5 h-5 shrink-0 text-emerald-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                </svg>
                <span>{{ session('success') }}</span>
            </div>
        @endif

        {{-- Form Login --}}
        <form method="POST" action="{{ route('admin.login.submit') }}" class="space-y-4">
            @csrf

            <div>
                <label class="block text-xs font-bold text-slate-300 mb-1.5 uppercase tracking-wider">Username</label>
                <input type="text" name="username" value="{{ old('username') }}" required autofocus
                       class="w-full rounded-xl bg-white/10 border border-white/10 px-4 py-3 text-white placeholder-slate-500 text-sm outline-none focus:ring-2 focus:ring-cyan-400 focus:border-transparent transition"
                       placeholder="Masukkan username (.env)">
            </div>

            <div>
                <label class="block text-xs font-bold text-slate-300 mb-1.5 uppercase tracking-wider">Password</label>
                <input type="password" name="password" required
                       class="w-full rounded-xl bg-white/10 border border-white/10 px-4 py-3 text-white placeholder-slate-500 text-sm outline-none focus:ring-2 focus:ring-cyan-400 focus:border-transparent transition"
                       placeholder="Masukkan password (.env)">
            </div>

            <button type="submit"
                    class="w-full mt-2 bg-gradient-to-r from-cyan-400 to-blue-600 hover:from-cyan-300 hover:to-blue-500 text-slate-950 font-black py-3.5 px-6 rounded-xl shadow-lg transition duration-200">
                Masuk ke Panel
            </button>
        </form>

        <div class="mt-6 pt-5 border-t border-white/10 text-center">
            <a href="{{ url('/') }}" class="text-xs text-slate-400 hover:text-cyan-300 transition flex items-center justify-center gap-1.5">
                <span>&larr;</span> Kembali ke Website Utama
            </a>
        </div>

    </div>

</body>
</html>

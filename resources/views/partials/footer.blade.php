{{-- Footer --}}
<footer class="relative overflow-hidden bg-gradient-to-b from-[#04133b] to-[#020817] pt-16 pb-10 border-t border-white/10">
    <div class="absolute top-0 left-0 w-72 h-72 bg-cyan-400/10 blur-3xl rounded-full"></div>
    <div class="absolute bottom-0 right-0 w-72 h-72 bg-blue-500/10 blur-3xl rounded-full"></div>

    <div class="max-w-7xl mx-auto px-4 relative z-10">
        <div class="grid md:grid-cols-2 gap-10 items-center">
            <div>
                <div class="flex items-center gap-4 mb-5">
                    <div class="w-14 h-14 rounded-2xl bg-white/10 backdrop-blur-xl border border-white/10 flex items-center justify-center">📡</div>
                    <div>
                        <h3 class="text-2xl font-extrabold text-white">XL SATU</h3>
                        <p class="text-cyan-300 text-sm">Internet Rumah Modern</p>
                    </div>
                </div>
                <p class="text-slate-300 leading-relaxed max-w-md">Solusi internet rumah cepat, stabil dan modern untuk keluarga Indonesia.</p>
            </div>

            <div class="flex md:justify-end">
                <div class="flex items-center gap-5">
                    <a href="https://www.facebook.com/share/14yV5jpWqRa/" target="_blank" class="social-icon">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24"><path d="M22 12a10 10 0 1 0-11.56 9.88v-6.99H7.9V12h2.54V9.8c0-2.5 1.5-3.88 3.78-3.88 1.1 0 2.25.2 2.25.2v2.47h-1.27c-1.25 0-1.64.77-1.64 1.56V12h2.8l-.45 2.89h-2.35v6.99A10 10 0 0 0 22 12Z"/></svg>
                    </a>
                    <a href="https://www.instagram.com/xlsatufiberr" target="_blank" class="social-icon">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24"><path d="M7 2C4.24 2 2 4.24 2 7v10c0 2.76 2.24 5 5 5h10c2.76 0 5-2.24 5-5V7c0-2.76-2.24-5-5-5H7Zm10 2a3 3 0 0 1 3 3v10a3 3 0 0 1-3 3H7a3 3 0 0 1-3-3V7a3 3 0 0 1 3-3h10Zm-5 3.5A5.5 5.5 0 1 0 17.5 13 5.51 5.51 0 0 0 12 7.5Zm0 2A3.5 3.5 0 1 1 8.5 13 3.5 3.5 0 0 1 12 9.5Zm5.75-3a1.25 1.25 0 1 0 1.25 1.25A1.25 1.25 0 0 0 17.75 6.5Z"/></svg>
                    </a>
                    <a href="https://www.tiktok.com/" target="_blank" rel="noopener noreferrer" class="social-icon">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="w-6 h-6" fill="currentColor"><path d="M19.321 5.562a5.124 5.124 0 0 1-3.03-3.05A5.06 5.06 0 0 1 16.01 1h-4.02v14.16a2.91 2.91 0 0 1-2.92 2.91 2.91 2.91 0 0 1-2.91-2.91 2.91 2.91 0 0 1 2.91-2.91c.31 0 .61.05.89.14V8.28a7.1 7.1 0 0 0-.89-.06 6.94 6.94 0 1 0 6.94 6.94V8.04a9.05 9.05 0 0 0 5.29 1.7V5.73a5.1 5.1 0 0 1-1.98-.168Z"/></svg>
                    </a>
                    <a href="mailto:fadhilzul0328@gmail.com" class="social-icon">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24"><path d="M4 4h16a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V6a2 2 0 0 1 2-2Zm0 2v.01L12 13 20 6.01V6H4Zm16 12V8.24l-7.4 6.17a1 1 0 0 1-1.28 0L4 8.24V18h16Z"/></svg>
                    </a>
                </div>
            </div>
        </div>

        <div class="mt-14 pt-6 border-t border-white/10 text-center">
            <p class="text-slate-400 text-sm">
                &copy; {{ date('Y') }} XL SATU Promo — All Rights Reserved &bull; 
                <a href="{{ route('admin.login') }}" class="hover:text-cyan-400 transition ml-1 opacity-70 hover:opacity-100">Panel CMS</a>
            </p>
        </div>
    </div>
</footer>

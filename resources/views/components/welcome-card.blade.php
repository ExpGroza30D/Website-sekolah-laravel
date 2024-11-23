@php
    $headmaster = \App\Models\Headmaster::first();
@endphp

<div class="relative -mt-20 z-10 container mx-auto px-4">
    <div class="bg-white rounded-xl shadow-xl p-6 md:p-8 flex flex-col md:flex-row items-center gap-6 md:gap-8 transform hover:scale-[1.02] transition-all duration-300 animate-fadeIn">
        <!-- Image Container with Animation -->
        <div class="relative group">
            <div class="absolute -inset-0.5 bg-gradient-to-r from-blue-600 to-blue-400 rounded-full opacity-50 group-hover:opacity-100 blur transition duration-300"></div>
            <div class="relative">
                <img src="{{ $headmaster && $headmaster->image ? asset('storage/' . $headmaster->image) : 'https://i.pinimg.com/736x/64/55/c6/6455c63c5ca30010b5b06cc62adaf83a.jpg' }}" alt="{{ $headmaster?->name ?? 'Kepala Sekolah' }}"  class="rounded-full w-28 h-28 md:w-32 md:h-32 object-cover border-4 border-blue-100 transform group-hover:scale-105 transition duration-300" onerror="this.src='https://i.pinimg.com/736x/64/55/c6/6455c63c5ca30010b5b06cc62adaf83a.jpg'">
            </div>
        </div>

        <!-- Content Container -->
        <div class="text-center md:text-left space-y-3 md:space-y-4">
            <div class="flex flex-col md:flex-row items-center gap-2 md:gap-4">
                <h3 class="text-xl md:text-2xl font-bold text-gray-800">{{ $headmaster?->name ?? 'Nama Kepala Sekolah' }}</h3>
                <span class="px-4 py-1 bg-gradient-to-r from-blue-100 to-blue-50 text-blue-800 rounded-full text-sm font-medium shadow-sm">
                    {{ $headmaster?->title ?? 'Kepala Sekolah' }}
                </span>
            </div>
            
            <!-- Quote with decorative elements -->
            <div class="relative">
                <div class="absolute -left-2 -top-2 text-3xl text-blue-200 font-serif">"</div>
                <p class="text-gray-600 leading-relaxed px-4 md:px-0">
                    {{ $headmaster?->quote ?? 'Selamat datang di SMA 2 PSKD. Kami berkomitmen untuk memberikan pendidikan terbaik dan membentuk karakter siswa-siswi kami berdasarkan nilai-nilai Kristiani.' }}
                </p>
                <div class="absolute -right-2 -bottom-2 text-3xl text-blue-200 font-serif">"</div>
            </div>

            <!-- Decorative elements -->
            <div class="absolute -bottom-1 left-0 right-0 h-1 bg-gradient-to-r from-transparent via-blue-500 to-transparent opacity-20"></div>
        </div>
    </div>
</div>
@props(['galleries' => []])

<section id="galeri" class="relative bg-gradient-to-b from-gray-50 to-white py-12 md:py-20 overflow-hidden">
    <!-- Decorative Elements -->
    <div class="absolute inset-0 bg-[url('/img/grid.svg')] opacity-5"></div>
    <div class="absolute -left-4 top-1/2 -translate-y-1/2 w-16 md:w-24 h-16 md:h-24 bg-blue-500/10 rounded-full blur-2xl"></div>
    <div class="absolute -right-4 top-1/3 -translate-y-1/2 w-20 md:w-32 h-20 md:h-32 bg-blue-600/10 rounded-full blur-3xl"></div>

    <!-- Judul Galeri -->
    <div class="relative text-center mb-8 md:mb-16 px-4"> 
        <span class="absolute -top-6 left-1/2 -translate-x-1/2 text-6xl md:text-9xl text-blue-100 font-bold opacity-20">★</span>
        <h2 class="text-3xl md:text-5xl font-bold bg-gradient-to-r from-blue-600 to-blue-800 bg-clip-text text-transparent relative z-10 mb-4">
            Galeri Foto Sekolah
        </h2>
        <div class="flex items-center justify-center gap-2 md:gap-3">
            <span class="h-1 w-16 md:w-24 bg-gradient-to-r from-blue-500 to-blue-600 rounded-full"></span>
            <span class="h-2 w-2 bg-blue-500 rounded-full animate-pulse"></span>
            <span class="h-1 w-16 md:w-24 bg-gradient-to-l from-blue-500 to-blue-600 rounded-full"></span>
        </div>
        <p class="mt-4 md:mt-6 text-lg md:text-xl font-medium text-gray-700">Dokumentasi Kegiatan Sekolah</p>
        <p class="mt-2 max-w-2xl mx-auto text-sm md:text-base text-gray-600">
            Kumpulan foto-foto kegiatan, prestasi, dan momen berharga di SMA 2 PSKD
        </p>
    </div>

    <!-- Kontainer Galeri dengan Alpine.js -->
    <div 
        x-data="{ 
            activeCategory: 'semua',
            categories: [
                { id: 'semua', label: 'Semua Foto', icon: '🎯' },
                { id: 'kegiatan', label: 'Kegiatan Sekolah', icon: '🎓' },
                { id: 'prestasi', label: 'Prestasi Siswa', icon: '🏆' },
                { id: 'fasilitas', label: 'Fasilitas', icon: '🏫' },
                { id: 'ekstrakurikuler', label: 'Ekstrakurikuler', icon: '⚽' }
            ],
            items: @js($galleries),
            defaultImage: 'https://i.pinimg.com/736x/5f/93/73/5f9373cc2e4f4e219612ed4426923116.jpg',
            getImageUrl(imagePath) {
                if (!imagePath) return this.defaultImage;
                return imagePath.startsWith('http') ? imagePath : '/storage/' + imagePath;
            },
            shareItem(url) {
                if (navigator.share) {
                    navigator.share({
                        title: 'Bagikan Galeri',
                        url: url
                    });
                } else {
                    const tempInput = document.createElement('input');
                    tempInput.value = url;
                    document.body.appendChild(tempInput);
                    tempInput.select();
                    document.execCommand('copy');
                    document.body.removeChild(tempInput);
                    alert('URL telah disalin ke clipboard!');
                }
            }
        }" 
        class="container mx-auto px-4"
    >
        <!-- Filter Kategori -->
        <div class="overflow-x-auto pb-4 mb-8 md:mb-12 -mx-4 px-4 md:px-0 md:overflow-x-visible">
            <div class="flex items-center gap-2 md:gap-4 md:flex-wrap md:justify-center min-w-max md:min-w-0">
                <template x-for="category in categories" :key="category.id">
                    <button
                        @click="activeCategory = category.id"
                        :class="{
                            'bg-gradient-to-r from-blue-600 to-blue-700 text-white shadow-xl scale-105': activeCategory === category.id,
                            'bg-white text-gray-700 hover:bg-blue-50': activeCategory !== category.id
                        }"
                        class="group relative px-4 md:px-8 py-2 md:py-3 rounded-full text-sm font-medium 
                               transition-all duration-500 ease-out
                               transform hover:scale-105 hover:shadow-lg
                               focus:outline-none focus:ring-2 focus:ring-blue-400 focus:ring-opacity-50
                               active:scale-95 whitespace-nowrap"
                    >
                        <span class="relative z-10 flex items-center gap-2">
                            <span x-text="category.icon" class="text-base md:text-lg"></span>
                            <span x-text="category.label" class="text-xs md:text-sm"></span>
                        </span>
                    </button>
                </template>
            </div>
        </div>

        <!-- Grid Galeri -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-4 md:gap-8">
            <template x-for="item in items" :key="item.id">
                <div 
                    x-show="activeCategory === 'semua' || activeCategory === item.category"
                    x-transition:enter="transition ease-out duration-500"
                    x-transition:enter-start="opacity-0 transform translate-y-8"
                    x-transition:enter-end="opacity-100 transform translate-y-0"
                    class="group relative overflow-hidden rounded-xl shadow-lg hover:shadow-2xl transition-all duration-500"
                >
                    <div class="aspect-w-4 aspect-h-3 bg-gray-200 overflow-hidden">
                        <img
                            :src="getImageUrl(item.image)"
                            :alt="item.title"
                            class="w-full h-full object-cover transform transition-transform duration-700 group-hover:scale-110"
                            loading="lazy"
                        />
                        <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-black/30 to-transparent md:opacity-0 md:group-hover:opacity-100 transition-all duration-500">
                            <div class="absolute bottom-0 left-0 right-0 p-4 md:p-6 transform md:translate-y-6 md:group-hover:translate-y-0 transition-transform duration-500">
                                <h3 class="text-lg md:text-xl font-bold text-white mb-1 md:mb-2" x-text="item.title"></h3>
                                <p class="text-gray-300 text-xs md:text-sm" x-text="item.description"></p>
                                
                                <!-- Action Buttons -->
                                <div class="flex gap-2 md:gap-3 mt-3 md:mt-4 md:opacity-0 md:group-hover:opacity-100 transition-opacity duration-500 delay-100">
                                    <a :href="'/gallery/' + item.id" class="px-3 md:px-4 py-1.5 md:py-2 bg-white/20 hover:bg-white/30 backdrop-blur-sm rounded-full text-white text-xs md:text-sm transition-all duration-300">
                                        Lihat Detail
                                    </a>
                                    <button 
                                        @click="shareItem(window.location.origin + '/gallery/' + item.id)"
                                        class="p-1.5 md:p-2 bg-white/20 hover:bg-white/30 backdrop-blur-sm rounded-full text-white transition-all duration-300 flex items-center gap-1"
                                    >
                                        <svg class="w-4 h-4 md:w-5 md:h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.684 13.342C8.886 12.938 9 12.482 9 12c0-.482-.114-.938-.316-1.342m0 2.684a3 3 0 110-2.684m0 2.684l6.632 3.316m-6.632-6l6.632-3.316m0 0a3 3 0 105.367-2.684 3 3 0 00-5.367 2.684zm0 9.316a3 3 0 105.368 2.684 3 3 0 00-5.368-2.684z"/>
                                        </svg>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </template>
        </div>
    </div>
</section>
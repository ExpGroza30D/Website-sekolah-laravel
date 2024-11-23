<x-app-layout>
    <div class="min-h-screen bg-gradient-to-br from-blue-50 via-white to-purple-50">
        <div class="py-16 px-4 sm:px-6 lg:px-8">
            <div class="max-w-7xl mx-auto">
                <!-- Hero Section with enhanced animation -->
                <div class="text-center mb-20 space-y-6 animate-fade-in">
                    <h1 class="text-5xl md:text-6xl font-bold bg-clip-text text-transparent bg-gradient-to-r from-blue-600 to-purple-600 mb-6">
                        Blog
                    </h1>
                    <p class="text-xl text-gray-600 max-w-2xl mx-auto leading-relaxed">
                        Informasi terbaru seputar kegiatan dan prestasi sekolah
                    </p>
                    
                    <a href="{{ route('welcome') }}" 
                       class="inline-flex items-center px-8 py-4 bg-gradient-to-r from-blue-600 to-purple-600 text-white rounded-full hover:from-blue-700 hover:to-purple-700 transition-all duration-300 transform hover:scale-105 shadow-lg hover:shadow-xl group">
                        <svg xmlns="http://www.w3.org/2000/svg" 
                             class="h-5 w-5 mr-3 transform transition-transform group-hover:-translate-x-2" 
                             viewBox="0 0 20 20" 
                             fill="currentColor">
                            <path fill-rule="evenodd" d="M9.707 16.707a1 1 0 01-1.414 0l-6-6a1 1 0 010-1.414l6-6a1 1 0 011.414 1.414L5.414 9H17a1 1 0 110 2H5.414l4.293 4.293a1 1 0 010 1.414z" clip-rule="evenodd" />
                        </svg>
                        Kembali ke Halaman Utama
                    </a>
                </div>

                <!-- Announcements with glass morphism -->
                @if($announcements->count() > 0)
                    <div class="mb-20">
                        <h2 class="text-3xl font-bold text-gray-900 mb-10 flex items-center">
                            <span class="w-12 h-12 bg-blue-100 rounded-full flex items-center justify-center mr-4">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-blue-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5.882V19.24a1.76 1.76 0 01-3.417.592l-2.147-6.15M18 13a3 3 0 100-6M5.436 13.683A4.001 4.001 0 017 6h1.832c4.1 0 7.625-1.234 9.168-3v14c-1.543-1.766-5.067-3-9.168-3H7a3.988 3.988 0 01-1.564-.317z" />
                                </svg>
                            </span>
                            Pengumuman Terbaru
                        </h2>
                        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                            @foreach($announcements as $announcement)
                                <div class="backdrop-blur-lg bg-white/80 rounded-3xl shadow-xl overflow-hidden hover:shadow-2xl transition-all duration-500 transform hover:-translate-y-2 border border-gray-100">
                                    <div class="p-8">
                                        <div class="flex items-center mb-6">
                                            <div class="h-12 w-12 rounded-full bg-gradient-to-br from-blue-100 to-purple-100 flex items-center justify-center mr-4">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-blue-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9" />
                                                </svg>
                                            </div>
                                            <h3 class="text-xl font-bold text-gray-900 line-clamp-2">{{ $announcement->title }}</h3>
                                        </div>
                                        <p class="text-gray-600 mb-6 line-clamp-3">{{ strip_tags($announcement->content) }}</p>
                                        <a href="{{ route('blog.show', $announcement->id) }}" 
                                           class="inline-flex items-center text-blue-600 hover:text-purple-600 font-medium transition-colors duration-300 group">
                                            Baca selengkapnya
                                            <svg xmlns="http://www.w3.org/2000/svg" 
                                                 class="h-5 w-5 ml-2 transform transition-transform group-hover:translate-x-2" 
                                                 viewBox="0 0 20 20" 
                                                 fill="currentColor">
                                                <path fill-rule="evenodd" d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z" clip-rule="evenodd" />
                                            </svg>
                                        </a>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                @endif    
            </div>
        </div>
    </div>
</x-app-layout>
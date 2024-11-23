
<section id="kontak" class="relative bg-gradient-to-b from-gray-50 to-white py-20 overflow-hidden">
    <!-- Decorative Elements -->
    <div class="absolute inset-0 bg-[url('/img/grid.svg')] opacity-5"></div>
    <div class="absolute -left-4 top-1/2 -translate-y-1/2 w-24 h-24 bg-blue-500/10 rounded-full blur-2xl"></div>
    <div class="absolute -right-4 top-1/3 -translate-y-1/2 w-32 h-32 bg-blue-600/10 rounded-full blur-3xl"></div>

    <!-- Section Header -->
    <div class="text-center mb-16 relative">
        <h2 class="text-5xl font-bold bg-gradient-to-r from-blue-600 to-blue-800 bg-clip-text text-transparent relative z-10 mb-4">
            Hubungi Kami
        </h2>
        <div class="flex items-center justify-center gap-3">
            <span class="h-1 w-24 bg-gradient-to-r from-blue-500 to-blue-600 rounded-full"></span>
            <span class="h-2 w-2 bg-blue-500 rounded-full animate-pulse"></span>
            <span class="h-1 w-24 bg-gradient-to-l from-blue-500 to-blue-600 rounded-full"></span>
        </div>
        <p class="mt-6 text-xl text-gray-600 max-w-2xl mx-auto">
            Kami siap melayani dan menjawab pertanyaan Anda
        </p>
    </div>

    <div class="container mx-auto px-4">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-12 items-start">
            <!-- Contact Information -->
            <div class="space-y-8 animate-fadeIn">
                <!-- School Address -->
                <div class="bg-white rounded-xl p-6 shadow-lg hover:shadow-xl transition-shadow duration-300 transform hover:-translate-y-1">
                    <div class="flex items-start gap-4">
                        <div class="p-3 bg-blue-50 rounded-lg">
                            <i class="fas fa-map-marker-alt text-2xl text-blue-600"></i>
                        </div>
                        <div>
                            <h3 class="text-xl font-semibold text-gray-800 mb-2">Lokasi Kami</h3>
                            <p class="text-gray-600 leading-relaxed">
                                Jl. Slamet Riyadi No.3, RT.1/RW.4, Kb. Manggis, Matraman, 
                                Kota Jakarta Timur, Daerah Khusus Ibukota Jakarta 13150
                            </p>
                        </div>
                    </div>
                </div>

                <!-- Contact Details -->
                <div class="bg-white rounded-xl p-6 shadow-lg hover:shadow-xl transition-shadow duration-300 transform hover:-translate-y-1">
                    <div class="flex items-start gap-4">
                        <div class="p-3 bg-blue-50 rounded-lg">
                            <i class="fas fa-phone-alt text-2xl text-blue-600"></i>
                        </div>
                        <div>
                            <h3 class="text-xl font-semibold text-gray-800 mb-2">Hubungi Kami</h3>
                            <p class="text-gray-600">(021) 8580342</p>
                            <p class="text-gray-600">info@sma2pskd.sch.id</p>
                        </div>
                    </div>
                </div>

                <!-- Social Media -->
                <div class="bg-white rounded-xl p-6 shadow-lg hover:shadow-xl transition-shadow duration-300 transform hover:-translate-y-1">
                    <h3 class="text-xl font-semibold text-gray-800 mb-4">Media Sosial</h3>
                    <div class="grid grid-cols-2 gap-4">
                        @foreach([
                            ['Instagram', 'fab fa-instagram', '#'],
                            ['Facebook', 'fab fa-facebook-f', '#'],
                            ['Twitter', 'fab fa-twitter', '#'],
                            ['YouTube', 'fab fa-youtube', '#']
                        ] as [$name, $icon, $link])
                            <a href="{{ $link }}" 
                               class="flex items-center gap-3 p-3 rounded-lg hover:bg-blue-50 transition-colors duration-300 group">
                                <i class="{{ $icon }} text-xl text-blue-600 group-hover:scale-110 transition-transform duration-300"></i>
                                <span class="text-gray-700">{{ $name }}</span>
                            </a>
                        @endforeach
                    </div>
                </div>
            </div>

            <!-- Map Section -->
            <div class="relative h-[500px] rounded-xl overflow-hidden shadow-xl animate-fadeIn delay-200">
                <iframe 
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3966.3093559741054!2d106.85659067454244!3d-6.2215069937226085!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69f3f3d3933333%3A0x9f3f3f3f3f3f3f3f!2sSMA%202%20PSKD!5e0!3m2!1sen!2sid!4v1620000000000!5m2!1sen!2sid" 
                    class="w-full h-full border-0"
                    allowfullscreen="" 
                    loading="lazy"
                ></iframe>
                <!-- Overlay for hover effect -->
                <div class="absolute inset-0 bg-gradient-to-t from-black/20 to-transparent opacity-0 hover:opacity-100 transition-opacity duration-300"></div>
            </div>
        </div>
    </div>
</section>
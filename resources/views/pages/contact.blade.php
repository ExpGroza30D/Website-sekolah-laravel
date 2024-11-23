<x-app-layout>
    <div class="py-12 bg-gradient-to-b from-gray-50 to-white">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <!-- Header Section -->
            <div class="text-center mb-12">
                <h1 class="text-4xl font-bold text-gray-900 mb-4">Hubungi Kami</h1>
                <p class="text-lg text-gray-600 max-w-2xl mx-auto">Kami siap membantu menjawab pertanyaan dan informasi yang Anda butuhkan</p>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
                <!-- Contact Information -->
                <div class="bg-white rounded-xl shadow-md p-8">
                    <h2 class="text-2xl font-semibold text-gray-900 mb-6">Informasi Kontak</h2>
                    
                    <div class="space-y-6">
                        @foreach([
                            ['Alamat', 'Jl. --------', 'M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z M15 11a3 3 0 11-6 0 3 3 0 016 0z'],
                            ['Telepon', '(021) -------', 'M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z'],
                            ['Email', 'info@sma2pskd.sch.id', 'M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z'],
                            ['Jam Operasional', 'Senin - Jumat: 07:00 - 15:00', 'M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z']
                        ] as [$title, $content, $path])
                            <div class="flex items-start space-x-4">
                                <div class="w-10 h-10 bg-blue-100 rounded-lg flex items-center justify-center flex-shrink-0">
                                    <svg class="w-5 h-5 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="{{ $path }}"/>
                                    </svg>
                                </div>
                                <div>
                                    <h3 class="font-medium text-gray-900">{{ $title }}</h3>
                                    <p class="text-gray-600">{{ $content }}</p>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>

                <!-- Map Section -->
                <div class="bg-white rounded-xl shadow-md p-8">
                    <h2 class="text-2xl font-semibold text-gray-900 mb-6">Lokasi Kami</h2>
                    <div class="aspect-video bg-gray-100 rounded-lg overflow-hidden">
                        <iframe 
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3966.3948449537534!2d106.85624697323912!3d-6.211542160839147!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69f47eaa8c772d%3A0x5f8aea2035ffd79!2sSMA%202%20PSKD!5e0!3m2!1sen!2sid!4v1731789307219!5m2!1sen!2sid" 
                            class="w-full h-full border-0"
                            allowfullscreen="" 
                            loading="lazy"
                        ></iframe>
                    </div>
                </div>
            </div>

            <!-- Social Media Links -->
            <div class="mt-12 bg-blue-50 rounded-xl p-8">
                <h2 class="text-2xl font-semibold text-center text-gray-900 mb-6">Ikuti Kami</h2>
                <div class="flex justify-center space-x-6">
                    @foreach([
                        ['Facebook', 'fab fa-facebook-f', '#'],
                        ['Twitter', 'fab fa-twitter', '#'],
                        ['Instagram', 'fab fa-instagram', '#'],
                        ['YouTube', 'fab fa-youtube', '#']
                    ] as [$name, $icon, $link])
                        <a href="{{ $link }}" class="w-12 h-12 bg-white rounded-full flex items-center justify-center shadow-md hover:shadow-lg transition-shadow">
                            <i class="{{ $icon }} text-blue-600"></i>
                        </a>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
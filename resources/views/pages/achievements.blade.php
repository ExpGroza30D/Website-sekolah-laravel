<x-app-layout>
    <div class="py-12 bg-gradient-to-b from-gray-50 to-white">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <!-- Header Section -->
            <div class="text-center mb-12">
                <h1 class="text-4xl font-bold text-gray-900 mb-4">Prestasi Siswa</h1>
                <p class="text-lg text-gray-600 max-w-2xl mx-auto">Pencapaian membanggakan dari para siswa/i SMA 2 PSKD dalam berbagai bidang akademik dan non-akademik</p>
            </div>

            <!-- Achievement Categories -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8 mb-12">
                @foreach([
                    ['Akademik', 'Prestasi dalam olimpiade sains, matematika, dan kompetisi akademik lainnya', 'M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15'],
                    ['Non-Akademik', 'Prestasi dalam bidang olahraga, seni, dan ekstrakurikuler', 'M13 10V3L4 14h7v7l9-11h-7z'],
                    ['Kompetisi', 'Prestasi dalam berbagai kompetisi tingkat regional dan nasional', 'M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z']
                ] as [$title, $desc, $path])
                    <div class="bg-white rounded-xl shadow-md p-6 hover:shadow-lg transition-shadow">
                        <div class="w-12 h-12 bg-blue-100 rounded-lg flex items-center justify-center mb-4">
                            <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="{{ $path }}"/>
                            </svg>
                        </div>
                        <h3 class="text-xl font-semibold text-gray-900 mb-2">{{ $title }}</h3>
                        <p class="text-gray-600">{{ $desc }}</p>
                    </div>
                @endforeach
            </div>

            <!-- Coming Soon Message -->
            <div class="bg-blue-50 border border-blue-200 rounded-xl p-8 text-center">
                <svg class="w-16 h-16 text-blue-500 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                </svg>
                <h2 class="text-2xl font-bold text-gray-900 mb-2">Segera Hadir!</h2>
                <p class="text-gray-600 max-w-lg mx-auto">
                    Kami sedang mengumpulkan dan menyusun data prestasi terbaru dari siswa/i kami. 
                    Halaman ini akan segera diperbarui dengan informasi lengkap mengenai pencapaian membanggakan mereka.
                </p>
            </div>
        </div>
    </div>
</x-app-layout>
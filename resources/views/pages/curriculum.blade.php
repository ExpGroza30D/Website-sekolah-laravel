<x-app-layout>
    <div class="py-12 bg-gradient-to-b from-gray-50 to-white">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <!-- Header Section -->
            <div class="text-center mb-12">
                <h1 class="text-4xl font-bold text-gray-900 mb-4">Kurikulum</h1>
                <p class="text-lg text-gray-600 max-w-2xl mx-auto">Program pembelajaran komprehensif untuk mengembangkan potensi siswa</p>
            </div>

            <!-- Curriculum Overview -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 mb-12">
                @foreach([
                    ['Kurikulum Merdeka', 'Mengikuti standar Kurikulum Merdeka dengan pendekatan pembelajaran yang berpusat pada siswa', 'M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253'],
                    ['Program Unggulan', 'Program khusus untuk mengembangkan bakat dan minat siswa dalam berbagai bidang', 'M19.428 15.428a2 2 0 00-1.022-.547l-2.387-.477a6 6 0 00-3.86.517l-.318.158a6 6 0 01-3.86.517L6.05 15.21a2 2 0 00-1.806.547M8 4h8l-1 1v5.172a2 2 0 00.586 1.414l5 5c1.26 1.26.367 3.414-1.415 3.414H4.828c-1.782 0-2.674-2.154-1.414-3.414l5-5A2 2 0 009 10.172V5L8 4z'],
                    ['Ekstrakurikuler', 'Berbagai kegiatan ekstrakurikuler untuk mengembangkan soft skills dan karakter', 'M13 10V3L4 14h7v7l9-11h-7z']
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
                <h2 class="text-2xl font-bold text-gray-900 mb-2">Informasi Lengkap Segera Hadir!</h2>
                <p class="text-gray-600 max-w-lg mx-auto">
                    Kami sedang menyiapkan informasi detail mengenai kurikulum dan program pembelajaran. 
                    Halaman ini akan segera diperbarui dengan konten lengkap mengenai sistem pembelajaran di SMA 2 PSKD.
                </p>
            </div>
        </div>
    </div>
</x-app-layout>
@php
    $teachers = \App\Models\Teacher::all();
@endphp

<section id="profil"
    class="relative py-12 md:py-20 bg-gradient-to-b from-white via-blue-50/50 to-white overflow-hidden"
    x-data="{
        currentIndex: 0,
        itemsPerPage: window.innerWidth >= 1024 ? 3 : window.innerWidth >= 768 ? 2 : 1,
        teachers: {{ $teachers->map(function($teacher) {
            return [
                'id' => $teacher->id,
                'name' => $teacher->name,
                'title' => $teacher->title,
                'imgSrc' => $teacher->image ? asset('storage/' . $teacher->image) : 'https://i.pinimg.com/736x/58/35/e7/5835e7271bf39b2dd6e380fa48d4e597.jpg',
                'description' => $teacher->description,
                'facebook_url' => $teacher->facebook_url,
                'twitter_url' => $teacher->twitter_url,
                'instagram_url' => $teacher->instagram_url,
            ];
        })->toJson() }}
    }"
    x-init="
        window.addEventListener('resize', () => {
            itemsPerPage = window.innerWidth >= 1024 ? 3 : window.innerWidth >= 768 ? 2 : 1;
            currentIndex = Math.min(currentIndex, teachers.length - itemsPerPage);
        })
    "
    x-cloak>
    
    <!-- Decorative Background Elements -->
    <div class="absolute inset-0 bg-[url('/img/grid.svg')] opacity-10"></div>
    <div class="absolute -left-4 top-1/2 -translate-y-1/2 w-16 md:w-24 h-16 md:h-24 bg-blue-500/10 rounded-full blur-2xl"></div>
    <div class="absolute -right-4 top-1/3 -translate-y-1/2 w-20 md:w-32 h-20 md:h-32 bg-blue-600/10 rounded-full blur-3xl"></div>

    <!-- Section Header -->
    <div class="text-center mb-8 md:mb-16 relative px-4">
        <span class="absolute -top-6 left-1/2 -translate-x-1/2 text-7xl md:text-9xl text-blue-100 font-bold opacity-20">★</span>
        <h2 class="text-3xl md:text-5xl font-bold bg-gradient-to-r from-blue-600 to-blue-800 bg-clip-text text-transparent relative z-10 mb-4">
            Profil Guru Kami
        </h2>
        <div class="flex items-center justify-center gap-2 md:gap-3">
            <span class="h-1 w-16 md:w-24 bg-gradient-to-r from-blue-500 to-blue-600 rounded-full"></span>
            <span class="h-2 w-2 bg-blue-500 rounded-full animate-pulse"></span>
            <span class="h-1 w-16 md:w-24 bg-gradient-to-l from-blue-500 to-blue-600 rounded-full"></span>
        </div>
        <p class="max-w-2xl mx-auto mt-4 md:mt-6 text-gray-600 text-base md:text-lg px-4">
            Tim pengajar profesional kami siap membimbing siswa menuju kesuksesan akademik
        </p>
    </div>

    <!-- Teacher Cards Container -->
    <div class="container mx-auto px-4">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4 md:gap-8">
            <template x-for="(teacher, index) in teachers.slice(currentIndex, currentIndex + itemsPerPage)" :key="teacher.id">
                <div 
                    class="group relative overflow-hidden rounded-xl bg-white shadow-xl transition-all duration-300 hover:shadow-2xl hover:-translate-y-2"
                    :style="'animation-delay: ' + (index * 100) + 'ms'"
                >
                    <div class="aspect-[3/4] md:aspect-[4/5] overflow-hidden">
                        <img 
                            :src="teacher.imgSrc" 
                            :alt="teacher.name"
                            class="h-full w-full object-cover transition-transform duration-700 group-hover:scale-110"
                            onerror="this.src='https://placehold.co/400x500'"
                        >
                        <!-- Overlay -->
                        <div class="absolute inset-0 bg-gradient-to-t from-black/90 via-black/50 to-transparent md:opacity-0 group-hover:opacity-100 transition-all duration-500">
                            <div class="absolute bottom-0 left-0 right-0 p-4 md:p-8 md:translate-y-6 md:group-hover:translate-y-0 transition-transform duration-500">
                                <h3 class="text-xl md:text-2xl font-bold text-white mb-2" x-text="teacher.name"></h3>
                                <p class="text-blue-300 font-medium mb-2 md:mb-4" x-text="teacher.title"></p>
                                <p class="text-gray-300 text-sm md:text-base" x-text="teacher.description"></p>
                                
                                <!-- Social Media Icons -->
                                <div class="flex gap-3 md:gap-4 mt-4 md:mt-6 md:opacity-0 group-hover:opacity-100 transition-opacity duration-700 delay-200">
                                    <template x-if="teacher.facebook_url">
                                        <a :href="teacher.facebook_url" class="text-white hover:text-blue-400 transition-colors">
                                            <svg class="w-5 h-5 md:w-6 md:h-6" fill="currentColor" viewBox="0 0 24 24">
                                                <path d="M22 12c0-5.523-4.477-10-10-10S2 6.477 2 12c0 4.991 3.657 9.128 8.438 9.878v-6.987h-2.54V12h2.54V9.797c0-2.506 1.492-3.89 3.777-3.89 1.094 0 2.238.195 2.238.195v2.46h-1.26c-1.243 0-1.63.771-1.63 1.562V12h2.773l-.443 2.89h-2.33v6.988C18.343 21.128 22 16.991 22 12z"/>
                                            </svg>
                                        </a>
                                    </template>
                                    <template x-if="teacher.twitter_url">
                                        <a :href="teacher.twitter_url" class="text-white hover:text-blue-400 transition-colors">
                                            <svg class="w-5 h-5 md:w-6 md:h-6" fill="currentColor" viewBox="0 0 24 24">
                                                <path d="M12 2C6.477 2 2 6.477 2 12c0 5.523 4.477 10 10 10s10-4.477 10-10c0-5.523-4.477-10-10-10zm5.23 15.23l-1.88-1.88c-.14.08-.29.15-.45.19v2.34c-.65.09-1.3.12-1.95.12s-1.3-.03-1.95-.12v-2.34c-.16-.04-.31-.11-.45-.19l-1.88 1.88c-.51-.37-1-.8-1.42-1.28l1.88-1.88c-.08-.14-.15-.29-.19-.45H6.12c-.09-.65-.12-1.3-.12-1.95s.03-1.3.12-1.95h2.34c.04-.16.11-.31.19-.45L6.77 7.77c.42-.48.91-.91 1.42-1.28l1.88 1.88c.14-.08.29-.15.45-.19V5.84c.65-.09 1.3-.12 1.95-.12s1.3.03 1.95.12v2.34c.16.04.31.11.45.19l1.88-1.88c.51.37 1 .8 1.42 1.28l-1.88 1.88c.08.14.15.29.19.45h2.34c.09.65.12 1.3.12 1.95s-.03 1.3-.12 1.95h-2.34c-.04.16-.11.31-.19.45l1.88 1.88c-.42.48-.91.91-1.42 1.28z"/>
                                            </svg>
                                        </a>
                                    </template>
                                    <template x-if="teacher.instagram_url">
                                        <a :href="teacher.instagram_url" class="text-white hover:text-blue-400 transition-colors">
                                            <svg class="w-5 h-5 md:w-6 md:h-6" fill="currentColor" viewBox="0 0 24 24">
                                                <path d="M7.8 2h8.4C19.4 2 22 4.6 22 7.8v8.4a5.8 5.8 0 0 1-5.8 5.8H7.8C4.6 22 2 19.4 2 16.2V7.8A5.8 5.8 0 0 1 7.8 2m-.2 2A3.6 3.6 0 0 0 4 7.6v8.8C4 18.39 5.61 20 7.6 20h8.8a3.6 3.6 0 0 0 3.6-3.6V7.6C20 5.61 18.39 4 16.4 4H7.6m9.65 1.5a1.25 1.25 0 0 1 1.25 1.25A1.25 1.25 0 0 1 17.25 8 1.25 1.25 0 0 1 16 6.75a1.25 1.25 0 0 1 1.25-1.25M12 7a5 5 0 0 1 5 5 5 5 0 0 1-5 5 5 5 0 0 1-5-5 5 5 0 0 1 5-5m0 2a3 3 0 0 0-3 3 3 3 0 0 0 3 3 3 3 0 0 0 3-3 3 3 0 0 0-3-3z"/>
                                            </svg>
                                        </a>
                                    </template>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </template>
        </div>

        <!-- Navigation Buttons -->
        <div class="flex flex-col sm:flex-row justify-center items-center gap-4 mt-8 md:mt-12">
            <button 
                @click="currentIndex = Math.max(0, currentIndex - itemsPerPage)"
                class="w-full sm:w-auto group relative px-4 md:px-6 py-2 md:py-3 font-medium text-white transition-colors duration-300 disabled:opacity-50"
                :class="currentIndex === 0 ? 'opacity-50 cursor-not-allowed' : 'hover:text-blue-500'"
                :disabled="currentIndex === 0"
            >
                <span class="absolute inset-0 w-full h-full transition-transform duration-300 transform -translate-x-2 -translate-y-2 bg-blue-600 ease"></span>
                <span class="absolute inset-0 w-full h-full border-4 border-black"></span>
                <span class="relative flex items-center justify-center gap-2">
                    <svg class="w-4 h-4 md:w-5 md:h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/>
                    </svg>
                    Previous
                </span>
            </button>

            <div class="flex gap-2">
                <template x-for="(_, index) in Math.ceil(teachers.length / itemsPerPage)" :key="index">
                    <button 
                        @click="currentIndex = index * itemsPerPage"
                        class="w-2 h-2 md:w-3 md:h-3 rounded-full transition-colors duration-300"
                        :class="currentIndex === index * itemsPerPage ? 'bg-blue-600' : 'bg-gray-300 hover:bg-blue-400'"
                    ></button>
                </template>
            </div>

            <button 
                @click="currentIndex = Math.min(teachers.length - itemsPerPage, currentIndex + itemsPerPage)"
                class="w-full sm:w-auto group relative px-4 md:px-6 py-2 md:py-3 font-medium text-white transition-colors duration-300 disabled:opacity-50"
                :class="currentIndex >= teachers.length - itemsPerPage ? 'opacity-50 cursor-not-allowed' : 'hover:text-blue-500'"
                :disabled="currentIndex >= teachers.length - itemsPerPage"
            >
                <span class="absolute inset-0 w-full h-full transition-transform duration-300 transform -translate-x-2 -translate-y-2 bg-blue-600 ease"></span>
                <span class="absolute inset-0 w-full h-full border-4 border-black"></span>
                <span class="relative flex items-center justify-center gap-2">
                    Next
                    <svg class="w-4 h-4 md:w-5 md:h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                    </svg>
                </span>
            </button>
        </div>
    </div>
</section>
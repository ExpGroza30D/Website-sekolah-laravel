@php
    $visionMission = App\Models\VisionMission::where('is_active', true)->first();
@endphp

@if($visionMission)
<section id="visi-misi" 
    class="relative bg-gradient-to-b from-white via-blue-50 to-white py-12 md:py-24 overflow-hidden"
    x-data="{
        currentIndex: 0,
        items: [
            { 
                title: '{{ $visionMission->vision_title }}', 
                content: '{{ $visionMission->vision_content }}',
                imgSrc: '{{ Storage::url($visionMission->vision_image) }}'
            },
            { 
                title: '{{ $visionMission->mission_title }}',
                content: '{{ $visionMission->mission_content }}',
                imgSrc: '{{ Storage::url($visionMission->mission_image) }}'
            }
        ],
        isHovered: false,
        blob: {
            x: 0,
            y: 0
        }
    }"
    x-cloak>
    
    <!-- Animated Background Blobs -->
    <div class="absolute inset-0 overflow-hidden pointer-events-none">
        <div class="absolute -top-32 -left-32 w-64 h-64 bg-blue-200 rounded-full mix-blend-multiply filter blur-xl opacity-30 animate-blob"></div>
        <div class="absolute -bottom-32 -right-32 w-64 h-64 bg-purple-200 rounded-full mix-blend-multiply filter blur-xl opacity-30 animate-blob animation-delay-2000"></div>
        <div class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 w-64 h-64 bg-pink-200 rounded-full mix-blend-multiply filter blur-xl opacity-30 animate-blob animation-delay-4000"></div>
    </div>

    <!-- Enhanced Background Pattern with Parallax -->
    <div class="absolute inset-0 bg-[url('/img/grid.svg')] opacity-5"
         x-ref="pattern"
         @mousemove="
            if ($event.clientX && $event.clientY) {
                blob.x = ($event.clientX - window.innerWidth/2) * 0.02;
                blob.y = ($event.clientY - window.innerHeight/2) * 0.02;
                $refs.pattern.style.transform = `translate(${blob.x}px, ${blob.y}px)`;
            }
         "></div>
    
    <div class="container mx-auto px-4">
        <!-- Enhanced Header Section with 3D Effect -->
        <div class="text-center mb-12 md:mb-20 relative px-4 transform-gpu"
             x-intersect="$el.classList.add('animate-fade-in-up')">
            <div class="absolute inset-0 flex items-center justify-center">
                <div class="w-[400px] h-[400px] bg-gradient-to-br from-blue-200/40 to-purple-200/40 rounded-full filter blur-3xl opacity-30 animate-pulse"></div>
            </div>
            
            <h2 class="text-5xl md:text-7xl font-bold relative z-10 mb-6 transform transition-all duration-500 hover:scale-105">
                <span class="bg-gradient-to-r from-blue-600 via-purple-500 to-pink-500 bg-clip-text text-transparent
                           hover:from-blue-500 hover:via-purple-400 hover:to-pink-400 transition-all duration-300">
                    Visi & Misi
                </span>
            </h2>
            
            <!-- Enhanced Decorative Elements -->
            <div class="flex items-center justify-center gap-3 md:gap-4">
                <span class="h-1.5 w-24 md:w-32 bg-gradient-to-r from-blue-500 to-purple-500 rounded-full transform hover:scale-x-110 transition-transform"></span>
                <div class="flex space-x-1.5">
                    <span class="h-2.5 w-2.5 bg-blue-500 rounded-full animate-ping"></span>
                    <span class="h-2.5 w-2.5 bg-purple-500 rounded-full animate-ping" style="animation-delay: 0.2s"></span>
                    <span class="h-2.5 w-2.5 bg-pink-500 rounded-full animate-ping" style="animation-delay: 0.4s"></span>
                </div>
                <span class="h-1.5 w-24 md:w-32 bg-gradient-to-l from-purple-500 to-pink-500 rounded-full transform hover:scale-x-110 transition-transform"></span>
            </div>
        </div>

        <!-- Enhanced Content Section with Glass Effect -->
        <div class="flex flex-col lg:flex-row items-center gap-12 md:gap-20 relative">
            <!-- Enhanced Image Section with 3D Hover -->
            <div class="lg:w-1/2 w-full perspective-1000" 
                 x-show="!(currentIndex === 1 && window.innerWidth < 1024)" 
                 x-transition:enter="transition ease-out duration-700"
                 x-transition:enter-start="opacity-0 transform -translate-x-12 rotate-2"
                 x-transition:enter-end="opacity-100 transform translate-x-0 rotate-0"
                 x-transition:leave="transition ease-in duration-500"
                 x-transition:leave-start="opacity-100 transform translate-x-0 rotate-0"
                 x-transition:leave-end="opacity-0 transform -translate-x-12 rotate-2">
                <div class="relative rounded-3xl overflow-hidden shadow-2xl group hover:shadow-blue-500/30 transition-all duration-500"
                     @mouseenter="isHovered = true" 
                     @mouseleave="isHovered = false">
                    <div class="relative transform transition-all duration-700 group-hover:scale-110">
                        <img 
                            :src="items[currentIndex].imgSrc" 
                            class="w-full h-[500px] md:h-[700px] object-cover transition-all duration-700 group-hover:brightness-110"
                            style="object-position: center;"
                            alt="Vision Mission Image"
                            onerror="this.src='https://i.pinimg.com/736x/a6/f1/ed/a6f1ed77e5f666c4ef0b6901a5cef52a.jpg'"
                        />
                        <!-- Enhanced Gradient Overlay -->
                        <div class="absolute inset-0 bg-gradient-to-t from-black/90 via-black/50 to-transparent opacity-70 group-hover:opacity-90 transition-all duration-500"></div>
                        
                        <!-- Enhanced Content Overlay with Glass Effect -->
                        <div class="absolute bottom-0 left-0 right-0 p-8 md:p-10 backdrop-blur-sm bg-white/10 transform transition-all duration-500 translate-y-6 group-hover:translate-y-0">
                            <h4 class="text-3xl md:text-4xl font-bold text-white mb-3 transform transition-transform duration-500 group-hover:scale-105"
                                x-text="items[currentIndex].title"></h4>
                            <div class="w-24 h-1.5 bg-gradient-to-r from-blue-500 to-purple-500 rounded-full transform transition-all duration-500 group-hover:scale-x-110"></div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Enhanced Text Content with Glass Effect -->
            <div class="lg:w-1/2 w-full space-y-8 md:space-y-10 backdrop-blur-md bg-white/50 p-8 md:p-10 rounded-3xl shadow-xl"
                 x-transition:enter="transition ease-out duration-700"
                 x-transition:enter-start="opacity-0 transform translate-y-8"
                 x-transition:enter-end="opacity-100 transform translate-y-0">
                <div class="space-y-4 md:space-y-6">
                    <h3 class="text-4xl md:text-6xl font-bold text-gray-800 transition-all duration-500 relative pl-8 md:pl-10"
                        x-text="items[currentIndex].title">
                        <span class="absolute left-0 top-1/2 -translate-y-1/2 w-3 md:w-4 h-12 md:h-16 bg-gradient-to-b from-blue-500 to-purple-500 rounded-full transform transition-all duration-500 hover:scale-y-110"></span>
                    </h3>
                    <div class="flex gap-3">
                        <span class="h-1.5 w-32 md:w-40 bg-gradient-to-r from-blue-500 to-purple-500 rounded-full transform transition-transform hover:scale-x-110"></span>
                        <span class="h-1.5 w-4 md:w-5 bg-purple-500 rounded-full animate-pulse"></span>
                    </div>
                </div>

                <p class="text-lg md:text-xl text-gray-600 leading-relaxed whitespace-pre-line transition-all duration-500 prose prose-blue max-w-none"
                   x-text="items[currentIndex].content"
                   x-transition:enter="transition ease-out duration-500"
                   x-transition:enter-start="opacity-0 transform translate-y-4"
                   x-transition:enter-end="opacity-100 transform translate-y-0"></p>

                <!-- Enhanced Navigation with Glass Effect -->
                <div class="flex items-center gap-4 md:gap-6 pt-6 md:pt-8">
                    <template x-for="(item, index) in ['VISI', 'MISI']" :key="index">
                        <button 
                            @click="currentIndex = index"
                            class="flex-1 md:flex-none px-8 md:px-10 py-3 md:py-4 rounded-full text-base md:text-lg font-medium 
                                   transition-all duration-500 transform hover:scale-105 relative overflow-hidden group"
                            :class="currentIndex === index ? 
                                'bg-gradient-to-r from-blue-600 to-purple-600 text-white shadow-lg shadow-purple-500/30' : 
                                'backdrop-blur-sm bg-white/50 text-gray-600 hover:bg-white/70'">
                            <span class="relative z-10" x-text="item"></span>
                            <div class="absolute inset-0 bg-gradient-to-r from-blue-500 to-purple-500 opacity-0 
                                      group-hover:opacity-100 transition-opacity duration-500"></div>
                        </button>
                    </template>
                </div>
            </div>
        </div>
    </div>
</section>
@endif
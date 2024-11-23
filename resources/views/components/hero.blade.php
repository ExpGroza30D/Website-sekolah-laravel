@php
    $heroSection = App\Models\HeroSection::where('is_active', true)->first();
@endphp

@if($heroSection)
<div class="relative w-full h-[700px] pt-16 overflow-hidden">
    <!-- Background Image with Parallax Effect -->
    <div class="absolute inset-0 z-0">
        <img 
            alt="{{ $heroSection->title ?? 'Default Title' }}" 
            class="w-full h-full object-cover transition-transform duration-1000 transform scale-110 animate-ken-burns" 
            src="{{ $heroSection && $heroSection->background_image ? asset('storage/' . $heroSection->background_image) : 'https://i.pinimg.com/736x/0c/74/6d/0c746d3f3fb905c5920cce6c69f63499.jpg' }}" 
            width="1200" 
            height="700" 
            onerror="this.src='https://i.pinimg.com/736x/0c/74/6d/0c746d3f3fb905c5920cce6c69f63499.jpg'"
        >

        <!-- Overlay Gradient -->
        <div class="absolute inset-0 bg-gradient-to-r from-blue-900/80 via-blue-800/50 to-transparent"></div>
        
        <!-- Animated Particles -->
        <div class="absolute inset-0 bg-[url('/public/images/dots.png')] opacity-20 animate-slide-right"></div>
    </div>
    
    <!-- Hero Content -->
    <div class="container mx-auto px-4 h-full flex items-center relative z-10">
        <div class="max-w-3xl text-white">
            <div class="overflow-hidden">
                <h1 class="text-5xl md:text-7xl font-bold mb-6 leading-tight animate-slide-up">
                    {{ $heroSection->title }}<br>
                    <span class="text-blue-400 inline-block relative after:content-[''] after:absolute after:bottom-0 after:left-0 after:w-full after:h-1 after:bg-blue-400 after:animate-width-expand">
                        {{ $heroSection->school_name }}
                    </span>
                </h1>
            </div>
            
            <div class="overflow-hidden">
                <p class="text-xl md:text-2xl text-gray-200 mb-8 animate-slide-up animation-delay-200">
                    {{ $heroSection->subtitle }}
                </p>
            </div>
            
            <div class="space-x-4">
                <a 
                    href="{{ $heroSection->primary_button_link }}" 
                    class="inline-block bg-blue-600 text-white px-8 py-4 rounded-full font-medium 
                           transition-all duration-300 transform hover:scale-105 hover:bg-blue-700 
                           hover:shadow-[0_0_20px_rgba(37,99,235,0.5)] animate-fade-in animation-delay-400
                           relative overflow-hidden group"
                >
                    <span class="relative z-10">{{ $heroSection->primary_button_text }}</span>
                    <div class="absolute inset-0 bg-gradient-to-r from-blue-600 to-blue-800 transform scale-x-0 group-hover:scale-x-100 transition-transform duration-500 origin-left"></div>
                </a>
                
                <a 
                    href="{{ $heroSection->secondary_button_link }}" 
                    class="inline-block border-2 border-white text-white px-8 py-4 rounded-full font-medium 
                           transition-all duration-300 transform hover:scale-105 hover:bg-white/10
                           hover:shadow-[0_0_20px_rgba(255,255,255,0.3)] animate-fade-in animation-delay-600
                           relative overflow-hidden group"
                >
                    <span class="relative z-10">{{ $heroSection->secondary_button_text }}</span>
                    <div class="absolute inset-0 bg-white/20 transform scale-x-0 group-hover:scale-x-100 transition-transform duration-500 origin-left"></div>
                </a>
            </div>
        </div>
        
        <!-- Decorative Elements -->
        <div class="absolute top-1/2 right-10 transform -translate-y-1/2 hidden lg:block">
            <div class="space-y-4">
                <div class="w-2 h-20 bg-blue-400/30 rounded-full animate-pulse"></div>
                <div class="w-2 h-10 bg-blue-400/50 rounded-full animate-pulse animation-delay-200"></div>
                <div class="w-2 h-16 bg-blue-400/40 rounded-full animate-pulse animation-delay-400"></div>
            </div>
        </div>
    </div>
</div>
@endif
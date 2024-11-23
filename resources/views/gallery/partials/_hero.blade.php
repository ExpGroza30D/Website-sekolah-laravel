<div class="relative h-[60vh] w-full overflow-hidden">
    <img 
        src="{{ $gallery->image ? (Str::startsWith($gallery->image, 'http') ? $gallery->image : asset('storage/' . $gallery->image)) : 'https://i.pinimg.com/736x/5f/93/73/5f9373cc2e4f4e219612ed4426923116.jpg' }}"
        alt="{{ $gallery->title }}" 
        class="w-full h-full object-cover"
    >
    <div class="absolute inset-0 bg-gradient-to-t from-black/80 to-transparent"></div>
    <div class="absolute bottom-0 left-0 right-0 p-8 md:p-16 text-white">
        <div class="max-w-4xl mx-auto">
            <h1 class="text-4xl md:text-5xl lg:text-6xl font-bold mb-4 leading-tight">{{ $gallery->title }}</h1>
            <div class="flex items-center gap-4 text-white/80">
                <div class="flex items-center gap-2">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                    </svg>
                    <span>{{ $gallery->created_at->format('F d, Y') }}</span>
                </div>
                <div class="flex items-center gap-2">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 8h10M7 12h4m1 8l-4-4H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-3l-4 4z" />
                    </svg>
                    <span>{{ count($gallery->comments) }} Comments</span>
                </div>
            </div>
        </div>
    </div>
</div>
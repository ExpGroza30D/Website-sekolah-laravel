<div class="bg-blue-800/20 backdrop-blur-sm rounded-xl p-6 border border-blue-700/30 space-y-6">
    <h3 class="text-xl font-bold text-white flex items-center gap-2 mb-4">
        <i class="fas fa-bullhorn text-blue-400"></i>
        Pengumuman Terbaru
    </h3>
    
    <ul class="space-y-4">
        @foreach(\App\Models\Announcement::where('is_active', true)->latest()->take(3)->get() as $announcement)
            <li>
                <a href="{{ route('blog.show', $announcement) }}" 
                   class="group hover:bg-blue-800/30 p-4 rounded-lg transition-all duration-300 flex items-center gap-3">
                    <div class="w-10 h-10 rounded-full bg-blue-500/20 flex items-center justify-center group-hover:bg-blue-500/30 transition-colors">
                        <i class="fas fa-newspaper text-blue-400 group-hover:scale-110 transition-transform"></i>
                    </div>
                    <span class="text-gray-300 group-hover:text-white transition-colors">
                        {{ $announcement->title }}
                    </span>
                </a>
            </li>
        @endforeach
    </ul>
</div>
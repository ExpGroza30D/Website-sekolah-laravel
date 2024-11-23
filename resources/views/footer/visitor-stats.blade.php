@php
    $visitorStats = app(App\Services\VisitorService::class)->getStats();
@endphp

<div class="space-y-8">
    <!-- Visitor Statistics -->
    <div class="bg-blue-800/20 backdrop-blur-sm rounded-xl p-6 border border-blue-700/30">
        <h3 class="text-xl font-bold text-white mb-6 flex items-center gap-2">
            <i class="fas fa-chart-line text-blue-400"></i>
            Statistik Pengunjung
        </h3>
        
        <div class="space-y-4">
            <!-- Total Visits -->
            <div class="group hover:bg-blue-800/30 p-4 rounded-lg transition-all duration-300">
                <div class="flex items-center justify-between">
                    <div class="flex items-center gap-3">
                        <div class="w-10 h-10 rounded-full bg-blue-500/20 flex items-center justify-center group-hover:bg-blue-500/30 transition-colors">
                            <i class="fas fa-chart-bar text-blue-400"></i>
                        </div>
                        <span class="text-gray-300">Total Kunjungan</span>
                    </div>
                    <span class="text-white font-bold text-lg visitor-count" data-count="{{ $visitorStats['total_visits'] }}">
                        {{ number_format($visitorStats['total_visits']) }}
                    </span>
                </div>
            </div>
            
            <!-- Online Users -->
            <div class="group hover:bg-blue-800/30 p-4 rounded-lg transition-all duration-300">
                <div class="flex items-center justify-between">
                    <div class="flex items-center gap-3">
                        <div class="w-10 h-10 rounded-full bg-green-500/20 flex items-center justify-center group-hover:bg-green-500/30 transition-colors">
                            <i class="fas fa-users text-green-400"></i>
                        </div>
                        <span class="text-gray-300">Pengunjung Online</span>
                    </div>
                    <span class="text-white font-bold text-lg online-count" data-count="{{ $visitorStats['online_users'] }}">
                        {{ number_format($visitorStats['online_users']) }}
                    </span>
                </div>
            </div>
            
            <!-- Today's Visitors -->
            <div class="group hover:bg-blue-800/30 p-4 rounded-lg transition-all duration-300">
                <div class="flex items-center justify-between">
                    <div class="flex items-center gap-3">
                        <div class="w-10 h-10 rounded-full bg-purple-500/20 flex items-center justify-center group-hover:bg-purple-500/30 transition-colors">
                            <i class="fas fa-calendar-day text-purple-400"></i>
                        </div>
                        <span class="text-gray-300">Hari Ini</span>
                    </div>
                    <span class="text-white font-bold text-lg today-count" data-count="{{ $visitorStats['today_visitors'] }}">
                        {{ number_format($visitorStats['today_visitors']) }}
                    </span>
                </div>
            </div>
        </div>
    </div>

    <!-- Social Media -->
    <div class="bg-blue-800/20 backdrop-blur-sm rounded-xl p-6 border border-blue-700/30">
        <h3 class="text-xl font-bold text-white mb-4 flex items-center gap-2">
            <i class="fas fa-share-alt text-blue-400"></i>
            Media Sosial
        </h3>
        <div class="grid grid-cols-2 gap-4">
            @foreach([
                ['Facebook', 'fab fa-facebook-f', '#'],
                ['Twitter', 'fab fa-twitter', '#'],
                ['Instagram', 'fab fa-instagram', '#'],
                ['YouTube', 'fab fa-youtube', '#']
            ] as [$name, $icon, $link])
                <a href="{{ $link }}" 
                   class="flex items-center gap-2 text-gray-300 hover:text-white transition-all duration-300 group p-2 rounded-lg hover:bg-blue-800/30">
                    <i class="{{ $icon }} text-blue-400 group-hover:scale-110 transition-transform"></i>
                    {{ $name }}
                </a>
            @endforeach
        </div>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    function animateCount(element, target) {
        const start = 0;
        const duration = 2000;
        const startTime = performance.now();
        
        function update(currentTime) {
            const elapsed = currentTime - startTime;
            const progress = Math.min(elapsed / duration, 1);
            
            const easeOutQuart = 1 - Math.pow(1 - progress, 4);
            const current = Math.floor(easeOutQuart * target);
            
            element.textContent = new Intl.NumberFormat().format(current);
            
            if (progress < 1) {
                requestAnimationFrame(update);
            }
        }
        
        requestAnimationFrame(update);
    }

    document.querySelectorAll('[data-count]').forEach(element => {
        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    const target = parseInt(element.dataset.count);
                    animateCount(element, target);
                    observer.unobserve(element);
                }
            });
        }, { threshold: 0.5 });

        observer.observe(element);
    });
});
</script>
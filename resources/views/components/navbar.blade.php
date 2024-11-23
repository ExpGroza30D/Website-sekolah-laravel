<nav 
    x-data="{ 
        isOpen: false,
        scrolled: false,
        activeSection: 'home',
        init() {
            window.addEventListener('scroll', () => {
                this.scrolled = window.pageYOffset > 50;
                this.updateActiveSection();
            });
        },
        updateActiveSection() {
            document.querySelectorAll('section[id]').forEach(section => {
                const sectionTop = section.offsetTop - 100;
                if (window.pageYOffset >= sectionTop && 
                    window.pageYOffset < sectionTop + section.offsetHeight) {
                    this.activeSection = section.id;
                }
            });
        }
    }" 
    :class="{ 
        'sm:bg-[#005e84]/95 sm:backdrop-blur-md sm:shadow-lg': scrolled, 
        'sm:bg-[rgba(0,95,132,0.11)]': !scrolled,
        'bg-transparent': true
    }" 
    class="navbar fixed top-[40px] left-0 w-full z-50 transition-all duration-500"
    @keydown.escape="isOpen = false">
    
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8 py-4">
        <div class="relative flex items-center justify-between">
            <!-- Logo (Hidden on mobile) -->
            <div class="flex-shrink-0 group relative overflow-hidden rounded-lg hidden sm:block">
                <div class="absolute inset-0 bg-gradient-to-r from-blue-400/20 to-teal-400/20 opacity-0 group-hover:opacity-100 transition-opacity duration-500 blur-xl"></div>
                <img 
                    class="h-12 w-auto transition-all duration-500 transform group-hover:scale-110 relative z-10" 
                    src="{{ asset('images/logo.png') }}" 
                    alt="SMA 2 PSKD"
                    onerror="this.src='https://i.ibb.co.com/mbK1wXV/LOGO-PSKD.jpg'"
                >
            </div>

            <!-- Desktop Navigation -->
            <div class="hidden sm:block">
                <div class="flex space-x-8" x-data="{ hoveredItem: null }">
                    @php
                        $navItems = [
                            ['name' => 'Beranda', 'href' => '#home', 'icon' => 'home'],
                            ['name' => 'Profil Guru', 'href' => '#profil', 'icon' => 'users'],
                            ['name' => 'Galeri', 'href' => '#galeri', 'icon' => 'image'],
                            ['name' => 'Kontak', 'href' => '#kontak', 'icon' => 'phone']
                        ];
                    @endphp

                    @foreach($navItems as $item)
                        <a 
                            href="{{ $item['href'] }}" 
                            class="group relative px-3 py-2 text-lg font-medium text-gray-300 transition-all duration-300 hover:text-white"
                            @mouseenter="hoveredItem = '{{ $item['name'] }}'"
                            @mouseleave="hoveredItem = null"
                            :class="{ 'text-white': activeSection === '{{ str_replace('#', '', $item['href']) }}' }"
                        >
                            <div class="relative z-10 flex items-center space-x-1">
                                <i class="fas fa-{{ $item['icon'] }} text-sm" 
                                   :class="{ 'transform rotate-12 transition-transform duration-300': hoveredItem === '{{ $item['name'] }}' }"></i>
                                <span>{{ $item['name'] }}</span>
                            </div>
                            
                            <span 
                                class="absolute inset-x-0 bottom-0 h-0.5 bg-gradient-to-r from-blue-400 to-teal-400 transform origin-left transition-all duration-300"
                                :class="{
                                    'scale-x-100': activeSection === '{{ str_replace('#', '', $item['href']) }}' || hoveredItem === '{{ $item['name'] }}',
                                    'scale-x-0': activeSection !== '{{ str_replace('#', '', $item['href']) }}' && hoveredItem !== '{{ $item['name'] }}'
                                }"
                            ></span>
                            
                            <span 
                                class="absolute inset-0 bg-gradient-to-r from-blue-600/10 to-teal-600/10 rounded-lg transform transition-all duration-300 -z-10"
                                :class="{ 'scale-100': hoveredItem === '{{ $item['name'] }}' || activeSection === '{{ str_replace('#', '', $item['href']) }}', 'scale-0': hoveredItem !== '{{ $item['name'] }}' && activeSection !== '{{ str_replace('#', '', $item['href']) }}' }"
                            ></span>
                        </a>
                    @endforeach
                </div>
            </div>

            <!-- Mobile Hamburger Button -->
            <div class="w-full flex justify-end sm:hidden">
                <button 
                    @click="isOpen = !isOpen" 
                    class="relative inline-flex items-center justify-center p-2 rounded-md text-gray-800 hover:text-gray-600 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-white transition-all duration-300 overflow-hidden group"
                    aria-label="Toggle menu"
                >
                    <div class="w-6 h-6 relative">
                        <span 
                            class="absolute h-0.5 w-full bg-current transform transition duration-500 ease-in-out"
                            :class="{'rotate-45 translate-y-2.5': isOpen, '': !isOpen}"
                        ></span>
                        <span 
                            class="absolute h-0.5 w-full bg-current transform transition-all duration-500 ease-in-out"
                            :class="{'opacity-0': isOpen, 'translate-y-2': !isOpen}"
                        ></span>
                        <span 
                            class="absolute h-0.5 w-full bg-current transform transition duration-500 ease-in-out"
                            :class="{'-rotate-45 translate-y-2.5': isOpen, 'translate-y-4': !isOpen}"
                        ></span>
                    </div>
                </button>
            </div>
        </div>
    </div>

    <!-- Mobile Menu Dropdown -->
    <div 
        x-show="isOpen" 
        x-transition:enter="transition ease-out duration-300"
        x-transition:enter-start="opacity-0 transform -translate-y-4"
        x-transition:enter-end="opacity-100 transform translate-y-0"
        x-transition:leave="transition ease-in duration-200"
        x-transition:leave-start="opacity-100 transform translate-y-0"
        x-transition:leave-end="opacity-0 transform -translate-y-4"
        class="sm:hidden absolute w-full bg-white/95 backdrop-blur-md shadow-xl"
        @click.away="isOpen = false"
    >
        <div class="px-2 py-3 space-y-1">
            @foreach($navItems as $item)
                <a 
                    href="{{ $item['href'] }}" 
                    class="flex items-center px-3 py-2 rounded-lg text-gray-800 hover:text-gray-600 hover:bg-gray-100 transition-all duration-300"
                    :class="{ 'bg-gray-100 text-gray-900': activeSection === '{{ str_replace('#', '', $item['href']) }}' }"
                    @click="isOpen = false"
                >
                    <i class="fas fa-{{ $item['icon'] }} w-5 h-5 mr-3"></i>
                    <span>{{ $item['name'] }}</span>
                </a>
            @endforeach
        </div>
    </div>
</nav>
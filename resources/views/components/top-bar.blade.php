<!-- Top Header with Date and Search -->
<header class="bg-gradient-to-r from-[#6390a5] to-[#4a7b91] text-white py-2 fixed top-0 left-0 w-full z-50 shadow-md backdrop-blur-sm">
    <div class="container mx-auto px-4">
        <!-- Desktop View - Hidden on Mobile -->
        <div class="hidden md:flex justify-between items-center">
            <!-- Date Section -->
            <div class="flex items-center space-x-2">
                <i class="fas fa-calendar-alt text-blue-200"></i>
                <span 
                    x-data="{ time: new Date() }" 
                    x-init="setInterval(() => time = new Date(), 1000)" 
                    x-text="time.toLocaleDateString('id-ID', { weekday: 'long', year: 'numeric', month: 'long', day: 'numeric' })"
                    class="text-xs font-medium"
                ></span>
            </div>
            
            <!-- Welcome Text Animation -->
            <div class="flex-1 flex justify-center items-center">
                <div 
                    x-data="{ 
                        text: 'Selamat Datang di SMA 2 PSKD',
                        currentText: '',
                        isTyping: true,
                        init() {
                            this.typeText();
                        },
                        typeText() {
                            this.isTyping = true;
                            this.currentText = '';
                            let index = 0;
                            const type = () => {
                                if (index < this.text.length) {
                                    this.currentText += this.text[index];
                                    index++;
                                    setTimeout(type, Math.random() * 150 + 50);
                                } else {
                                    this.isTyping = false;
                                    setTimeout(() => this.eraseText(), 2000);
                                }
                            };
                            type();
                        },
                        eraseText() {
                            if (this.currentText.length === 0) {
                                setTimeout(() => this.typeText(), 500);
                                return;
                            }
                            this.currentText = this.currentText.slice(0, -1);
                            setTimeout(() => this.eraseText(), 50);
                        }
                    }"
                    class="relative text-xs font-medium tracking-wide"
                >
                    <span 
                        x-text="currentText"
                        class="bg-gradient-to-r from-white via-blue-200 to-white bg-clip-text text-transparent"
                        :class="{ 'animate-text-fade': !isTyping }"
                    ></span>
                    <span 
                        class="absolute -right-1 top-0 h-full w-[2px] bg-blue-200 animate-pulse"
                        x-show="isTyping"
                    ></span>
                </div>
            </div>
            
            <!-- Search Form -->
            <form class="w-[12rem]">   
                <div class="relative">
                    <input 
                        type="search" 
                        class="w-full p-1.5 pl-8 text-xs text-gray-900 rounded-lg bg-white/90 focus:ring-2 focus:ring-blue-300 transition-all"
                        placeholder="Cari informasi..." 
                    />
                    <div class="absolute inset-y-0 left-0 flex items-center pl-2">
                        <i class="fas fa-search text-gray-400 text-xs"></i>
                    </div>
                </div>
            </form>
        </div>

        <!-- Mobile View - Only Date and Search -->
        <div class="md:hidden flex justify-between items-center">
            <!-- Mobile Date -->
            <div class="flex items-center space-x-2">
                <i class="fas fa-calendar-alt text-blue-200"></i>
                <span 
                    x-data="{ time: new Date() }" 
                    x-init="setInterval(() => time = new Date(), 1000)" 
                    x-text="time.toLocaleDateString('id-ID', { weekday: 'long', day: 'numeric' })"
                    class="text-xs font-medium"
                ></span>
            </div>

            <!-- Mobile Search Button -->
            <button 
                @click="$refs.mobileSearch.classList.toggle('hidden')"
                class="p-2 hover:bg-white/10 rounded-lg transition-colors"
            >
                <i class="fas fa-search text-white text-sm"></i>
            </button>

            <!-- Mobile Search Form (Hidden by default) -->
            <div 
                x-ref="mobileSearch"
                class="hidden absolute top-full left-0 right-0 p-4 bg-white/10 backdrop-blur-sm"
            >
                <div class="relative max-w-md mx-auto">
                    <input 
                        type="search" 
                        class="w-full p-2 pl-8 text-sm text-gray-900 rounded-lg bg-white/90 focus:ring-2 focus:ring-blue-300 transition-all"
                        placeholder="Cari informasi..." 
                    />
                    <div class="absolute inset-y-0 left-0 flex items-center pl-2">
                        <i class="fas fa-search text-gray-400 text-sm"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
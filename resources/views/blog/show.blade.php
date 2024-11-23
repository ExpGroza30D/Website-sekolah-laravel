<x-app-layout>
    <div class="py-12 bg-gradient-to-b from-gray-50 to-gray-100">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-2xl border border-gray-100">
                <div class="p-6 lg:p-8">
                    @if(isset($blog->image))
                        <div class="relative h-[400px] mb-8 rounded-xl overflow-hidden shadow-lg">
                            <img src="{{ asset('storage/' . $blog->image) }}" 
                                 alt="{{ $blog->title }}" 
                                 class="w-full h-full object-cover hover:scale-105 transition-transform duration-500">
                        </div>
                    @endif
                    
                    <div class="max-w-3xl mx-auto">
                        <h1 class="text-4xl font-bold text-gray-900 mb-4 leading-tight">{{ $blog->title }}</h1>
                        
                        <div class="flex items-center gap-4 text-sm text-gray-600 mb-8">
                            <div class="flex items-center gap-2">
                                <i class="far fa-calendar text-blue-500"></i>
                                <span>{{ $blog->created_at->format('d M Y') }}</span>
                            </div>
                            <div class="flex items-center gap-2">
                                <i class="far fa-user text-blue-500"></i>
                                <span>Admin</span>
                            </div>
                        </div>
                        
                        <div class="prose prose-lg max-w-none">
                            {!! $blog->content !!}
                        </div>

                        <div class="mt-12 pt-6 border-t border-gray-100">
                            <a href="{{ route('blog.index') }}" 
                               class="inline-flex items-center px-4 py-2 bg-blue-500 hover:bg-blue-600 text-white rounded-lg transition-colors duration-200">
                                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
                                </svg>
                                Kembali ke Blog
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
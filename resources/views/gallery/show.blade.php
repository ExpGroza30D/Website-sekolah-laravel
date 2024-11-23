<x-app-layout>
    <div class="min-h-screen bg-gray-50">
        @include('gallery.partials._hero')
        
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 -mt-8 relative z-10">
            @include('gallery.partials._content')
            @include('gallery.partials._back_button')
            @include('gallery.partials._comments')
        </div>
    </div>
</x-app-layout>
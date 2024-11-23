<div x-data="{ 
    comments: {{ Js::from($gallery->comments) }},
    newComment: '',
    name: '',
    isSubmitting: false,
    showSuccess: false,
    
    async addComment() {
        if (this.isSubmitting) return;
        this.isSubmitting = true;
        
        try {
            const response = await fetch('/api/gallery/{{ $gallery->id }}/comment', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name=csrf-token]').content
                },
                body: JSON.stringify({
                    name: this.name,
                    comment: this.newComment
                })
            });
            const data = await response.json();
            this.comments.unshift(data.comment);
            this.newComment = '';
            this.name = '';
            this.showSuccess = true;
            setTimeout(() => this.showSuccess = false, 3000);
        } catch (error) {
            console.error('Error adding comment:', error);
        } finally {
            this.isSubmitting = false;
        }
    }
}">
    <div class="bg-white rounded-2xl shadow-xl p-8 md:p-12">
        <h2 class="text-2xl font-semibold mb-6 text-gray-900 flex items-center gap-2">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-blue-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 8h10M7 12h4m1 8l-4-4H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-3l-4 4z" />
            </svg>
            Comments
            <span class="text-sm font-normal text-gray-500" x-text="'(' + comments.length + ')'"></span>
        </h2>
        
        <!-- Success Message -->
        <div 
            x-show="showSuccess" 
            x-transition:enter="transition ease-out duration-300"
            x-transition:enter-start="opacity-0 transform translate-y-2"
            x-transition:enter-end="opacity-100 transform translate-y-0"
            x-transition:leave="transition ease-in duration-200"
            x-transition:leave-start="opacity-100 transform translate-y-0"
            x-transition:leave-end="opacity-0 transform translate-y-2"
            class="mb-4 p-4 bg-green-50 text-green-700 rounded-lg flex items-center gap-2"
        >
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
            </svg>
            Comment posted successfully!
        </div>
        
        <!-- Comment Form -->
        <form @submit.prevent="addComment" class="mb-8 bg-gray-50 p-6 rounded-xl shadow-sm hover:shadow-md transition-all duration-300">
            <div class="mb-4">
                <label for="name" class="block text-sm font-medium text-gray-700 mb-1">Name (optional)</label>
                <input 
                    id="name"
                    type="text" 
                    x-model="name" 
                    placeholder="Enter your name" 
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors"
                >
            </div>
            <div class="mb-4">
                <label for="comment" class="block text-sm font-medium text-gray-700 mb-1">Comment</label>
                <textarea 
                    id="comment"
                    x-model="newComment" 
                    placeholder="Share your thoughts..." 
                    rows="4"
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors"
                    required
                ></textarea>
            </div>
            <button 
                type="submit" 
                class="group px-6 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition-all duration-300 disabled:opacity-50 disabled:cursor-not-allowed flex items-center gap-2 hover:shadow-lg"
                :disabled="isSubmitting || !newComment.trim()"
            >
                <span x-show="!isSubmitting" class="flex items-center gap-2">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 transform group-hover:scale-110 transition-transform" viewBox="0 0 20 20" fill="currentColor">
                        <path d="M10.894 2.553a1 1 0 00-1.788 0l-7 14a1 1 0 001.169 1.409l5-1.429A1 1 0 009 15.571V11a1 1 0 112 0v4.571a1 1 0 00.725.962l5 1.428a1 1 0 001.17-1.408l-7-14z" />
                    </svg>
                    Post Comment
                </span>
                <span x-show="isSubmitting" class="flex items-center gap-2">
                    <svg class="animate-spin h-5 w-5 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                        <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                        <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                    </svg>
                    Posting...
                </span>
            </button>
        </form>

        <!-- Comments List -->
        <div class="space-y-4">
            <template x-for="comment in comments" :key="comment.id">
                <div 
                    class="bg-gray-50 p-6 rounded-xl shadow-sm hover:shadow-md transition-all duration-300 hover:bg-gray-100 transform hover:-translate-y-1"
                    x-transition:enter="transition ease-out duration-300"
                    x-transition:enter-start="opacity-0 transform translate-y-4"
                    x-transition:enter-end="opacity-100 transform translate-y-0"
                >
                    <div class="flex items-center gap-3 mb-3">
                        <div class="h-12 w-12 rounded-full bg-gradient-to-br from-blue-500 to-blue-600 flex items-center justify-center text-white shadow-md">
                            <span class="text-lg font-semibold" x-text="(comment.name || 'A').charAt(0).toUpperCase()"></span>
                        </div>
                        <div>
                            <h4 class="font-semibold text-gray-900" x-text="comment.name || 'Anonymous'"></h4>
                            <p class="text-sm text-gray-500" x-text="new Date(comment.created_at).toLocaleDateString('en-US', { year: 'numeric', month: 'long', day: 'numeric' })"></p>
                        </div>
                    </div>
                    <div class="pl-15">
                        <p class="text-gray-700 leading-relaxed" x-text="comment.comment"></p>
                    </div>
                </div>
            </template>
            
            <!-- No Comments Message -->
            <div 
                x-show="comments.length === 0" 
                x-transition:enter="transition ease-out duration-300"
                x-transition:enter-start="opacity-0"
                x-transition:enter-end="opacity-100"
                class="text-center py-12 bg-gray-50 rounded-xl border border-gray-100"
            >
                <div class="bg-white p-6 rounded-full w-20 h-20 mx-auto mb-6 flex items-center justify-center shadow-sm">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z" />
                    </svg>
                </div>
                <h3 class="text-xl font-semibold text-gray-900 mb-2">No comments yet</h3>
                <p class="text-gray-500">Be the first to share your thoughts!</p>
            </div>
        </div>
    </div>
</div>
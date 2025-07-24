@props(['commentableType', 'commentableId'])

<div
    x-data="commentSystem('{{ $commentableType }}', {{ $commentableId }}, {{ Auth::check() ? 'true' : 'false' }})"
    class="mt-8 bg-gray-50 p-6 rounded-lg shadow-sm"
>
    <h3 class="text-2xl font-semibold mb-6 text-gray-800">Comments</h3>

    {{-- Loading Indicator --}}
    <div x-show="loadingComments" class="text-center py-8 text-gray-600">
        <svg class="animate-spin h-8 w-8 text-indigo-500 mx-auto" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
            <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
            <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
        </svg>
        <p class="mt-2">Loading comments...</p>
    </div>

    {{-- Error Message for Loading --}}
    <p x-show="errorMessage && !loadingComments" x-text="errorMessage" class="text-red-600 text-center py-4"></p>

    {{-- Comments List --}}
    <ul x-show="!loadingComments && comments.length > 0" class="space-y-6">
        <template x-for="comment in comments" :key="comment.id">
            <li class="bg-white p-5 rounded-lg shadow-md border border-gray-200">
                <div class="flex items-center justify-between mb-2">
                    <div class="flex items-center space-x-3">
                        <div class="w-10 h-10 rounded-full bg-indigo-200 flex items-center justify-center text-indigo-800 font-bold text-lg">
                            <span x-text="(comment.user ? comment.user.name : comment.guest_name).charAt(0).toUpperCase()"></span>
                        </div>
                        <p class="font-semibold text-gray-900" x-text="comment.user ? comment.user.name : comment.guest_name"></p>
                    </div>
                    <time class="text-sm text-gray-500" x-text="new Date(comment.created_at).toLocaleString()"></time>
                </div>
                <p class="text-gray-700 leading-relaxed" x-text="comment.content"></p>
                <p x-show="comment.guest_email" class="mt-2 text-xs text-gray-500">
                    Email: <span x-text="comment.guest_email"></span>
                </p>
            </li>
        </template>
    </ul>

    {{-- No Comments Message --}}
    <p x-show="!loadingComments && !errorMessage && comments.length === 0" class="text-center text-gray-500 py-8">
        No comments yet. Be the first to comment!
    </p>

    {{-- New Comment Form --}}
    <form @submit.prevent="submitComment" class="mt-10 p-6 bg-white rounded-lg shadow-md border border-gray-200">
        @csrf

        <h4 class="text-xl font-semibold mb-5 text-gray-800">Leave a Comment</h4>

        {{-- Guest Fields (conditionally shown) --}}
        <template x-if="!isLoggedIn">
            <div class="mb-4 space-y-4">
                <div>
                    <label for="guest_name" class="block text-sm font-medium text-gray-700 mb-1">Your Name</label>
                    <input
                        type="text"
                        id="guest_name"
                        x-model="guestName"
                        placeholder="John Doe"
                        required
                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                    >
                </div>
                <div>
                    <label for="guest_email" class="block text-sm font-medium text-gray-700 mb-1">Your Email</label>
                    <input
                        type="email"
                        id="guest_email"
                        x-model="guestEmail"
                        placeholder="john.doe@example.com"
                        required
                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                    >
                </div>
            </div>
        </template>

        {{-- Comment Content --}}
        <div class="mb-6">
            <label for="comment_content" class="block text-sm font-medium text-gray-700 mb-1">Your Comment</label>
            <textarea
                id="comment_content"
                x-model="newCommentContent"
                placeholder="Share your thoughts..."
                required
                rows="5"
                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 resize-y"
            ></textarea>
        </div>

        {{-- Submission Button --}}
        <button
            type="submit"
            :disabled="submitting"
            class="w-full inline-flex justify-center py-3 px-6 border border-transparent rounded-md shadow-sm text-lg font-medium text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 disabled:opacity-50 disabled:cursor-not-allowed transition duration-150 ease-in-out"
        >
            <span x-show="!submitting">Post Comment</span>
            <span x-show="submitting">
                <svg class="animate-spin -ml-1 mr-3 h-5 w-5 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                    <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                    <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                </svg>
                Posting...
            </span>
        </button>

        {{-- Error Message for Submission --}}
        <p x-show="errorMessage" x-text="errorMessage" class="text-red-600 mt-4 text-center"></p>
    </form>
</div>

<script>
    document.addEventListener('alpine:init', () => {
        Alpine.data('commentSystem', (commentableType, commentableId, isLoggedIn) => ({
            comments: [],
            newCommentContent: '',
            guestName: '',
            guestEmail: '',
            submitting: false,
            loadingComments: true,
            errorMessage: '',
            commentableType: commentableType,
            commentableId: commentableId,
            isLoggedIn: isLoggedIn,

            init() {
                this.fetchComments();
            },

            async fetchComments() {
                this.loadingComments = true;
                this.errorMessage = ''; // Clear previous errors
                try {
                    const response = await fetch(`/api/${this.commentableType}/${this.commentableId}/comments`);
                    if (!response.ok) {
                        const errorText = await response.text();
                        throw new Error(`Failed to fetch comments: ${response.status} ${response.statusText} - ${errorText}`);
                    }
                    const data = await response.json();
                    this.comments = data;
                } catch (error) {
                    console.error('Error fetching comments:', error);
                    this.errorMessage = error.message;
                } finally {
                    this.loadingComments = false;
                }
            },

            async submitComment() {
                this.submitting = true;
                this.errorMessage = ''; // Clear previous errors
                let bodyData = {
                    content: this.newCommentContent,
                };

                if (!this.isLoggedIn) {
                    bodyData.guest_name = this.guestName;
                    bodyData.guest_email = this.guestEmail;
                }

                try {
                    const response = await fetch(`/api/${this.commentableType}/${this.commentableId}/comments`, {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                        },
                        body: JSON.stringify(bodyData)
                    });

                    if (!response.ok) {
                        const errorData = await response.json();
                        // Attempt to parse Laravel validation errors
                        if (response.status === 422 && errorData.errors) {
                            let validationMessages = Object.values(errorData.errors).flat().join('<br>');
                            throw new Error(validationMessages);
                        }
                        throw new Error(errorData.message || 'Failed to post comment');
                    }

                    const newComment = await response.json();
                    this.comments.unshift(newComment); // Add new comment to the top
                    this.newCommentContent = ''; // Clear the input
                    if (!this.isLoggedIn) {
                        this.guestName = ''; // Clear guest fields
                        this.guestEmail = '';
                    }
                } catch (error) {
                    console.error('Error submitting comment:', error);
                    this.errorMessage = error.message;
                } finally {
                    this.submitting = false;
                }
            }
        }));
    });
</script>



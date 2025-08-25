<div x-data="{
    isBookmarked: {{ json_encode(auth()->user()->hasBookmarked($post)) }},
    toggleBookmark() {
        fetch('/bookmarks/toggle', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
            },
            body: JSON.stringify({
                bookmarkable_id: {{ $post->id }},
                bookmarkable_type: 'Post'
            })
        })
        .then(response => response.json())
        .then(data => {
            if (data.status === 'added') {
                this.isBookmarked = true;
            } else {
                this.isBookmarked = false;
            }
        });
    }
}">
    <button x-on:click="toggleBookmark()"
            x-text="isBookmarked ? '⭐ Unbookmark' : '✩ Bookmark'"
            :class="isBookmarked ? 'bg-yellow-500' : 'bg-gray-200'">
    </button>
</div>
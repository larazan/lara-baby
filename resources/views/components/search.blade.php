<div class="flex items-center min-w-96">
    <div x-data="{
        query: '',
        results: { babynames: [], articles: [], activities: [] },
        isLoading: false,
        resetSearch() {
            this.query = '';
            this.results = { babynames: [], articles: [], activities: [] };
        },
        async search() {
            if (this.query.length < 2) {
                this.results = { babynames: [], articles: [], activities: [] };
                return;
            }
            
            this.isLoading = true;

            try {
                const url = new URL(@js(route('search')));
                url.searchParams.set('query', this.query);
                const response = await fetch(url);
                this.results = await response.json();
            } catch (error) {
                console.error('Search failed:', error);
            }

            this.isLoading = false;
        }
    }"
        @click.away="resetSearch()"
        @keydown.escape.window="resetSearch()"
        class="relative w-full"
    >
        <x-text-input
            type="text"
            x-model="query"
            @input.debounce.300ms="search()"
            placeholder="Search..."
            class="w-full"
        />

        <div x-show="query.length >= 2"
            x-transition
            class="absolute z-50 mt-1 w-full rounded border bg-white text-sm shadow-lg"
        >
            <template x-if="results.babynames?.length">
                <div class="p-2">
                    <h3 class="mb-2 font-bold">Names found</h3>
                    <template x-for="babyname in results.babynames" :key="babyname.uuid">
                        <a :href="`/baby-name/${babyname.slug}`"
                            class="flex justify-between border-b p-2 last:border-b-0 hover:bg-gray-100"
                        >
                        <span x-text="babyname.name"></span>
                        <!-- icon -->
                        </a>
                    </template>
                </div>
            </template>

            <template x-if="results.activities?.length">
                <div class="p-2">
                    <h3 class="mb-2 font-bold">Activities found</h3>
                    <template x-for="article in results.activities" :key="activity.id">
                        <a :href="`/activity/${activity.slug}`"
                            class="block border-b p-2 last:border-b-0 hover:bg-gray-100"
                        >
                        <span x-text="activity.title"></span>
                        </a>
                    </template>
                </div>
            </template>

            <template x-if="results.articles?.length">
                <div class="p-2">
                    <h3 class="mb-2 font-bold">Articles found</h3>
                    <template x-for="article in results.articles" :key="article.id">
                        <a :href="`/article/${article.slug}`"
                            class="block border-b p-2 last:border-b-0 hover:bg-gray-100"
                        >
                        <span x-text="article.title"></span>
                        </a>
                    </template>
                </div>
            </template>

            <div x-show="isLoading" class="p-4 text-center">
                Loading...
            </div>

        </div>

    </div>
</div>
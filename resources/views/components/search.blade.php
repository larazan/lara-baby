<div class="flex items-center ">
    <div x-data="{
        query: '',
        results: { keyword:'', babynames: [], articles: [], activities: [], queryActivity:'', queryArticle:'', queryBabyname:'' },
        isLoading: false,
        resetSearch() {
            this.query = '';
            this.results = { keyword:'', babynames: [], articles: [], activities: [], queryActivity:'', queryArticle:'', queryBabyname:'' };
        },
        async search() {
            if (this.query.length < 2) {
                this.results = { keyword, babynames: [], articles: [], activities: [], queryActivity, queryArticle, queryBabyname };
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
        <div class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-2">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true" data-slot="icon" class="h-5 w-5 text-gray-500">
                <path fill-rule="evenodd" d="M9 3.5a5.5 5.5 0 1 0 0 11 5.5 5.5 0 0 0 0-11ZM2 9a7 7 0 1 1 12.452 4.391l3.328 3.329a.75.75 0 1 1-1.06 1.06l-3.329-3.328A7 7 0 0 1 2 9Z" clip-rule="evenodd"></path>
            </svg>
        </div>
        <x-text-input
            type="text"
            x-model="query"
            @input.debounce.300ms="search()"
            placeholder="Search..."
            class="w-full"
        />
        <div x-show="query.length >= 2" @click="resetSearch()" class="absolute right-1 cursor-pointer inline-flex items-center justify-center rounded-md text-sm font-medium ring-offset-background transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50 bg-transparent text-gray-400 h-10 px-2 py-2">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="size-4 text-gray-500">
                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
            </svg>
        </div>
        <div x-show="query.length >= 2"
            x-transition
            class="absolute z-50 mt-1 w-full max-h-96 rounded border-2 border-gray-800 shadow-menu bg-white text-sm shadow-lg overflow-y-auto"
        >
            <template x-if="results.babynames?.length">
                <div class="p-2">
                    <h3 class="mb-2 font-bold text-gray-800 figtree-medium"><span x-text="results.queryBabyname"></span> Names found</h3>
                    <template x-for="babyname in results.babynames" :key="babyname.uuid">
                        <a :href="`/baby-name/${babyname.slug}`"
                            class="flex justify-between border-b p-2 figtree-reguler last:border-b-0 hover:bg-gray-100 text-gray-800"
                        >
                        <span x-text="babyname.name"></span>
                        <!-- icon -->
                        </a>
                    </template>
                    <template x-if="results.queryBabyname > 10">
                        <div class="p-2 w-full flex justify-center text-center hover:bg-gray-100">
                            <a :href="`/baby-name?search=${results.keyword}`" class="w-full ">
                                <span class="font-semibold text-gray-800 capitalize figtree-medium">see all</span>
                            </a>
                        </div>
                    </template>
                </div>
            </template>

            <template x-if="results.activities?.length">
                <div class="p-2">
                    <h3 class="mb-2 font-bold text-gray-800 figtree-medium"><span x-text="results.queryActivity"></span> Activities found</h3>
                    <template x-for="article in results.activities" :key="activity.id">
                        <a :href="`/activity/${activity.slug}`"
                            class="block border-b p-2 last:border-b-0 figtree-reguler hover:bg-gray-100 text-gray-800"
                        >
                        <span x-text="activity.title"></span>
                        </a>
                    </template>
                    <template x-if="results.queryActivity > 10">
                        <div class="p-2 w-full flex justify-center text-center hover:bg-gray-100">
                            <a :href="`/activities?search=${results.keyword}`" class="w-full ">
                                <span class="font-semibold text-gray-800 capitalize figtree-medium">see all</span>
                            </a>
                        </div>
                    </template>
                </div>
            </template>

            <template x-if="results.articles?.length">
                <div class="p-2">
                    <h3 class="mb-2 font-bold text-gray-800 figtree-medium"><span x-text="results.queryArticle"></span> Articles found</h3>
                    <template x-for="article in results.articles" :key="article.id">
                        <a :href="`/article/${article.slug}`"
                            class="block border-b p-2 last:border-b-0 figtree-reguler hover:bg-gray-100 text-gray-800"
                        >
                        <span x-text="article.title"></span>
                        </a>
                    </template>
                    <template x-if="results.queryArticle > 10">
                        <div class="p-2 w-full flex justify-center text-center hover:bg-gray-100">
                            <a :href="`/articles?search=${results.keyword}`" class="w-full ">
                                <span class="font-semibold text-gray-800 capitalize figtree-medium">see all</span>
                            </a>
                        </div>
                    </template>
                </div>
            </template>

            <div x-show="isLoading" class="p-4 text-center figtree-reguler">
                Loading...
            </div>

        </div>

    </div>
</div>
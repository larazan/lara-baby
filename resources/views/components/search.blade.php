<div class="flex items-center min-w-96">
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
        <x-text-input
            type="text"
            x-model="query"
            @input.debounce.300ms="search()"
            placeholder="Search..."
            class="w-full"
        />

        <div x-show="query.length >= 2"
            x-transition
            class="absolute z-50 mt-1 w-full max-h-96 rounded border bg-white text-sm shadow-lg overflow-y-auto"
        >
            <template x-if="results.babynames?.length">
                <div class="p-2">
                    <h3 class="mb-2 font-bold text-gray-800"><span x-text="results.queryBabyname"></span> Names found</h3>
                    <template x-for="babyname in results.babynames" :key="babyname.uuid">
                        <a :href="`/baby-name/${babyname.slug}`"
                            class="flex justify-between border-b p-2 last:border-b-0 hover:bg-gray-100 text-gray-800"
                        >
                        <span x-text="babyname.name"></span>
                        <!-- icon -->
                        </a>
                    </template>
                    <template x-if="results.queryBabyname > 10">
                        <div class="p-2 w-full flex justify-center text-center hover:bg-gray-100">
                            <a :href="`/baby-name?search=${results.keyword}`" class="w-full ">
                                <span class="font-semibold text-gray-800 capitalize">see all</span>
                            </a>
                        </div>
                    </template>
                </div>
            </template>

            <template x-if="results.activities?.length">
                <div class="p-2">
                    <h3 class="mb-2 font-bold text-gray-800"><span x-text="results.queryActivity"></span> Activities found</h3>
                    <template x-for="article in results.activities" :key="activity.id">
                        <a :href="`/activity/${activity.slug}`"
                            class="block border-b p-2 last:border-b-0 hover:bg-gray-100 text-gray-800"
                        >
                        <span x-text="activity.title"></span>
                        </a>
                    </template>
                    <template x-if="results.queryActivity > 10">
                        <div class="p-2 w-full flex justify-center text-center hover:bg-gray-100">
                            <a :href="`/activities?search=${results.keyword}`" class="w-full ">
                                <span class="font-semibold text-gray-800 capitalize">see all</span>
                            </a>
                        </div>
                    </template>
                </div>
            </template>

            <template x-if="results.articles?.length">
                <div class="p-2">
                    <h3 class="mb-2 font-bold text-gray-800"><span x-text="results.queryArticle"></span> Articles found</h3>
                    <template x-for="article in results.articles" :key="article.id">
                        <a :href="`/article/${article.slug}`"
                            class="block border-b p-2 last:border-b-0 hover:bg-gray-100 text-gray-800"
                        >
                        <span x-text="article.title"></span>
                        </a>
                    </template>
                    <template x-if="results.queryArticle > 10">
                        <div class="p-2 w-full flex justify-center text-center hover:bg-gray-100">
                            <a :href="`/articles?search=${results.keyword}`" class="w-full ">
                                <span class="font-semibold text-gray-800 capitalize">see all</span>
                            </a>
                        </div>
                    </template>
                </div>
            </template>

            <div x-show="isLoading" class="p-4 text-center">
                Loading...
            </div>

        </div>

    </div>
</div>
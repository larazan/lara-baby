<div class="relative z-20">
        <div x-data="{
            query: '',
            results: { keyword:'', queryBabyname:'', babynames: [] },
            isLoading: false,
            resetSearch() {
                this.query = '';
                this.results = { keyword:'', queryBabyname:'', babynames: [] };
            },
            async search() {
                if (this.query.length < 2) {
                    this.results = { keyword, queryBabyname, babynames: [] };
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
            class="relative w-full overflow"
        >
            <div class="relative flex w-full items-center">
                <div class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-4">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true" data-slot="icon" class="h-6 w-6 text-gray-400">
                        <path fill-rule="evenodd" d="M9 3.5a5.5 5.5 0 1 0 0 11 5.5 5.5 0 0 0 0-11ZM2 9a7 7 0 1 1 12.452 4.391l3.328 3.329a.75.75 0 1 1-1.06 1.06l-3.329-3.328A7 7 0 0 1 2 9Z" clip-rule="evenodd"></path>
                    </svg>
                </div>
                <x-input-search
                    type="text"
                    x-model="query"
                    @input.debounce.300ms="search()"
                    placeholder="Search name..."
                    class="w-full"
                />
                <div x-show="query.length >= 2" @click="resetSearch()" class="absolute right-1 cursor-pointer inline-flex items-center justify-center rounded-md text-sm font-medium ring-offset-background transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50 bg-transparent text-gray-400 h-10 px-2 py-2">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="size-4 text-gray-500">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
                    </svg>
                </div>
            </div>

            <div x-show="query.length >= 2"
                x-transition
                class="absolute z-50 mt-1 w-full max-h-80 overflow-y-scroll rounded border-2 border-gray-700 shadow-menu bg-white text-sm overflow overflow-y-auto2">

                <template x-if="results.babynames?.length">
                    <div class="p-2">
                        <h3 class="mb-2 font-bold text-gray-800 figtree-medium"><span x-text="results.queryBabyname"></span> Names found</h3>
                        <template x-for="babyname in results.babynames" :key="babyname.uuid">
                            <a :href="`/baby-name/${babyname.slug}`"
                                class="flex justify-between border-b p-2 figtree-reguler last:border-b-0 hover:bg-gray-100"
                            >
                                <span x-text="babyname.name"></span>
                                <!-- icon -->
                                <span x-show="babyname.gender_id == 1">
                                <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-gender-male"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M10 14m-5 0a5 5 0 1 0 10 0a5 5 0 1 0 -10 0" /><path d="M19 5l-5.4 5.4" /><path d="M19 5h-5" /><path d="M19 5v5" /></svg>
                                </span>
                                <span x-show="babyname.gender_id == 2">
                                <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-gender-female"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M12 9m-5 0a5 5 0 1 0 10 0a5 5 0 1 0 -10 0" /><path d="M12 14v7" /><path d="M9 18h6" /></svg>
                                </span>
                                <span x-show="babyname.gender_id == 3">
                                <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-gender-trasvesti"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M15 20a5 5 0 1 1 0 -10a5 5 0 0 1 0 10z" /><path d="M6 6l5.4 5.4" /><path d="M4 8l4 -4" /></svg>
                                </span>
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

                <div x-show="isLoading" class="p-4 text-center figtree-reguler">
                    Loading...
                </div>

            </div>
        </div>
    </div>
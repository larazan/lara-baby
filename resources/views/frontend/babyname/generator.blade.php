@extends('frontend.layout')

@section('content')

<main class=" bg-pink-200 mx-auto px-4 py-8">
<div x-data="fullNameGenerator()">
    <h1 class="text-2xl text-center md:text-3xl font-bold mb-6">Full Name Generator</h1>

    <div class="bg-white p-6 rounded-lg shadow-md mb-8">
        <div class="grid grid-cols-2 md:grid-cols-2 lg:grid-cols-2 gap-4 mb-4">
            <div>
                <label for="num_names" class="block text-gray-700 text-sm font-bold mb-2">Number of Names:</label>
                <select x-model="filters.num_names" id="num_names" class="shadow border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                    <option value="2">2 Names</option>
                    <option value="3">3 Names</option>
                </select>
            </div>
            <div>
                <label for="gender" class="block text-gray-700 text-sm font-bold mb-2">Gender:</label>
                <select x-model="filters.gender" id="gender" class="shadow border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                    <option value="">Any</option>
                    @foreach($genders as $key => $value)
                    <option value="{{ $key }}">{{ $value }}</option>
                    @endforeach
                </select>
            </div>
            
        </div>

        <div class="grid grid-cols-2 md:grid-cols-2 lg:grid-cols-2 gap-4 mb-4">
            <div>
                <label for="origin" class="block text-gray-700 text-sm font-bold mb-2">Origins:</label>
                <select x-model="filters.origins" id="origin" class="shadow border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                    <option value="">Any</option>
                    @foreach($origins as $o)
                    <option value="{{ $o->id }}">{{ $o->name }}</option>
                    @endforeach
                </select>
            </div>
            <div>
                <label for="limit" class="block text-gray-700 text-sm font-bold mb-2">Number of Suggestions:</label>
                <input type="number" x-model.debounce.500ms="filters.limit" id="limit" min="1" max="50" placeholder="e.g., 10" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
            </div>
        </div>

        <button @click="generateNames()" :disabled="loading" class="w-full bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
            <span x-show="!loading">Generate Names</span>
            <span x-show="loading">Generating...</span>
        </button>
    </div>

    {{-- Display Area for Results / Messages --}}
    <div x-show="loading" class="text-center text-blue-600 mt-4 text-lg">
        Loading...
    </div>

    <div x-show="error" class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4" role="alert" x-text="error"></div>

    <div x-show="!loading && suggestions.length > 0" class="bg-white p-6 rounded-lg shadow-md">
            <h2 class="text-2xl font-bold mb-4">Generated Names:</h2>
            <ul class="divide-y divide-gray-200">
                <template x-for="(combination, index) in suggestions" :key="index">
                    <li class="py-4">
                        {{-- 
                        <h3 class="text-xl font-semibold mb-2 text-gray-800">
                            <span x-text="combination.map(item => item.name).join(' ')"></span>
                        </h3>
                        --}}
                        <div class="flex flex-wrap gap-x-4 gap-y-2">
                            <template x-for="(namePart, nameIndex) in combination" :key="namePart.slug + '-' + nameIndex">
                                <div
                                    x-data="{ showPopover: false }"
                                    @mouseenter="showPopover = true"
                                    @mouseleave="showPopover = false"
                                    class="name-part-item text-gray-700"
                                    x-ref="namePartRef"
                                >
                                    <a :href="'/baby-name/'+ namePart.slug" class="ext-xl font-semibold mb-2 text-gray-800 capitalize cursor-pointer hover:underline underline-offset-2" x-text="namePart.name"></a>

                                    <div
                                        x-show="showPopover"
                                        x-transition:enter="transition ease-out duration-200"
                                        x-transition:enter-start="opacity-0 scale-90"
                                        x-transition:enter-end="opacity-100 scale-100"
                                        x-transition:leave="transition ease-in duration-150"
                                        x-transition:leave-start="opacity-100 scale-100"
                                        x-transition:leave-end="opacity-0 scale-90"
                                        class="popover border bg-gray-700 rounded-lg p-3 font-normal break-words whitespace-normal shadow-2xl text-sm max-w-64 border-blue-gray-50 text-white shadow-gray-500/10 focus:outline-none"
                                        x-anchor.bottom.left="$refs.namePartRef" {{-- Anchor to this specific name part --}}
                                    >
                                        <p class="font-bold mb-1 capitalize" x-text="namePart.name"></p>
                                        <p>meaning: <span x-text="namePart.meaning"></span></p>
                                    </div>
                                </div>
                            </template>
                        </div>
                    </li>
                </template>
            </ul>
        </div>

        <div x-show="!loading && suggestions.length === 0 && !error" class="bg-white p-6 rounded-lg shadow-md text-gray-600 text-center">
            No combinations generated yet. Adjust your filters and click 'Generate Names'.
        </div>

    {{-- 
    <div x-show="suggestions.length > 0 || error" class="bg-white p-6 rounded-lg shadow-md">
        <h2 class="text-2xl font-bold mb-4">Generated Names:</h2>
        <div x-if="error" class="text-red-500 mb-4" x-text="error"></div>
        <ul class="list-disc pl-5">
            <template x-for="(nameArray, index) in suggestions" :key="index">
                <li class="mb-2 text-lg" x-text="nameArray.join(' ')"></li>
            </template>
        </ul>
        <div x-if="suggestions.length === 0 && !error" class="text-gray-500">
            No suggestions found with current criteria. Try broadening your filters or adding more names to your database.
        </div>
    </div>
    --}}
</div>
</main>


@endsection

@push('style')

@endpush

@push('js')
<script>
    function fullNameGenerator() {
        return {
            filters: {
                num_names: 2,
                origins: '',
                gender: '',
                limit: 10, // Default number of suggestions
            },
            // availableOrigins: @json($origins), // Populated by Laravel directly
            suggestions: [],
            loading: false,
            error: null,

            // No need for fetchOrigins() now, as it's passed from Blade

            async generateNames() {
                this.loading = true;
                this.error = null;
                this.suggestions = [];

                try {
                     // Prepare filters for POST request
                     const payload = { ...this.filters };
                    // If origins is an empty string, set it to an empty array for the backend if needed
                    // Or, if your backend handles single string 'origin_id' for single select, leave it as is.
                    // Given your controller uses `whereIn` for `origins`, it expects an array.
                    // So, if single select, convert it to an array or adjust backend logic.
                    // For now, assuming your backend is flexible or you'll adjust single-select to multi-select.
                    // If origins is a single select and should be treated as a single value:
                    // if (payload.origins === '') {
                    //     delete payload.origins; // Remove if empty string
                    // } else {
                    //     payload.origins = [payload.origins]; // Wrap single ID in array
                    // }

                    const response = await fetch('{{ route("full_name_generator.generate") }}', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'Accept': 'application/json',
                            'X-CSRF-TOKEN': '{{ csrf_token() }}'
                        },
                        body: JSON.stringify(payload)
                    });

                    const data = await response.json();

                    if (!response.ok) {
                        // Handle validation errors from Laravel
                        if (response.status === 422 && data.errors) {
                            let errorMessages = [];
                            for (const field in data.errors) {
                                errorMessages.push(...data.errors[field]);
                            }
                            this.error = errorMessages.join('<br>'); // Join error messages
                        } else {
                            this.error = data.message || 'An unexpected error occurred during generation.';
                        }
                        return;
                    }

                    if (data.message) { // For specific messages from backend (e.g., "Not enough names...")
                        this.error = data.message;
                    } else {
                        this.suggestions = data.suggestions;
                        if (this.suggestions.length === 0) {
                            this.error = "No combinations found. Try broadening your criteria or ensuring enough unique names in your database.";
                        }
                    }

                } catch (e) {
                    console.error('Fetch error:', e);
                    this.error = 'Network error or unable to connect to server.';
                } finally {
                    this.loading = false;
                }
            }
        }
    }
</script>
@endpush
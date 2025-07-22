@extends('frontend.layout')

@section('content')

<main>
<div x-data="fullNameGenerator()" x-init="fetchOrigins()">
    <h1 class="text-3xl font-bold mb-6">Full Name Generator</h1>

    <div class="bg-white p-6 rounded-lg shadow-md mb-8">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4 mb-4">
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
                    <option value="male">Male</option>
                    <option value="female">Female</option>
                    <option value="unisex">Unisex</option>
                </select>
            </div>
            <div>
                <label for="limit" class="block text-gray-700 text-sm font-bold mb-2">Number of Suggestions:</label>
                <input type="number" x-model.debounce.500ms="filters.limit" id="limit" min="1" max="50" placeholder="e.g., 10" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
            </div>
        </div>

        <div class="mb-4">
            <label class="block text-gray-700 text-sm font-bold mb-2">Origins:</label>
            <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-2 h-48 overflow-y-auto border p-2 rounded">
                <template x-for="origin in availableOrigins" :key="origin">
                    <label class="inline-flex items-center">
                        <input type="checkbox" x-model="filters.origins" :value="origin" class="form-checkbox h-4 w-4 text-indigo-600">
                        <span class="ml-2 text-gray-700" x-text="origin"></span>
                    </label>
                </template>
            </div>
        </div>

        <button @click="generateNames()" :disabled="loading" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
            <span x-show="!loading">Generate Names</span>
            <span x-show="loading">Generating...</span>
        </button>
    </div>

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
</div>
</main>


@endsection

@push('js')
<script>
    function fullNameGenerator() {
        return {
            filters: {
                num_names: 2,
                origins: [],
                gender: '',
                limit: 10, // Default number of suggestions
            },
            availableOrigins: @json($origins), // Populated by Laravel directly
            suggestions: [],
            loading: false,
            error: null,

            // No need for fetchOrigins() now, as it's passed from Blade

            async generateNames() {
                this.loading = true;
                this.error = null;
                this.suggestions = [];

                try {
                    const response = await fetch('{{ route("full_name_generator.generate") }}', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'Accept': 'application/json',
                            'X-CSRF-TOKEN': '{{ csrf_token() }}'
                        },
                        body: JSON.stringify(this.filters)
                    });

                    const data = await response.json();

                    if (!response.ok) {
                        this.error = data.message || 'An error occurred during generation.';
                        return;
                    }

                    if (data.error) { // If the backend explicitly returned an error
                        this.error = data.error;
                    } else if (data.message) { // For specific messages from backend
                        this.error = data.message; // e.g., "Not enough names..."
                    } else {
                        this.suggestions = data.suggestions;
                        if (this.suggestions.length === 0 && !data.message) {
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
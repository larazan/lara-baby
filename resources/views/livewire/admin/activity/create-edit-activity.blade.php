<main class="max-w-4xl mx-auto pt-10 pb-12 px-0 lg:pb-16">
    <div class="lg:grid lg:gap-x-5">
        <div class="sm:px-6 lg:px-0 lg:col-span-9">


        <div class="bg-white p-8 rounded-lg shadow-xl">
    <h2 class="text-4xl font-extrabold mb-8 text-gray-800 border-b pb-4">
        {{ $receipt ? 'Edit Recipe: ' . $receipt->name : 'Create New Recipe' }}
    </h2>

    <form wire:submit="save">
        {{-- Receipt Details Section --}}
        <div class="mb-10 p-6 border border-gray-200 rounded-lg shadow-sm">
            <h3 class="text-2xl font-semibold mb-6 text-gray-700 border-b pb-3">Recipe Information</h3>
            <div class="mb-5">
                <label for="name" class="block text-gray-700 text-sm font-bold mb-2">Recipe Name:</label>
                <input type="text" id="name" wire:model.live="name"
                       class="shadow-sm appearance-none border border-gray-300 rounded-lg w-full py-3 px-4 text-gray-700 leading-tight focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition duration-200 ease-in-out">
                @error('name') <span class="text-red-600 text-xs italic mt-1 block">{{ $message }}</span> @enderror
            </div>

            <div class="mb-5">
                <label for="description" class="block text-gray-700 text-sm font-bold mb-2">Description:</label>
                <textarea id="description" wire:model.live="description" rows="5"
                          class="shadow-sm appearance-none border border-gray-300 rounded-lg w-full py-3 px-4 text-gray-700 leading-tight focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition duration-200 ease-in-out"
                          placeholder="Describe your delicious recipe..."></textarea>
                @error('description') <span class="text-red-600 text-xs italic mt-1 block">{{ $message }}</span> @enderror
            </div>

            {{-- Ingredients Section --}}
            <h4 class="text-xl font-semibold mb-4 text-gray-700 border-b pb-2">Ingredients:</h4>
            <div class="space-y-3 mb-4">
                @foreach ($ingredients as $index => $ingredient)
                    <div class="flex items-center gap-3">
                        <input type="text" wire:model.live="ingredients.{{ $index }}"
                               class="shadow-sm appearance-none border border-gray-300 rounded-lg w-full py-2.5 px-3 text-gray-700 leading-tight focus:outline-none focus:ring-1 focus:ring-blue-400 focus:border-transparent transition duration-200 ease-in-out"
                               placeholder="e.g., 2 cups flour">
                        @if (count($ingredients) > 1)
                            <button type="button" wire:click="removeIngredient({{ $index }})"
                                    class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-3 rounded-full text-xs shadow-md transition duration-200 ease-in-out transform hover:scale-105"
                                    title="Remove ingredient">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                                </svg>
                            </button>
                        @endif
                    </div>
                    @error('ingredients.' . $index) <span class="text-red-600 text-xs italic mt-1 block">{{ $message }}</span> @enderror
                @endforeach
            </div>
            <button type="button" wire:click="addIngredient"
                    class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-full text-sm shadow-md transition duration-200 ease-in-out transform hover:scale-105">
                Add Ingredient
            </button>
        </div>

        {{-- Instructions Section --}}
        <div class="mb-10 p-6 border border-gray-200 rounded-lg shadow-sm">
            <h3 class="text-2xl font-semibold mb-6 text-gray-700 border-b pb-3">Instructions</h3>
            <div class="space-y-6">
                @foreach ($instructions as $index => $instruction)
                    <div class="border border-blue-200 rounded-lg p-5 bg-blue-50 relative shadow-sm">
                        <h4 class="text-xl font-semibold text-blue-800 mb-4">Step {{ $instruction['step_number'] }}</h4>
                        @if (count($instructions) > 1)
                            <button type="button" wire:click="removeInstruction({{ $index }})"
                                    class="absolute top-3 right-3 bg-red-500 hover:bg-red-700 text-white font-bold py-1 px-3 rounded-full text-xs shadow-md transition duration-200 ease-in-out transform hover:scale-105"
                                    title="Remove step">
                                X
                            </button>
                        @endif

                        <div class="mb-4">
                            <label for="instruction-description-{{ $index }}" class="block text-gray-700 text-sm font-bold mb-2">Description:</label>
                            <textarea id="instruction-description-{{ $index }}" wire:model.live="instructions.{{ $index }}.description" rows="4"
                                      class="shadow-sm appearance-none border border-gray-300 rounded-lg w-full py-2.5 px-3 text-gray-700 leading-tight focus:outline-none focus:ring-1 focus:ring-blue-400 focus:border-transparent transition duration-200 ease-in-out"
                                      placeholder="Explain this step..."></textarea>
                            @error('instructions.' . $index . '.description') <span class="text-red-600 text-xs italic mt-1 block">{{ $message }}</span> @enderror
                        </div>

                        <div class="mb-4">
                            <label for="instruction-image-{{ $index }}" class="block text-gray-700 text-sm font-bold mb-2">Upload Image (Optional):</label>
                            <input type="file" id="instruction-image-{{ $index }}" wire:model.live="newInstructionImages.{{ $index }}"
                                   class="shadow-sm appearance-none border border-gray-300 rounded-lg w-full py-2.5 px-3 text-gray-700 leading-tight focus:outline-none focus:ring-1 focus:ring-blue-400 focus:border-transparent file:mr-4 file:py-2 file:px-4 file:rounded-md file:border-0 file:text-sm file:font-semibold file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100 transition duration-200 ease-in-out">
                            @error('newInstructionImages.' . $index) <span class="text-red-600 text-xs italic mt-1 block">{{ $message }}</span> @enderror

                            {{-- Show existing image if no new upload --}}
                            @if (isset($instruction['image_path']) && $instruction['image_path'] && (!isset($newInstructionImages[$index]) || !$newInstructionImages[$index]))
                                <div class="mt-3 flex items-center space-x-3">
                                    <p class="text-gray-600 text-sm">Current Image:</p>
                                    <img src="{{ Storage::url($instruction['image_path']) }}" class="w-28 h-28 object-cover rounded-md shadow-md border border-gray-200" alt="Instruction Image">
                                    <button type="button" wire:click="$set('instructions.{{ $index }}.image_path', null)"
                                            class="bg-red-400 hover:bg-red-600 text-white text-xs px-3 py-1.5 rounded-md shadow-sm transition duration-200 ease-in-out transform hover:scale-105">
                                        Remove Current Image
                                    </button>
                                </div>
                            @endif

                            {{-- Show temporary uploaded image preview --}}
                            @if (isset($newInstructionImages[$index]) && $newInstructionImages[$index])
                                <div class="mt-3">
                                    <p class="text-gray-600 text-sm">New Image Preview:</p>
                                    <img src="{{ $newInstructionImages[$index]->temporaryUrl() }}" class="w-28 h-28 object-cover rounded-md shadow-md border border-blue-200" alt="New Instruction Image Preview">
                                </div>
                            @endif

                            <div wire:loading wire:target="newInstructionImages.{{ $index }}" class="text-blue-600 text-sm mt-2 animate-pulse">Uploading image...</div>
                        </div>
                    </div>
                @endforeach
            </div>

            @error('instructions') <span class="text-red-600 text-xs italic mt-1 block">Please add at least one instruction step.</span> @enderror

            <button type="button" wire:click="addInstruction"
                    class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-full mt-6 text-sm shadow-md transition duration-200 ease-in-out transform hover:scale-105">
                Add Instruction Step
            </button>
        </div>

        {{-- Submit and Cancel Buttons --}}
        <div class="flex items-center justify-end gap-4 mt-8">
            <a href="{{ route('receipts.index') }}"
               class="inline-block align-baseline font-semibold text-lg text-gray-600 hover:text-gray-900 transition duration-150 ease-in-out">
                Cancel
            </a>
            <button type="submit"
                    class="bg-green-600 hover:bg-green-700 text-white font-bold py-3 px-6 rounded-md focus:outline-none focus:shadow-outline-green shadow-lg transition duration-300 ease-in-out transform hover:scale-105">
                <span wire:loading.remove wire:target="save">{{ $receipt ? 'Update Recipe' : 'Create Recipe' }}</span>
                <span wire:loading wire:target="save">Saving Recipe...</span>
            </button>
        </div>
    </form>
</div>


        </div>
    </div>
</main>


@push('js')
<script src="https://cdn.quilljs.com/1.3.6/quill.js"></script>
@endpush

@push('styles')
<link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
<style>
    .ql-editor {
        height: 180px !important;
    }
</style>
@endpush
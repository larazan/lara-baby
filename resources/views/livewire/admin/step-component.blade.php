<div class="border border-gray-300 bg-gray-100 px-4">
    <div class="pt-4">
        <h3 class="text-lg text-gray-800 font-bold ">Step</h3>
    </div>

    @foreach($items as $index => $item)
    <div class="first:border-t last:border-b">
        <div class="flex flex-col py-2">
            <div class="flex justify-end">
                <button type="button" wire:click="removeItem({{ $index }})" class="yl xy rounded-full">
                    <svg class="os sf du" viewBox="0 0 32 32">
                        <path d="M13 15h2v6h-2zM17 15h2v6h-2z"></path>
                        <path d="M20 9c0-.6-.4-1-1-1h-6c-.6 0-1 .4-1 1v2H8v2h1v10c0 .6.4 1 1 1h12c.6 0 1-.4 1-1V13h1v-2h-4V9zm-6 1h4v1h-4v-1zm7 3v9H11v-9h10z"></path>
                    </svg>
                </button>
            </div>
            <div class="flex space-x-1 justify-between items-center2">
                <div class="flex flex-col space-y-2 col-start-6 sm:col-span-3 w-6/12">
                    <input wire:model="items.{{ $index }}.title" type="text" autocomplete="given-name" class=" focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border border-gray-50 rounded-md" placeholder="step title" />
                    <div
                        class="flex justify-center rounded-md border border-dashed bg-slate-50 px-6 py-16"
                        x-bind:class="{ 'border-gray-900/50': dropping, 'border-gray-900/25': !dropping }"
                        x-data="{
                            dropping: false,
                        }"
                        x-on:dragover.prevent="dropping = true"
                        x-on:dragleave.prevent="dropping = false"
                        x-on:drop="dropping = false"
                        x-on:drop.prevent="
                            if ($event.dataTransfer.files.length !== 1) {
                                return
                            }

                            const files = $event.dataTransfer.files

                            @this.upload('file', files[0])
                        ">
                        <div class="text-center">
                            <div class="flex text-sm/6 text-gray-600">
                                <label for="file-upload" class="relative cursor-pointer rounded-md bg-white font-semibold text-indigo-600 focus-within:outline-none focus-within:ring-2 focus-within:ring-indigo-600 focus-within:ring-offset-2 hover:text-indigo-500">
                                    <span>Upload a file</span>
                                    <input id="file-upload" name="file-upload" type="file" class="sr-only" wire:model="items.{{ $index }}.file">
                                </label>
                                <p class="pl-1">or drag and drop</p>
                            </div>
                            <p class="text-xs/5 text-gray-600">PNG, JPG, GIF up to 10MB</p>
                        </div>
                    </div>
                </div>
                <div class="col-start-6 sm:col-span-3 w-6/12">
                    <textarea class="" wire:model="items.{{ $index }}.body"></textarea>
                </div>
                <div class="w-1/12 hidden justify-end">
                    <button type="button" wire:click="remove()" class="yl xy rounded-full">
                        <svg class="os sf du" viewBox="0 0 32 32">
                            <path d="M13 15h2v6h-2zM17 15h2v6h-2z"></path>
                            <path d="M20 9c0-.6-.4-1-1-1h-6c-.6 0-1 .4-1 1v2H8v2h1v10c0 .6.4 1 1 1h12c.6 0 1-.4 1-1V13h1v-2h-4V9zm-6 1h4v1h-4v-1zm7 3v9H11v-9h10z"></path>
                        </svg>
                    </button>
                </div>
            </div>

        </div>
    </div>
    @endforeach
    <div class="pt-2 pb-6">
        <button type="button" wire:model="addItem" class="btn hd xu ye">Add</button>
    </div>
</div>


@push('js')
<script src="https://cdn.quilljs.com/1.3.6/quill.js"></script>
@endpush

@push('styles')
<link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
<style>
    
</style>
@endpush
<main class="max-w-4xl mx-auto pt-10 pb-12 px-0 lg:pb-16">
    <div class="lg:grid lg:gap-x-5">
        <div class="sm:px-6 lg:px-0 lg:col-span-9">



            <div class="px-4 sm:px-6 lg:px-8 py-8 w-full max-w-9xl mx-auto">

                <div class="container max-w-screen-lg mx-auto cl border-slate-200">
                    <div>
                        <h2 class="gu tef text-slate-800 font-bold">Create Activity</h2>
                        <!-- <p class="text-gray-500 mb-6">Form is mobile responsive. Give it a try.</p> -->

                        <div class="bg-white rounded2 shadow-lg2 p-4 px-4 md:p-8 mb-6">
                            <div class="flex w-full text-sm grid-cols-1 md:space-x-3">
                                <div class="hidden md:block md:w-1/4 text-gray-600">
                                    <p class="font-medium text-lg">Activity Details</p>
                                    <p>Please fill out all the fields.</p>
                                </div>

                                <div class="w-full md:w-3/4 lg:col-span-2">
                                    <form wire:submit.prevent="createActivity">
                                        <div class="flex flex-col space-y-4">

                                            <div class="flex flex-col space-y-3" x-data="{openInput : false}">
                                                <div class="w-full flex flex-row justify-between">
                                                    <div class="w-1/2 flex flex-col col-span-6 sm:col-span-3">
                                                        <label for="first-name" class="flex flex-row pb-1 items-center space-x-2 text-sm font-medium text-gray-700">
                                                            Category
                                                            @if ($showMessage)
                                                            <span class="ml-2 text-xs text-green-700 italic">category added!</span>
                                                            @endif
                                                        </label>
                                                        <select wire:model="categoryId" class="h-10 border block appearance-none w-full bg-white border-gray-600 text-gray-700 py-2 px-4 pr-0 leading-tight focus:placeholder-gray-600 focus:text-gray-700 focus:outline-none">
                                                            <option value="">Select Category</option>
                                                            @foreach($categories as $cat)
                                                            <option value="{{ $cat->id }}">{{ $cat->name }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>

                                                    <div class="flex items-end">
                                                        <div class="btn bg-white cursor-pointer border-slate-200 hover--border-slate-300 yl xy" @click="openInput = ! openInput">Add new Category</div>
                                                    </div>
                                                </div>
                                                <div wire:ignore class="w-full flex flex-row pb-4 space-x-2 border-b items-center" x-show="openInput" x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0 scale-90" x-transition:enter-end="opacity-100 scale-100" x-transition:leave="transition ease-in duration-300" x-transition:leave-start="opacity-100 scale-100" x-transition:leave-end="opacity-0 scale-90">
                                                    <div class="w-1/2">
                                                        <input wire:model="categoryItem" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" type="text">
                                                    </div>
                                                    <div class="flex items-end">
                                                        <div class="btn  cursor-pointer border-slate-200 hover--border-slate-300 ho xi ye" wire:click.prevent="categoryAdd" @click="openInput = ! openInput">Save</div>
                                                        <div class="btn  cursor-pointer border-slate-200 hover--border-slate-300 ha xo ye" @click="openInput = ! openInput">Close</div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-start-1 sm:col-span-3">
                                                <label for="title" class="block text-sm font-medium text-gray-700">
                                                    Activity Title
                                                </label>
                                                <input wire:model="title" type="text" autocomplete="given-name" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" />
                                            </div>
                                            <div class="col-start-1 sm:col-span-3">
                                                <label for="title" class="block text-sm font-medium text-gray-700">
                                                    Body
                                                </label>

                                                <div class="@if($activityId == null){{ 'block' }}@else{{ 'hidden' }}@endif mt-2 bg-white border border-gray-200" wire:ignore>
                                                    <div class="h-42" x-data x-ref="quillEditor" x-init="
                                                            quill = new Quill($refs.quillEditor, {
                                                                theme: 'snow',
                                                                modules: {
                                                                    toolbar: [
                                                                        [{ 'header': [1, 2, 3, 4, 5, 6, false] }],
                                                                        ['bold', 'italic', 'underline'],
                                                                        ['blockquote', 'code-block'],
                                                                        ['image', 'code-block'],
                                                                        [{ 'list': 'ordered'}, { 'list': 'bullet' }],
                                                                        [{ 'color': [] }, { 'background': [] }],          
                                                                        [{ 'align': [] }],
                                                                    ]
                                                                },
                                                            });
                                                            quill.on('text-change', function() {
                                                                $dispatch('quill-input', quill.root.innerHTML);
                                                            });" x-on:quill-input.debounce.2000ms="@this.set('body', $event.detail)">
                                                        {!! $body !!}
                                                    </div>
                                                </div>

                                            </div>

                                            <div class="flex flex-row space-x-2 justify-between">

                                                <div class="col-span-6 sm:col-span-3">
                                                    <label for="title" class="block text-sm font-medium text-gray-700">
                                                        Author
                                                    </label>
                                                    <select wire:model="author" class="h-10 border block appearance-none w-full bg-white border-gray-600 text-gray-700 py-2 px-4 pr-0 leading-tight focus:placeholder-gray-600 focus:text-gray-700 focus:outline-none">
                                                        <option value="">Select Option</option>
                                                        @foreach($authors as $a)
                                                        <option value="{{ $a->id }}">{{ $a->name }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="flex space-x-2 justify-between">
                                                <div class="col-span-6 sm:col-span-3 w-full">
                                                    <label for="locale" class="block text-sm font-medium text-gray-700 pb-1">Language</label>
                                                    <select wire:model="locale" class="h-10 border block appearance-none w-full bg-white border-gray-600 text-gray-700 py-2 px-4 pr-0 leading-tight focus:placeholder-gray-600 focus:text-gray-700 focus:outline-none">
                                                        <option value="">Select Option</option>
                                                        @foreach($languages as $l)
                                                        <option value="{{ $l->code }}">{{ $l->name }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="col-span-6 sm:col-span-3 w-full">
                                                    <label for="first-name" class="block text-sm font-medium text-gray-700 pb-1">Status</label>
                                                    <select wire:model="activityStatus" class="h-10 border block appearance-none w-full bg-white border-gray-600 text-gray-700 py-2 px-4 pr-0 leading-tight focus:placeholder-gray-600 focus:text-gray-700 focus:outline-none">
                                                        <option value="">Select Option</option>
                                                        @foreach($statuses as $status)
                                                        <option value="{{ $status }}">{{ $status }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="col-span-6 sm:col-span-3">
                                                <label for="photo" class="block text-sm font-medium text-gray-700">
                                                    Image
                                                </label>
                                                <input wire:model="file" type="file" autocomplete="given-name" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" />
                                                @if ($oldImage)
                                                Photo Preview:
                                                <img src="{{ asset('storage/'.$oldImage) }}">
                                                @endif
                                                @if ($file)
                                                Photo Preview:
                                                <img src="{{ $file->temporaryUrl() }}">
                                                @endif
                                            </div>


                                            <div class="col-start-1 sm:col-span-3">
                                                <label for="title" class="block text-sm font-medium text-gray-700">
                                                    Meta Description
                                                </label>
                                                <textarea wire:model="metaDesc" type="text" autocomplete="given-name" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"></textarea>
                                            </div>

                                            <!-- material -->
                                            <div class="border border-gray-300 bg-gray-100 px-4">
                                                <div class="pt-4">
                                                    <h3 class="text-lg text-gray-800 font-bold ">Material</h3>
                                                </div>

                                                @foreach($inputs as $key => $input)
                                                <div class="">
                                                    <div class="flex flex-col py-2">
                                                        <div class="flex space-x-1 justify-between items-center">
                                                            <div class="col-start-6 sm:col-span-3 w-4/6">
                                                                <input wire:model="inputs.{{ $key }}.name" type="text" autocomplete="given-name" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" placeholder="material name" />
                                                                @error('inputs.'.$key.'.name')
                                                                <span class="pt-0 text-xs text-red-500 italic">{{ $message }}</span>
                                                                @enderror
                                                            </div>
                                                            <div class="col-start-6 sm:col-span-3 w-1/6">
                                                                <div class="flex">
                                                                    <input wire:model="inputs.{{ $key }}.qty" type="number" max="100" min="0" step="1" autocomplete="given-name" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" placeholder="Qty" />
                                                                </div>
                                                                @error('inputs.'.$key.'.qty')
                                                                <span class="pt-0 text-xs text-red-500 italic">{{ $message }}</span>
                                                                @enderror
                                                            </div>
                                                            <div class="w-1/6 flex justify-end">
                                                                <button type="button" wire:click="remove({{ $key }})" class="yl xy rounded-full">
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
                                                    <button type="button" wire:click="add" class="btn hd xu ye">Add</button>
                                                </div>
                                            </div>
                                            <!--  -->

                                            <!-- Step -->
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
                                                    <button type="button" wire:click="addItem" class="btn hd xu ye">Add</button>
                                                </div>
                                            </div>
                                            <!--  -->

                                            <div class="md:col-span-5 text-right">
                                                <div class="inline-flex items-end space-x-2">
                                                    <a href="{{ url('admin/activity/all') }}" class="btn border-slate-200 hover--border-slate-300 text-indigo-500">Back</a>
                                                    <button type="button" wire:click="createActivity" class="btn ho xi ye">Submit</button>

                                                </div>
                                            </div>

                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

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
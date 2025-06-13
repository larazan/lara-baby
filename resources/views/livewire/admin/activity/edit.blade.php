<main class="max-w-4xl mx-auto pt-10 pb-12 px-4 lg:pb-16">
    <div class="lg:grid lg:gap-x-5">
        <div class="sm:px-6 lg:px-0 lg:col-span-9">

                <div class="px-4 sm:px-6 lg:px-8 py-8 w-full max-w-9xl mx-auto">

                    <div class="container max-w-screen-lg mx-auto cl border-slate-200">
                        <div>
                            <h2 class="gu tef text-slate-800 font-bold">Edit Activity</h2>
                            <!-- <p class="text-gray-500 mb-6">Form is mobile responsive. Give it a try.</p> -->

                            <div class="bg-white rounded2 shadow-lg2 p-4 px-4 md:p-8 mb-6">
                                <div class="flex w-full text-sm grid-cols-1 md:space-x-3">
                                    <div class="hidden md:block md:w-1/4 text-gray-600">
                                        <p class="font-medium text-lg">Activity Details</p>
                                        <p>Please fill out all the fields.</p>
                                    </div>

                                    <div class="w-full md:w-3/4 lg:col-span-2">
                                        <form>
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

                                                    <div class="mt-2 bg-gray-100" wire:ignore>
                                                    
                                                    <div 
                                                        class="h-64 bg-gray-50" 
                                                        x-data 
                                                        x-ref="quillEditor" 
                                                        x-init="
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
                                                            quill.root.innerHTML = $body;
                                                            quill.on('text-change', function () {
                                                                $dispatch('quill-input', quill.root.innerHTML);
                                                            });
                                                        "
                                                        x-on:quill-input.debounce.2000ms="@this.set('body', $event.detail)"
                                                    >
                                                        {!! $body !!}
                                                    </div>
                                                </div>

                                                </div>
                                                
                                                <div class="flex flex-row space-x-1 justify-between">
                                                   
                                                    <div class="col-span-6 sm:col-span-3 w-full">
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

                                                <div class="md:col-span-5 text-right">
                                                    <div class="inline-flex items-end space-x-2">
                                                        <a href="{{ url('admin/activity/all') }}" class="btn border-slate-200 hover--border-slate-300 text-indigo-500">Back</a>
                                                        <button type="button" wire:click="updateActivity" class="btn ho xi ye">Submit</button>
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
    .ql-editor{
    height: 300px!important;
 }
</style>    
@endpush
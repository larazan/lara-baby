<main class="max-w-4xl mx-auto pt-10 pb-12 px-4 lg:pb-16">
    <div class="lg:grid lg:gap-x-5">
        <div class="sm:px-6 lg:px-0 lg:col-span-9">

            <div class="px-4 sm:px-6 lg:px-8 py-8 w-full max-w-9xl mx-auto">

                <div class="container max-w-screen-lg mx-auto cl border-slate-200">
                    <div>
                        <h2 class="gu tef text-slate-800 font-bold">Edit Article</h2>
                        <!-- <p class="text-gray-500 mb-6">Form is mobile responsive. Give it a try.</p> -->

                        <div class="bg-white rounded2 shadow-lg2 p-4 px-4 md:p-8 mb-6">
                            <div class="flex w-full text-sm grid-cols-1 md:space-x-3">
                                <div class="hidden md:block md:w-1/4 text-gray-600">
                                    <p class="font-medium text-lg">Article Details</p>
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
                                                    Article Title
                                                </label>
                                                <input wire:model="title" type="text" autocomplete="given-name" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" />
                                            </div>
                                            <div class="col-start-1 sm:col-span-3">
                                                <label for="title" class="block text-sm font-medium text-gray-700">
                                                    Body
                                                </label>
                                                {{-- Quill Editor for Edit --}}
                                                <div
                                                    wire:ignore
                                                    x-data="{
                                quill: null,
                                body: @entangle('body').live,
                                init() {
                                    this.quill = new Quill('#edit_editor', {
                                        theme: 'snow',
                                        modules: {
                                            toolbar: [
                                                [{ 'header': [1, 2, 3, 4, 5, 6, false] }],
                                                ['bold', 'italic', 'underline', 'strike'],
                                                [{ 'list': 'ordered'}, { 'list': 'bullet' }],
                                                [{ 'align': [] }],
                                                ['link', 'image'],
                                                ['clean']
                                            ]
                                        }
                                    });

                                    // Convert initial HTML body to Delta and set it
                                    if (this.body) {
                                        let delta = this.quill.clipboard.convert(this.body);
                                        this.quill.setContents(delta);
                                    } else {
                                        this.quill.setContents([]);
                                    }

                                    this.quill.on('text-change', () => {
                                        this.body = this.quill.root.innerHTML;
                                    });

                                    // Listen for Livewire events to reinitialize Quill body
                                    Livewire.on('quill-init-edit', (event) => {
                                        if (event.body) {
                                            let delta = this.quill.clipboard.convert(event.body);
                                            this.quill.setContents(delta);
                                        } else {
                                            this.quill.setContents([]);
                                        }
                                    });
                                }
                            }">
                                                    <div id="edit_editor" class="h-48 bg-white border border-gray-300 rounded"></div>
                                                </div>
                                                <!--  -->

                                                @error('body') <span class="text-red-500 text-xs italic">{{ $message }}</span> @enderror
                                            </div>

                                            <div class="col-start-1 sm:col-span-3">
                                                <label for="title" class="block text-sm font-medium text-gray-700">
                                                    Tags
                                                </label>
                                                <div>
                                                    <div x-data="{tags: @entangle('tags'), newTag: '' }">
                                                        <template x-for="tag in tags">
                                                            <input type="hidden" :value="tag" name="tags">
                                                        </template>

                                                        <div class="max-w-sm w-full ">
                                                            <div class="tags-input">

                                                                <input class="appearance-none border py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline mt-1 focus:ring-indigo-500 focus:border-2 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-600" placeholder="Enter some tags" @keydown.enter.prevent="if (newTag.trim() !== '') tags.push(newTag.trim()); newTag = ''" @keydown.backspace="if (newTag.trim() === '') tags.pop()" x-model="newTag">

                                                                <template x-for="tag in tags" :key="tag">
                                                                    <div class="bg-gray-200 inline-flex items-center text-sm rounded mt-2 mr-1">
                                                                        <span class="ml-2 mr-1 leading-relaxed truncate max-w-xs" x-text="tag"></span>
                                                                        <button type="button" class="w-6 h-8 inline-block align-middle text-gray-500 hover:text-gray-600 focus:outline-none" @click="tags = tags.filter(i => i !== tag)">
                                                                            <svg class="w-6 h-6 fill-current mx-auto" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                                                                <path fill-rule="evenodd" d="M15.78 14.36a1 1 0 0 1-1.42 1.42l-2.82-2.83-2.83 2.83a1 1 0 1 1-1.42-1.42l2.83-2.82L7.3 8.7a1 1 0 0 1 1.42-1.42l2.83 2.83 2.82-2.83a1 1 0 0 1 1.42 1.42l-2.83 2.83 2.83 2.82z" />
                                                                            </svg>
                                                                        </button>
                                                                    </div>
                                                                </template>

                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="flex flex-row justify-between">
                                                <div class="col-start-1 sm:col-span-3">
                                                    <label for="title" class="block text-sm font-medium text-gray-700">
                                                        Url
                                                    </label>
                                                    <input wire:model="url" type="text" autocomplete="given-name" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" />
                                                </div>
                                                <div class="hidden col-start-1 sm:col-span-3">
                                                    <label for="title" class="block text-sm font-medium text-gray-700">
                                                        Embed Url
                                                    </label>
                                                    <input wire:model="embedUrl" type="text" autocomplete="given-name" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" />
                                                </div>
                                            </div>

                                            <div class="flex flex-row space-x-1 justify-between">
                                                <div class="col-start-1 sm:col-span-3">
                                                    <label for="title" class="block text-sm font-medium text-gray-700">
                                                        Published At
                                                    </label>

                                                    <x-flatpicker wire:model="publishedAt"></x-flatpicker>
                                                </div>
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
                                                    <label for="first-name" class="block text-sm font-medium text-gray-700">Status</label>
                                                    <select wire:model="articleStatus" class="h-10 border block appearance-none w-full bg-white border-gray-600 text-gray-700 py-2 px-4 pr-0 leading-tight focus:placeholder-gray-600 focus:text-gray-700 focus:outline-none">
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
                                                    Meta Title
                                                </label>
                                                <input wire:model="metaTitle" type="text" autocomplete="given-name" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" />
                                            </div>
                                            <div class="col-start-1 sm:col-span-3">
                                                <label for="title" class="block text-sm font-medium text-gray-700">
                                                    Meta Keyword
                                                </label>
                                                <input wire:model="metaKeyword" type="text" autocomplete="given-name" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" />
                                            </div>
                                            <div class="col-start-1 sm:col-span-3">
                                                <label for="title" class="block text-sm font-medium text-gray-700">
                                                    Meta Description
                                                </label>
                                                <textarea wire:model="metaDesc" type="text" autocomplete="given-name" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"></textarea>
                                            </div>


                                            <div class="md:col-span-5 text-right">
                                                <div class="inline-flex items-end space-x-2">
                                                    <a href="{{ url('admin/article/all') }}" class="btn border-slate-200 hover--border-slate-300 text-indigo-500">Back</a>
                                                    <button type="button" wire:click="updateArticle" class="btn ho xi ye">Update</button>
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
        height: 300px !important;
    }
</style>
@endpush
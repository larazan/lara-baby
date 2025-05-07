<main class="max-w-4xl mx-auto pt-0 pb-12 px-4 lg:pb-16">
    <div class="lg:grid lg:gap-x-5">
        <div class="sm:px-6 lg:px-0 lg:col-span-9">


            <div class="px-4 sm:px-6 lg:px-8 py-8 w-full max-w-9xl mx-auto">

                <div class="container max-w-screen-lg mx-auto cl border-slate-200">
                    <div>
                        <h2 class="gu tef text-slate-800 font-bold">Import Baby Name</h2>
                        <!-- <p class="text-gray-500 mb-6">Form is mobile responsive. Give it a try.</p> -->

                        <div class="bg-white rounded2 shadow-lg2 p-4 px-4 md:p-8 mb-6">
                            <div class="flex w-full text-sm grid-cols-1 ">
                               

                                <div class="w-full lg:col-span-2 space-y-6 divide-y-2">
                                    <form wire:submit.prevent="import">
                                        <div class="flex flex-col space-y-4">

                                            <div class="flex space-x-2 justify-between">
                                                <div class="w-1/2 flex flex-col col-span-6 sm:col-span-3">
                                                    <label for="locale" class="hidden block2 text-sm font-medium text-gray-700 pb-1">Religion</label>
                                                    <select wire:model="religionId" class="h-10 border block appearance-none w-full bg-white border-gray-600 text-gray-700 py-2 px-4 pr-0 leading-tight focus:placeholder-gray-600 focus:text-gray-700 focus:outline-none">
                                                        <option value="">Select Religion</option>
                                                        @foreach($religions as $r)
                                                        <option value="{{ $r->id }}">{{ $r->name }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="col-span-6 sm:col-span-3 w-1/2">
                                                    <label for="locale" class="hidden block2 text-sm font-medium text-gray-700 pb-1">Language</label>
                                                    <select wire:model="locale" class="h-10 border block appearance-none w-full bg-white border-gray-600 text-gray-700 py-2 px-4 pr-0 leading-tight focus:placeholder-gray-600 focus:text-gray-700 focus:outline-none">
                                                        <option value="">Select Language</option>
                                                        @foreach($languages as $l)
                                                        <option value="{{ $l->code }}">{{ $l->name }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="flex space-x-2 justify-between">
                                                <div class="w-1/2 flex flex-col col-span-6 sm:col-span-3">
                                                    <label for="locale" class="hidden block2 text-sm font-medium text-gray-700 pb-1">Country</label>
                                                    <select wire:model="countryId" class="h-10 border block appearance-none w-full bg-white border-gray-600 text-gray-700 py-2 px-4 pr-0 leading-tight focus:placeholder-gray-600 focus:text-gray-700 focus:outline-none">
                                                        <option value="">Select Country</option>
                                                        @foreach($countries as $c)
                                                        <option value="{{ $c->id }}">{{ $c->name }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="col-span-6 sm:col-span-3 w-1/2">
                                                    <label for="locale" class="hidden block2 text-sm font-medium text-gray-700 pb-1">Gender</label>
                                                    <select wire:model="genderId" class="h-10 border block appearance-none w-full bg-white border-gray-600 text-gray-700 py-2 px-4 pr-0 leading-tight focus:placeholder-gray-600 focus:text-gray-700 focus:outline-none">
                                                        <option value="">Select Gender</option>
                                                        @foreach($genders as $key => $value)
                                                        <option value="{{ $key }}">{{ $value }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="col-span-6 sm:col-span-3">
                                                <label for="file" class="block text-sm font-medium text-gray-700">
                                                    File
                                                </label>
                                                <input wire:model="file" type="file" autocomplete="given-name" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" />
                                            </div>

                                        </div>
                                    </form>
                                    
                                    <div class="flex justify-start pt-4 text-right">
                                        <div class="inline-flex items-end space-x-2">
                                            <a href="{{ url('admin/babynames') }}" class="btn border-slate-200 hover--border-slate-300 text-indigo-500">Back</a>
                                            <button type="button" wire:click="import" class="btn ho xi ye">Save</button>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>


        </div>
    </div>
</main>


<div class="vs jj ttm vl ou uf na">

<!-- Loading -->
<x-loading-indicator />

    <!-- Page header -->
    <div class="je jd jc ii">

        <!-- Left: Title -->
        <div class="ri _y">
            <h1 class="gu teu text-slate-800 font-bold">FAQs</h1>
        </div>

        <!-- Right: Actions -->
        <div class="sn am jo az jp ft">

            <!-- Search form -->
            <form class="y">
                <label for="action-search" class="d">Search</label>
                <input wire:model="search" id="action-search" class="s me xq" type="search" placeholder="Search by name">
                <button class="g w j kk" type="submit" aria-label="Search">
                    <svg class="oo sl ub du gq kj ml-3 mr-2" viewBox="0 0 16 16" xmlns="http://www.w3.org/2000/svg">
                        <path d="M7 14c-3.86 0-7-3.14-7-7s3.14-7 7-7 7 3.14 7 7-3.14 7-7 7zM7 2C4.243 2 2 4.243 2 7s2.243 5 5 5 5-2.243 5-5-2.243-5-5-5z"></path>
                        <path d="M15.707 14.293L13.314 11.9a8.019 8.019 0 01-1.414 1.414l2.393 2.393a.997.997 0 001.414 0 .999.999 0 000-1.414z"></path>
                    </svg>
                </button>
            </form>

            <!-- Create faq button -->
            <button class="btn ho xi ye" wire:click="showCreateModal">
                <svg class="oo sl du bf ub" viewBox="0 0 16 16">
                    <path d="M15 7H9V1c0-.6-.4-1-1-1S7 .4 7 1v6H1c-.6 0-1 .4-1 1s.4 1 1 1h6v6c0 .6.4 1 1 1s1-.4 1-1V9h6c.6 0 1-.4 1-1s-.4-1-1-1z"></path>
                </svg>
                <span class="hidden trm nq">Create FAQs</span>
            </button>
        </div>

    </div>

    <!-- More actions -->
    <div class="je jd jc ii">

        <!-- Left side -->
        <div class="ri _y">
        
        </div>

        <!-- Right side -->
        <div class="sn am jo az jp ft">

            <!-- Delete button -->
            <div class="table-items-action" :class:"{ {{ count($mySelected) > 0 ? '' : 'hidden' }} }">
                <div class="flex items-center">
                    <div class="hidden2 tnh text-sm gm mr-2 lm"><span class="table-items-count">{{ count($mySelected) }}</span> items selected</div>
                    <button class="btn bg-white border-slate-200 hover--border-slate-300 yl xy" wire:click.prevent="deleteSelected">Delete</button>
                </div>
            </div>

            <!-- Filter button -->
            <select wire:model="sort" id="sort" class="a">
                <option value="asc">Asc</option>
                <option value="desc">Desc</option>
            </select>

            <select wire:model="perPage" id="filter" class="a">
                <option value="5">5 Per Page</option>
                <option value="10">10 Per Page</option>
                <option value="15">15 Per Page</option>
            </select>
        </div>

    </div>

    <!-- Table -->
    <div class="bg-white bd rounded-sm border border-slate-200 rc">
        <header class="vc vu">
            <h2 class="gh text-slate-800">Faqs List<span class="gq gp"></span></h2>
        </header>
        <div x-data="">

            <!-- Table -->
            <div class="lf">
                <table class="ux ou">
                    <!-- Table header -->
                    <thead class="go gh gv text-slate-500 hp co cs border-slate-200">
                        <tr>
                            <th class="vi wy w_ vo lm of">
                                <div class="flex items-center">
                                    <label class="inline-flex">
                                        <span class="d">Select all</span>
                                        <input id="parent-checkbox" class="i" type="checkbox" @click="toggleAll" wire:model="selectAll">
                                        <input type="hidden" wire:model="firstId" value="{{  $faqs[0]->id }}" />
                                    </label>
                                </div>
                            </th>
                           
                            <th class="vi wy w_ vo lm">
                                <div class="gh gt">Question</div>
                            </th>
                            <th class="vi wy w_ vo lm">
                                <div class="gh gt">Answer</div>
                            </th>
                            <th class="vi wy w_ vo lm">
                                <div class="gh gt">Status</div>
                            </th>
                           
                            <th class="vi wy w_ vo lm">
                                <div class="gh gt">Date</div>
                            </th>
                            <th class="vi wy w_ vo lm">
                                <div class="gh gt">Actions</div>
                            </th>
                        </tr>
                    </thead>
                    <!-- Table body -->
                    <tbody class="text-sm le lr" wire:sortable="updateFaqOrder">
                        <!-- Row -->

                        @if ($faqs->count() > 0)
                        @foreach ($faqs as $faq)
                        <tr wire:sortable.item="{{ $faq->id }}" wire:key="faq-{{ $faq->id }}" wire:sortable.handle>
                            <td class="vi wy w_ vo lm of">
                                <div class="flex items-center">
                                    <label class="inline-flex">
                                        <span class="d">Select</span>
                                        <input class="table-item i" type="checkbox" @click="uncheckParent" wire:model="mySelected" value="{{ $faq->id }}">
                                    </label>
                                </div>
                            </td>
                           
                            <td class="vi wy w_ vo lm">
                                <div class="gp text-slate-800">{!! nl2br(General::smart_wordwrap($faq->question, 80)) !!}</div>
                            </td>
                            <td class="vi wy w_ vo lm">
                                <div class="gp ">{!! nl2br(General::smart_wordwrap($faq->answer, 80)) !!}</div>
                            </td>
                            <td class="vi wy w_ vo lm">
                                @if ($faq->status === 'inactive')
                                    <div class="inline-flex gp hf yl rounded-full gn vp vd">{{ $faq->status }}</div>
                                @endif 

                                @if ($faq->status === 'active')
                                    <div class="inline-flex gp hc ys rounded-full gn vp vd">{{ $faq->status }}</div>
                                @endif 
                            </td>
                    

                            <td class="vi wy w_ vo lm">
                                <div>{{ $faq->created_at->format('d-m-Y') }}</div>
                            </td>

                            <td class="vi wy w_ vo lm of">
                                <div class="fm">
                                    <button class="gq xv rounded-full" wire:click="showEditModal({{ $faq->id }})">
                                    <span class=" d">Edit</span>
                                        <svg class="os sf du" viewBox="0 0 32 32">
                                            <path d="M19.7 8.3c-.4-.4-1-.4-1.4 0l-10 10c-.2.2-.3.4-.3.7v4c0 .6.4 1 1 1h4c.3 0 .5-.1.7-.3l10-10c.4-.4.4-1 0-1.4l-4-4zM12.6 22H10v-2.6l6-6 2.6 2.6-6 6zm7.4-7.4L17.4 12l1.6-1.6 2.6 2.6-1.6 1.6z"></path>
                                        </svg>
                                    </button>

                                    <button class="yl xy rounded-full" wire:click="deleteModal({{ $faq->id }})">
                                    <span class=" d">Delete</span>
                                        <svg class="os sf du" viewBox="0 0 32 32">
                                            <path d="M13 15h2v6h-2zM17 15h2v6h-2z"></path>
                                            <path d="M20 9c0-.6-.4-1-1-1h-6c-.6 0-1 .4-1 1v2H8v2h1v10c0 .6.4 1 1 1h12c.6 0 1-.4 1-1V13h1v-2h-4V9zm-6 1h4v1h-4v-1zm7 3v9H11v-9h10z"></path>
                                        </svg>
                                    </button>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                        @else
                        <tr>
                            <td class="vi wy w_ vo lm" colspan="8">No records found</td>
                        </tr>
                        @endif
                    </tbody>
                </table>

            </div>
        </div>
    </div>

    
    {{ $faqs->links() }}

    <x-dialog-modal wire:model="showFaqModal" class="">

        @if ($faqId)
        <x-slot name="title" class="border-b">Update Faq</x-slot>
        @else
        <x-slot name="title" class="border-b bg-slate-200">
            <span class="font-semibold">Create Faq</span>
        </x-slot>
        @endif

        <x-slot name="content">
            <div class="border-t">
                <div class="vc vu ">
                    <div class="fw">

                        <form>
                            <div class="">
                                <div class="">
                                    <div class="flex flex-col space-y-3">
                                        
                                        <div class="col-start-1 sm:col-span-3">
                                            <label for="title" class="block text-sm font-medium text-gray-700">
                                                Faq Question
                                            </label>
                                            <textarea wire:model="question" type="text" autocomplete="given-name" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" ></textarea>
                                            
                                            @error('question')
                                                <div class="go re yl">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="col-start-1 sm:col-span-3">
                                            <label for="title" class="block text-sm font-medium text-gray-700">
                                                Faq Answer
                                            </label>
                                            <textarea wire:model="answer" type="text" autocomplete="given-name" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" ></textarea>
                                            @error('answer')
                                                <div class="go re yl">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        
                                        <div class="col-span-6 sm:col-span-3">
                                            <label for="first-name" class="block text-sm font-medium text-gray-700">Status</label>
                                            <select wire:model="faqStatus" class="h-full rounded-r border-t border-r border-b block appearance-none w-full bg-white border-gray-300 text-gray-700 py-2 px-4 pr-8 leading-tight focus:placeholder-gray-600 focus:text-gray-700 focus:outline-none">
                                                <option value="" >Select Option</option>
                                                @foreach($statuses as $status)
                                                <option value="{{ $status }}">{{ $status }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </x-slot>
        <x-slot name="footer">
            <div class="border-slate-200">
                <div class="flex flex-wrap justify-end fc">
                    <x-button wire:click="closeFaqModal" class="border-slate-200 hover:text-white hover--border-slate-300 g_">Cancel</x-button>
                    @if ($faqId)
                    <x-button wire:click="updateFaq" class=" ho xi ye">Update</x-button>
                    @else
                    <x-button wire:click="createFaq" class=" ho xi ye2">Create</x-button>
                    @endif
                </div>
            </div>

        </x-slot>
    </x-dialog-modal>

    <!-- modal delete confirmation -->
    <x-dialog-modal wire:model="showConfirmModal" class="">

        
        <x-slot name="title" class="border-b bg-slate-200">
            <span class="font-semibold">Delete Confirm</span>
        </x-slot>
        

        <x-slot name="content">
            <div class="border-t">
                <div class="vc vu ">
                    <div class="fw">

                        
                            <div class="">
                                <div class="">
                                    <div class="flex flex-col space-y-3">
                                        <div class="flex max-w-auto text-center justify-center items-center">
                                            <div class="text-lg font-semibold ">
                                            <p>Are you sure want to delete?</p>
                                            </div>
                                        </div>
                                        
                                    </div>
                                </div>
                            </div>
                        
                    </div>
                </div>
            </div>
        </x-slot>
        <x-slot name="footer">
            <div class="border-slate-200">
                <div class="flex flex-wrap justify-end fc">
                    <x-button wire:click="closeConfirmModal" class="border-slate-200 hover:text-white  g_">Cancel</x-button>
                    <x-button wire:click.prevent="delete()" class=" ho xi ye2">Delete</x-button>
                </div>
            </div>

        </x-slot>
    </x-dialog-modal>

</div>

@push('js')
<script src="https://cdn.jsdelivr.net/gh/livewire/sortable@v0.x.x/dist/livewire-sortable.js"></script>
@endpush

<!-- @push('js')
<script>
    $('.page-item').on('click', function(event) {
        Livewire.emit('resetMySelected');
    })
    // A basic demo function to handle "select all" functionality
    // document.addEventListener('alpine:init', () => {
    //     Alpine.data('handleSelect', () => ({
    //         selectall: false,
    //         selectAction() {
    //             countEl = document.querySelector('.table-items-action');
    //             if (!countEl) return;
    //             checkboxes = document.querySelectorAll('input.table-item:checked');
    //             document.querySelector('.table-items-count').innerHTML = checkboxes.length;
    //             if (checkboxes.length > 0) {
    //                 countEl.classList.remove('hidden');
    //             } else {
    //                 countEl.classList.add('hidden');
    //             }
    //         },
    //         toggleAll() {
    //             this.selectall = !this.selectall;
    //             checkboxes = document.querySelectorAll('input.table-item');
    //             [...checkboxes].map((el) => {
    //                 el.checked = this.selectall;
    //             });
    //             this.selectAction();
    //         },
    //         uncheckParent() {
    //             this.selectall = false;
    //             document.getElementById('parent-checkbox').checked = false;
    //             this.selectAction();
    //         }
    //     }))
    // })

    
</script>
@endpush -->
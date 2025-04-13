      
<section class="py-2 bg-white md:py-4 md:text-sm w-fit overflow-auto">
    <div class="grid-container2 px-0 lg:px-0  w-full">
        <nav aria-label="breadcrumbs">
            <div class="relative w-full">

                <ul class="scrollbar-fix flex flex-row flex-nowrap2 justify-start items-center md:items-start overflow-hidden no-scrollbar2">
                    
                    @if ($breadcrumbs_data['current_page_title'] != '')
                        @foreach ($breadcrumbs_data['breadcrumbs_array'] as $key => $value)
                            <li class="@if($value == 'Category'){{ '' }}@else{{ 'before:inline-flex before:items-center before:px-1 before:text-sm before:content-[">"] text-black text-[11px] font-medium flex items-center uppercase leading-3 opacity-70' }}@endif ">
                                <a href="{{ $key }}" class="whitespace-nowrap text-xs md:text-sm font-semibold hover:underline text-black uppercase leading-3 opacity-70 truncate" >
                                    <p class="break-keep whitespace-nowrap truncate">{{ $value }}</p>
                                </a>
                            </li>
                        @endforeach
                        <li class='before:inline-flex before:items-center before:px-1 before:text-sm before:content-[">"] text-black font-medium flex items-center uppercase leading-3 opacity-70'>
                            <p class="whitespace-nowrap text-xs md:text-sm font-semibold  text-black uppercase leading-3 opacity-70 truncate">
                                <span class="break-keep whitespace-nowrap truncate">{{ $breadcrumbs_data['current_page_title'] }}</span>
    </p>
                        </li>
                    @else
                        @foreach ($breadcrumbs_data['breadcrumbs_array'] as $key => $value)
                            <li class="@if($value == 'Home'){{ '' }}@else{{ 'before:inline-flex before:items-center before:px-1 before:text-sm before:content-[">"] text-black text-[11px] font-medium  uppercase leading-3 opacity-70' }}@endif ">
                                <a href="{{ $key }}" class="whitespace-nowrap text-xs md:text-sm font-semibold hover:underline text-black uppercase leading-3 opacity-70 truncate" >
                                    <span class="break-keep whitespace-nowrap truncate">{{ $value }}</span>
                                </a>
                            </li>
                        @endforeach
                    @endif

                </ul>
            </div>
        </nav>
    </div>
</section>
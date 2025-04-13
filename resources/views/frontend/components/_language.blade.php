<div class="hidden2 md:block2 relative" x-data="{ isOpen: false}">
    <button
        @click="isOpen = !isOpen"
        @keydown.escape="isOpen = false"
        class="flex items-center space-x-0.5"
    >
        <div class="hidden md:block">
            <span class=" fi @if(LaravelLocalization::getCurrentLocale() == 'en'){{ 'fi-us' }}@else{{ 'fi-'.LaravelLocalization::getCurrentLocale() }}@endif "></span>
        </div>
        <span class="cursor-pointer flex flex-row items-end text-xs"> {{ strtoupper(LaravelLocalization::getCurrentLocale()) }}</span>
        <svg class="-ml-1" :class="isOpen ? 'rotate-180 transition duration-300' : 'transition duration-300'" fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24">
            <path d="M15.3 9.3a1 1 0 0 1 1.4 1.4l-4 4a1 1 0 0 1-1.4 0l-4-4a1 1 0 0 1 1.4-1.4l3.3 3.29 3.3-3.3z" class="heroicon-ui"></path>
        </svg>
    </button>
    <ul x-show="isOpen"
        @click.away="isOpen = false"
        class="absolute bg-white shadow overflow-hidden rounded w-12 border mt-2 py-0 right-0 z-20">
        @foreach (LaravelLocalization::getSupportedLanguagesKeys() as $locale)
        <li>
            <a class="flex items-center space-x-1 px-2 py-1.5 text-xs hover:bg-gray-100" href="{{ LaravelLocalization::getLocalizedURL($locale) }}">
                <span class="fi @if($locale == 'en'){{ 'fi-us' }}@else{{ 'fi-'.$locale }}@endif"></span> 
                <span>{{ strtoupper($locale) }}</span></a>
        </li>
        @endforeach
    </ul>
</div>

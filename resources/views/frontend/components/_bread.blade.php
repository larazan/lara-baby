<div class="border-b border-b-zinc-100">
    <nav class="max-w-7xl2 mx-auto max-w-[994px] px-2 lg:px-6 xl:px-0">
        <ol class="p-4 rounded flex flex-wrap text-sm text-gray-800 items-center">
            <li>
                <a href="{{ url('/') }}" class="underline">
                    <span>
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="size-5">
  <path stroke-linecap="round" stroke-linejoin="round" d="m2.25 12 8.954-8.955c.44-.439 1.152-.439 1.591 0L21.75 12M4.5 9.75v10.125c0 .621.504 1.125 1.125 1.125H9.75v-4.875c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21h4.125c.621 0 1.125-.504 1.125-1.125V9.75M8.25 21h8.25" />
</svg>

                    </span>
                </a>
            </li>
            <li class="text-gray-400 px-2">
                /
            </li>
        @if ($breadcrumbs_data['current_page_title'] != '')
            @foreach ($breadcrumbs_data['breadcrumbs_array'] as $key => $value)
            <li>
                <a href="{{ $key }}" class="underline">
                    {{ $value }}
                </a>
            </li>
            <li class="text-gray-400 px-2">
                /
            </li>
            @endforeach
            <li>
                {{ $breadcrumbs_data['current_page_title'] }}
            </li>
        @else
            @foreach ($breadcrumbs_data['breadcrumbs_array'] as $key => $value)
            <li>
                <a href="{{ $key }}" class="underline">
                    {{ $value }}
                </a>
            </li>
            <li class="text-gray-400 px-2">
                /
            </li>
            @endforeach
        @endif
            
        </ol>
    </nav>
</div>
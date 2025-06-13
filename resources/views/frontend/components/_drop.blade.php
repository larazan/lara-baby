<div x-data="{ open: false }" class="relative inline-block text-left">
    <!-- Кнопка для открытия меню -->
    <div>
        <button @click="open = !open" type="button" class="inline-flex justify-center w-full rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-sm font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" aria-expanded="true" aria-haspopup="true">
            Выберите опцию
            <svg class="-mr-1 ml-2 h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                <path fill-rule="evenodd" d="M5.23 7.21a.75.75 0 011.06 0L10 10.293l3.71-3.08a.75.75 0 111.06 1.06l-4.25 3.5a.75.75 0 01-1.06 0l-4.25-3.5a.75.75 0 010-1.06z" clip-rule="evenodd" />
            </svg>
        </button>
    </div>

    <!-- Выпадающее меню -->
    <div x-show="open" @click.away="open = false" class="absolute right-0 z-10 mt-2 w-56 rounded-md shadow-lg bg-white ring-1 ring-black ring-opacity-5 focus:outline-none" role="menu" aria-orientation="vertical" aria-labelledby="options-menu">
        <div class="py-1" role="none">
            <a href="#" class="text-gray-700 block px-4 py-2 text-sm" role="menuitem">Опция 1</a>
            <a href="#" class="text-gray-700 block px-4 py-2 text-sm" role="menuitem">Опция 2</a>
            <a href="#" class="text-gray-700 block px-4 py-2 text-sm" role="menuitem">Опция 3</a>
        </div>
    </div>
</div>
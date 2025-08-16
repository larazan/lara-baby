<div class="">
    <label class="relative inline-flex items-center cursor-pointer">
        <!-- This checkbox is what Livewire interacts with -->
        <input
            type="checkbox"
            id="switchOne"
            value=""
            class="sr-only peer"
            checked=""
            wire:model.live="isActive"
        >
        <div class="w-11 h-6 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-blue-300 rounded-full peer dark:bg-gray-700 peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all dark:border-gray-600 peer-checked:bg-blue-600"></div>
    </label>
</div>

{{-- 
<div class="hidden">
    <div class="relative inline-block w-10 mr-2 align-middle select-none transition duration-200 ease-in">
        <input 
            wire:model="isActive"
            type="checkbox"
            name="toggle"
            id="toggle"
            class="focus:outline-none toggle-checkbox absolute block w-6 h-6 rounded-full bg-white border-4 appearance-none cursor-pointer"  
        />
        <label for="toggle" class="toggle-label block overflow-hidden h-6 rounded-full bg-gray-300 cursor-pointer"></label>
    </div>
</div>

<style>
    .toggle-checkbox:checked {
        @apply: right-0 border-green-400;
        right: 0;
        border-color: #680391;
    }

    .toggle-checkbox:checked + .toggle-label {
        @apply: bg-green-400;
        background-color: #680391;
    }
</style>
--}}
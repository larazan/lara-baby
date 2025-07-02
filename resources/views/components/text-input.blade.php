@props(['disabled' => false])

<input {{ $disabled ? 'disabled' : ''}} {!! $attributes->merge(['class' => 'shadow-menu border-2 figtree-reguler border-gray-800 dark:border-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm pl-7']) !!} >
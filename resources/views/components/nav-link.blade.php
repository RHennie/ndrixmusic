@props(['active'])

@php
$classes = ($active ?? false)
    ? 'inline-flex items-center px-1 pt-1 border-b-2 border-red-400 dark:border-red-400 text-sm font-medium leading-5 text-white dark:text-white focus:outline-none focus:border-indigo-700 transition duration-150 ease-in-out transform hover:scale-105'
    : 'inline-flex items-center px-1 pt-1 border-b-2 border-transparent text-sm font-medium leading-5 text-white dark:text-white hover:text-red-700 dark:hover:text-red-400 hover:border-red-400 dark:hover:border-red-700 focus:outline-none focus:text-gray-700 dark:focus:text-gray-300 focus:border-gray-300 dark:focus:border-gray-700 transition duration-150 ease-in-out transform hover:scale-105';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>

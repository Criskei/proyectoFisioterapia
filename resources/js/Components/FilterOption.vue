<template>
    <h2 id="category-heading">
        <button type="button"
            class="flex items-center justify-between w-full py-2 px-1.5 text-sm font-medium text-left text-gray-500 border-b border-gray-200 dark:border-gray-600 dark:text-gray-400 hover:bg-gray-50 dark:hover:bg-gray-700"
            data-accordion-target="#category-body" aria-expanded="true" aria-controls="category-body">
            <span>Category</span>
            <svg aria-hidden="true" data-accordion-icon="" class="w-5 h-5 rotate-180 shrink-0" fill="currentColor"
                viewbox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd" clip-rule="evenodd"
                    d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" />
            </svg>
        </button>
    </h2>
    <div id="category-body" class="hidden" aria-labelledby="category-heading">
        <div class="py-2 font-light border-b border-gray-200 dark:border-gray-600">
            <ul class="space-y-2">
                <li class="flex items-center">
                    <input id="apple" type="checkbox" value=""
                        class="w-4 h-4 bg-gray-100 border-gray-300 rounded text-primary-600 focus:ring-primary-500 dark:focus:ring-primary-600 dark:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
                    <label for="apple" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-100">Apple
                        (56)</label>
                </li>
                <li class="flex items-center">
                    <input id="microsoft" type="checkbox" value=""
                        class="w-4 h-4 bg-gray-100 border-gray-300 rounded text-primary-600 focus:ring-primary-500 dark:focus:ring-primary-600 dark:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
                    <label for="microsoft" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-100">Microsoft
                        (45)</label>
                </li>
                <li class="flex items-center">
                    <input id="logitech" type="checkbox" value="" 
                        class="w-4 h-4 bg-gray-100 border-gray-300 rounded text-primary-600 focus:ring-primary-500 dark:focus:ring-primary-600 dark:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
                    <label for="logitech" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-100">Logitech
                        (97)</label>
                </li>
                <li class="flex items-center">
                    <input id="sony" type="checkbox" value=""
                        class="w-4 h-4 bg-gray-100 border-gray-300 rounded text-primary-600 focus:ring-primary-500 dark:focus:ring-primary-600 dark:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
                    <label for="sony" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-100">Sony
                        (234)</label>
                </li>
                <li class="flex items-center">
                    <input id="asus" type="checkbox" value="" 
                        class="w-4 h-4 bg-gray-100 border-gray-300 rounded text-primary-600 focus:ring-primary-500 dark:focus:ring-primary-600 dark:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
                    <label for="asus" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-100">Asus
                        (97)</label>
                </li>
                <li class="flex items-center">
                    <input id="dell" type="checkbox" value=""
                        class="w-4 h-4 bg-gray-100 border-gray-300 rounded text-primary-600 focus:ring-primary-500 dark:focus:ring-primary-600 dark:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
                    <label for="dell" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-100">Dell
                        (56)</label>
                </li>
                <li class="flex items-center">
                    <input id="msi" type="checkbox" value=""
                        class="w-4 h-4 bg-gray-100 border-gray-300 rounded text-primary-600 focus:ring-primary-500 dark:focus:ring-primary-600 dark:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
                    <label for="msi" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-100">MSI
                        (97)</label>
                </li>
                <li class="flex items-center">
                    <input id="canon" type="checkbox" value="" 
                        class="w-4 h-4 bg-gray-100 border-gray-300 rounded text-primary-600 focus:ring-primary-500 dark:focus:ring-primary-600 dark:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
                    <label for="canon" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-100">Canon
                        (49)</label>
                </li>
                <li class="flex items-center">
                    <input id="benq" type="checkbox" value=""
                        class="w-4 h-4 bg-gray-100 border-gray-300 rounded text-primary-600 focus:ring-primary-500 dark:focus:ring-primary-600 dark:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
                    <label for="benq" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-100">BenQ
                        (23)</label>
                </li>
                <li class="flex items-center">
                    <input id="razor" type="checkbox" value=""
                        class="w-4 h-4 bg-gray-100 border-gray-300 rounded text-primary-600 focus:ring-primary-500 dark:focus:ring-primary-600 dark:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
                    <label for="razor" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-100">Razor
                        (49)</label>
                </li>
                <a href="#"
                    class="flex items-center text-sm font-medium text-primary-600 dark:text-primary-500 hover:underline">View
                    all</a>
            </ul>
        </div>
    </div>
</template>
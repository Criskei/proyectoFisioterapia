<script setup lang="ts">
import { Link } from '@inertiajs/vue3';
import { defineProps } from 'vue';

const props = defineProps<{
    ver: string;
    borrar: string;
}>();
</script>

<template>
    <td class="px-4 py-3 font-medium text-gray-900 whitespace-nowrap dark:text-white">
        <div class="flex items-center space-x-4">
            <Link :href="ver">
            <button type="button" id="readButton"
                class="py-2 px-3 flex items-center text-sm font-medium text-center text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-primary-700 focus:z-10 focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">
                <svg xmlns="http://www.w3.org/2000/svg" viewbox="0 0 24 24" fill="currentColor"
                    class="w-4 h-4 mr-2 -ml-0.5">
                    <path d="M12 15a3 3 0 100-6 3 3 0 000 6z" />
                    <path fill-rule="evenodd" clip-rule="evenodd"
                        d="M1.323 11.447C2.811 6.976 7.028 3.75 12.001 3.75c4.97 0 9.185 3.223 10.675 7.69.12.362.12.752 0 1.113-1.487 4.471-5.705 7.697-10.677 7.697-4.97 0-9.186-3.223-10.675-7.69a1.762 1.762 0 010-1.113zM17.25 12a5.25 5.25 0 11-10.5 0 5.25 5.25 0 0110.5 0z" />
                </svg>
                Ver
            </button>
            </Link>
            <Link :href="borrar">
            <button type="button" data-modal-target="delete-modal" data-modal-toggle="delete-modal"
                class="flex items-center text-red-700 hover:text-white border border-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-3 py-2 text-center dark:border-red-500 dark:text-red-500 dark:hover:text-white dark:hover:bg-red-600 dark:focus:ring-red-900">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-2 -ml-0.5" viewbox="0 0 20 20"
                    fill="currentColor" aria-hidden="true">
                    <path fill-rule="evenodd"
                        d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z"
                        clip-rule="evenodd" />
                </svg>
                Borrar
            </button>
            </Link>
        </div>
    </td>
</template>
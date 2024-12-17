<script setup>
import FooterTableLayout from './FooterTableLayout.vue';
import NameTableLayout from './NameTableLayout.vue';
import OptionsTableLayout from './OptionsTableLayout.vue';
</script>

<template>
    <section class="bg-gray-50 dark:bg-gray-900 p-1 sm:p-1 antialiased">
        <div class="bg-white dark:bg-gray-800 relative shadow-md sm:rounded-lg overflow-hidden">
            <NameTableLayout>
                <slot name="titulo"></slot>
            </NameTableLayout>
            <OptionsTableLayout/>
            <div class="overflow-x-auto">
                <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="p-4">
                                <div class="flex items-center">
                                    <input id="checkbox-all" type="checkbox"
                                        class="w-4 h-4 text-primary-600 bg-gray-100 rounded border-gray-300 focus:ring-primary-500 dark:focus:ring-primary-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                    <label for="checkbox-all" class="sr-only">checkbox</label>
                                </div>
                            </th>
                            <slot name="titulosColummas"></slot>                            
                        </tr>
                    </thead>
                    <tbody>
                        <slot name="main"</slot>
                    </tbody>
                </table>
            </div>
            <FooterTableLayout />
        </div>
    </section>
</template>
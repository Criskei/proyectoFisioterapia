<script setup>
import NavBarLayout from './NavBarLayout.vue';
import SideBarLayout from './SideBarLayout.vue';
</script>

<template>
    <div class="antialiased bg-gray-50 dark:bg-gray-900">

        <NavBarLayout />
        <SideBarLayout />

        <main class="p-4 md:ml-64 h-auto pt-20">
            <slot></slot>
        </main>
    </div>
</template>
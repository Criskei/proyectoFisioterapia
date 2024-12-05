<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/vue3';
import TableCRUDLayout from '@/Layouts/TableCRUDLayout.vue';


</script>

<template>

    <!-- <Head title="Pacientes" /> -->

    <AuthenticatedLayout>
        <h2 class="font-semibold text-xl text-gray-950 leading-tight">Tabla</h2>

        <TableCRUDLayout>
            <template #titulo>Pacientes</template>
        </TableCRUDLayout>
    </AuthenticatedLayout>
</template>

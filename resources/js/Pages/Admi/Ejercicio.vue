<script setup>
import { Head } from '@inertiajs/vue3';
import { ref } from 'vue';
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import TableCRUDLayout from '@/Layouts/TableCRUDLayout.vue';
import ButtonsTableLayout from '@/Layouts/ButtonsTableLayout.vue';
import { Inertia } from '@inertiajs/inertia';

defineProps({
    ejercicios: {
        type: Object,
    },
});

const form = ref({
    nombres: '',
    apellidos: '',
    celular: '',
    fecha_nacimiento: '',
    direccion: '',
    sexo: '',
    email: '',
    escolaridad: 'SinEstudios',
    tutor_nombre: '',
    tutor_parentesco: '',
})

const enviarFormulario = () => {
    Inertia.post('/Pacientes', form.value);
};
</script>

<template>

    <Head title="Ejercicios" />

    <AuthenticatedLayout>
        <TableCRUDLayout>
            <template #titulo>Ejercicios</template>
            <template #titulosColummas>
                <th scope="col" class="p-4">Nombre</th>
                <th scope="col" class="p-4">Descripción</th>
                <th scope="col" class="p-4">URL del video</th>
                <th scope="col" class="p-4">Duración estimada</th>
            </template>
            <template #main>
                <tr v-for="ejercicio in ejercicios" :key="ejercicio.id_ejercicio"
                    class="border-b dark:border-gray-600 hover:bg-gray-100 dark:hover:bg-gray-700">
                    <td class="p-4 w-4">
                        <div class="flex items-center">
                            <input id="checkbox-table-search-1" type="checkbox" onclick="event.stopPropagation()"
                                class="w-4 h-4 text-primary-600 bg-gray-100 rounded border-gray-300 focus:ring-primary-500 dark:focus:ring-primary-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                            <label for="checkbox-table-search-1" class="sr-only">checkbox</label>
                        </div>
                    </td>
                    <td>{{ ejercicio.nombre }}</td>
                    <td>{{ ejercicio.descripcion }}</td>
                    <td>{{ ejercicio.video_tutorial_url }}</td>
                    <td>{{ ejercicio.duracion_estimada }}</td>
                    <ButtonsTableLayout
                         />
                </tr>        
            </template>
        </TableCRUDLayout>
    </AuthenticatedLayout>

</template>

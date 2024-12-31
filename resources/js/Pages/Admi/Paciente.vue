<script setup>
import { Head } from '@inertiajs/vue3';
import { ref } from 'vue';
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import TableCRUDLayout from '@/Layouts/TableCRUDLayout.vue';
import ButtonsTableLayout from '@/Layouts/ButtonsTableLayout.vue';
import { Inertia } from '@inertiajs/inertia';

defineProps({
    pacientes: {
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

    <Head title="Pacientes" />

    <AuthenticatedLayout>
        <TableCRUDLayout>
            <template #titulo>Pacientes</template>
            <template #titulosColummas>
                <th scope="col" class="p-4">Nombres</th>
                <th scope="col" class="p-4">Apellidos</th>
                <th scope="col" class="p-4">Celular</th>
                <th scope="col" class="p-4">Correo electrónico</th>
            </template>
            <template #main>
                <tr v-for="paciente in pacientes" :key="paciente.id_paciente"
                    class="border-b dark:border-gray-600 hover:bg-gray-100 dark:hover:bg-gray-700">
                    <td class="p-4 w-4">
                        <div class="flex items-center">
                            <input id="checkbox-table-search-1" type="checkbox" onclick="event.stopPropagation()"
                                class="w-4 h-4 text-primary-600 bg-gray-100 rounded border-gray-300 focus:ring-primary-500 dark:focus:ring-primary-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                            <label for="checkbox-table-search-1" class="sr-only">checkbox</label>
                        </div>
                    </td>
                    <td>{{ paciente.usuarios.nombres }}</td>
                    <td>{{ paciente.usuarios.apellidos }}</td>
                    <td>{{ paciente.usuarios.celular }}</td>
                    <td>{{ paciente.usuarios.email }}</td>
                    <ButtonsTableLayout :ver="route('Paciente.ver', { id: paciente.id_paciente })"
                        :borrar="route('Paciente.index')" />
                </tr>

                <div id="createProductModal" tabindex="-1" aria-hidden="true"
                    class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                    <div class="relative p-4 w-full max-w-2xl max-h-full">
                        <!-- Modal content -->
                        <div class="relative p-4 bg-white rounded-lg shadow dark:bg-gray-800 sm:p-5">
                            <!-- Modal header -->
                            <div
                                class="flex justify-between items-center pb-4 mb-4 rounded-t border-b sm:mb-5 dark:border-gray-600">
                                <h3 class="text-lg font-semibold text-gray-900 dark:text-white">Añadir nuevo paciente
                                </h3>
                                <button type="button"
                                    class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white"
                                    data-modal-target="createProductModal" data-modal-toggle="createProductModal">
                                    <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewbox="0 0 20 20"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd"
                                            d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                            clip-rule="evenodd" />
                                    </svg>
                                    <span class="sr-only">Close modal</span>
                                </button>
                            </div>
                            <!-- Modal body -->
                            <form @submit.prevent="enviarFormulario">
                                <div class="grid gap-4 mb-4 sm:grid-cols-2">
                                    <h3 class="text-lg font-bold text-gray-900 dark:text-white mb-2">Perfil</h3>
                                    <br>
                                    <div>
                                        <label for="nombres"
                                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nombres</label>
                                        <input type="text" name="nombres" id="nombres"
                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                            v-model="form.nombres">
                                    </div>
                                    <div>
                                        <label for="apellidos"
                                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Apellidos</label>
                                        <input type="text" name="apellidos" id="apellidos"
                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                            v-model="form.apellidos">
                                    </div>
                                    <div>
                                        <label for="celular"
                                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Celular</label>
                                        <input type="number" name="celular" id="celular"
                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                            v-model="form.celular">
                                    </div>
                                    <div>
                                        <label for="fechaNacimiento"
                                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Fecha
                                            de nacimiento</label>
                                        <input type="date" name="fechaNacimiento" id="fechaNacimiento"
                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                            v-model="form.fecha_nacimiento">
                                    </div>
                                    <div>
                                        <label for="direccion"
                                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Dirección</label>
                                        <input type="text" name="direccion" id="direccion"
                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                            v-model="form.direccion">
                                    </div>
                                    <div>
                                        <label for="email"
                                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Correo
                                            electrónico</label>
                                        <input type="email" name="email" id="email"
                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                            v-model="form.email">
                                    </div>
                                    <div><label for="escolaridad"
                                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Escolaridad</label><select
                                            id="escolaridad" v-model="form.escolaridad"
                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                                            <option value="SinEstudios">Sin estudios</option>
                                            <option value="PreKinder">Pre Kinder</option>
                                            <option value="Kinder">Kinder</option>
                                            <option value="Primaria">Primaria</option>
                                            <option value="Secundaria">Secundaria</option>
                                        </select></div>
                                    <div><label for="sexo"
                                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Sexo</label><select
                                            id="sexo" v-model="form.sexo"
                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                                            <option value="Mujer">Mujer</option>
                                            <option value="Hombre">Hombre</option>
                                        </select></div>
                                    <h3 class="text-lg font-bold text-gray-900 dark:text-white mb-2">Datos
                                        del tutor</h3>
                                    <br>
                                    <div>
                                        <label for="nombreTutor"
                                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nombre</label>
                                        <input type="text" name="nombreTutor" id="nombreTutor"
                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                            v-model="form.tutor_nombre">
                                    </div>
                                    <div>
                                        <label for="parentesco"
                                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Parentesco</label>
                                        <input type="text" name="parentesco" id="parentesco"
                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                            v-model="form.tutor_parentesco">
                                    </div>
                                </div>
                                <button type="submit"
                                    class="text-white inline-flex items-center bg-primary-700 hover:bg-primary-800 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">
                                    <svg class="mr-1 -ml-1 w-6 h-6" fill="currentColor" viewbox="0 0 20 20"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd"
                                            d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z"
                                            clip-rule="evenodd" />
                                    </svg>
                                    Añadir
                                </button>
                            </form>
                        </div>
                    </div>
                </div>

                <div id="delete-modal" tabindex="-1"
                    class="fixed top-0 left-0 right-0 z-50 hidden p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
                    <div class="relative w-full h-auto max-w-md max-h-full">
                        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                            <button type="button"
                                class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-800 dark:hover:text-white"
                                data-modal-toggle="delete-modal">
                                <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewbox="0 0 20 20"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd"
                                        d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                        clip-rule="evenodd" />
                                </svg>
                                <span class="sr-only">Close modal</span>
                            </button>
                            <div class="p-6 text-center">
                                <svg aria-hidden="true" class="mx-auto mb-4 text-gray-400 w-14 h-14 dark:text-gray-200"
                                    fill="none" stroke="currentColor" viewbox="0 0 24 24"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                                <h3 class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400">Estás seguro que quieres eliminar este paciente?</h3>
                                <button data-modal-toggle="delete-modal" type="button"
                                    class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center mr-2">Si, estoy seguro</button>
                                <button data-modal-toggle="delete-modal" type="button"
                                    class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">No, cancelar</button>
                            </div>
                        </div>
                    </div>
                </div>
            </template>
        </TableCRUDLayout>
    </AuthenticatedLayout>

</template>

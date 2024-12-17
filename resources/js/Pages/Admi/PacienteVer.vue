<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';

defineProps({
    paciente: {
        type: Object,
    },
});

import { reactive, ref } from "vue";
import axios from "axios";
import { Head } from '@inertiajs/vue3';

// Controla si los inputs están habilitados para editar
const isEditing = ref(false);

// Función para habilitar o deshabilitar edición
const toggleEditar = () => {
    isEditing.value = !isEditing.value;
};

// Función para enviar los datos al controlador
const editarDatos = async () => {
    try {
        const response = await axios.post("/api/paciente/edit", paciente);
        alert("Datos actualizados correctamente");
        isEditing.value = false;
    } catch (error) {
        console.error(error);
        alert("Hubo un error al actualizar los datos");
    }
};
</script>

<template>

    <Head title="Paciente" />

    <AuthenticatedLayout>
        <div class="md:flex">
            <ul class="flex-column space-y space-y-4 text-sm font-medium text-gray-500 dark:text-gray-400 md:me-4 mb-4 md:mb-0"
                id="default-tab" data-tabs-toggle="#default-tab-content" role="tablist">
                <li role="presentation">
                    <button
                        class="inline-flex items-center px-4 py-3 text-white bg-blue-700 rounded-lg active w-full dark:bg-blue-600"
                        id="profile-tab" data-tabs-target="#profile" type="button" role="tab" aria-controls="profile"
                        aria-selected="true">
                        <svg class="w-4 h-4 me-2 text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                            fill="currentColor" viewBox="0 0 20 20">
                            <path
                                d="M10 0a10 10 0 1 0 10 10A10.011 10.011 0 0 0 10 0Zm0 5a3 3 0 1 1 0 6 3 3 0 0 1 0-6Zm0 13a8.949 8.949 0 0 1-4.951-1.488A3.987 3.987 0 0 1 9 13h2a3.987 3.987 0 0 1 3.951 3.512A8.949 8.949 0 0 1 10 18Z" />
                        </svg>
                        Perfil
                    </button>
                </li>
                <li role="presentation">
                    <button
                        class="inline-flex items-center px-4 py-3 rounded-lg hover:text-gray-900 bg-gray-50 hover:bg-gray-100 w-full dark:bg-gray-800 dark:hover:bg-gray-700 dark:hover:text-white"
                        id="clinical-background-tab" data-tabs-target="#clinical-background" type="button" role="tab"
                        aria-controls="clinical-background" aria-selected="false">
                        <svg class="w-4 h-4 me-2 text-gray-500 dark:text-gray-400" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 18 18">
                            <path
                                d="M6.143 0H1.857A1.857 1.857 0 0 0 0 1.857v4.286C0 7.169.831 8 1.857 8h4.286A1.857 1.857 0 0 0 8 6.143V1.857A1.857 1.857 0 0 0 6.143 0Zm10 0h-4.286A1.857 1.857 0 0 0 10 1.857v4.286C10 7.169 10.831 8 11.857 8h4.286A1.857 1.857 0 0 0 18 6.143V1.857A1.857 1.857 0 0 0 16.143 0Zm-10 10H1.857A1.857 1.857 0 0 0 0 11.857v4.286C0 17.169.831 18 1.857 18h4.286A1.857 1.857 0 0 0 8 16.143v-4.286A1.857 1.857 0 0 0 6.143 10Zm10 0h-4.286A1.857 1.857 0 0 0 10 11.857v4.286c0 1.026.831 1.857 1.857 1.857h4.286A1.857 1.857 0 0 0 18 16.143v-4.286A1.857 1.857 0 0 0 16.143 10Z" />
                        </svg>
                        Antecedentes Clínicos
                    </button>
                </li>
                <li role="presentation">
                    <button
                        class="inline-flex items-center px-4 py-3 rounded-lg hover:text-gray-900 bg-gray-50 hover:bg-gray-100 w-full dark:bg-gray-800 dark:hover:bg-gray-700 dark:hover:text-white"
                        id="clinical-history-tab" data-tabs-target="#clinical-history" type="button" role="tab"
                        aria-controls="clinical-history" aria-selected="false">
                        <svg class="w-4 h-4 me-2 text-gray-500 dark:text-gray-400" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 18 18">
                            <path
                                d="M6.143 0H1.857A1.857 1.857 0 0 0 0 1.857v4.286C0 7.169.831 8 1.857 8h4.286A1.857 1.857 0 0 0 8 6.143V1.857A1.857 1.857 0 0 0 6.143 0Zm10 0h-4.286A1.857 1.857 0 0 0 10 1.857v4.286C10 7.169 10.831 8 11.857 8h4.286A1.857 1.857 0 0 0 18 6.143V1.857A1.857 1.857 0 0 0 16.143 0Zm-10 10H1.857A1.857 1.857 0 0 0 0 11.857v4.286C0 17.169.831 18 1.857 18h4.286A1.857 1.857 0 0 0 8 16.143v-4.286A1.857 1.857 0 0 0 6.143 10Zm10 0h-4.286A1.857 1.857 0 0 0 10 11.857v4.286c0 1.026.831 1.857 1.857 1.857h4.286A1.857 1.857 0 0 0 18 16.143v-4.286A1.857 1.857 0 0 0 16.143 10Z" />
                        </svg>
                        Historias Clínicas
                    </button>
                </li>
            </ul>
            <!-- Contenido de cada botón -->
            <!-- Perfil -->
            <div class="p-6 bg-gray-50 text-medium text-gray-500 dark:text-gray-400 dark:bg-gray-800 rounded-lg w-full"
                id="default-tab-content">
                <div class="hidden" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                    <form action="#">
                        <div class="grid gap-4 mb-4 sm:grid-cols-2">
                            <h3 class="text-lg font-bold text-gray-900 dark:text-white mb-2">Perfil</h3>
                            <br>
                            <div>
                                <label for="nombres"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nombres</label>
                                <input type="text" name="nombres" id="nombres"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                    v-model="paciente.usuarios.nombres" :disabled="!isEditing">
                            </div>
                            <div>
                                <label for="apellidos"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Apellidos</label>
                                <input type="text" name="apellidos" id="apellidos"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                    v-model="paciente.usuarios.apellidos" :disabled="!isEditing">
                            </div>
                            <div>
                                <label for="celular"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Celular</label>
                                <input type="number" name="celular" id="celular"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                    v-model="paciente.usuarios.celular" :disabled="!isEditing">
                            </div>
                            <div>
                                <label for="fechaNacimiento"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Fecha
                                    de nacimiento</label>
                                <input type="date" name="fechaNacimiento" id="fechaNacimiento"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                    v-model="paciente.usuarios.fecha_nacimiento" :disabled="!isEditing">
                            </div>
                            <div>
                                <label for="direccion"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Dirección</label>
                                <input type="text" name="direccion" id="direccion"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                    v-model="paciente.usuarios.direccion" :disabled="!isEditing">
                            </div>
                            <div>
                                <label for="email"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Correo
                                    electrónico</label>
                                <input type="email" name="email" id="email"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                    v-model="paciente.usuarios.email" :disabled="!isEditing">
                            </div>
                            <div><label for="escolaridad"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Escolaridad</label><select
                                    id="escolaridad" v-model="paciente.escolaridad"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                                    <option value="SinEstudios">Sin estudios</option>
                                    <option value="PreKinder">Pre Kinder</option>
                                    <option value="Kinder">Kinder</option>
                                    <option value="Primaria">Primaria</option>
                                    <option value="Secundaria">Secundaria</option>
                                </select></div>
                            <div><label for="sexo"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Sexo</label><select
                                    id="sexo" v-model="paciente.usuarios.sexo"
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
                                    v-model="paciente.tutor_nombre" :disabled="!isEditing">
                            </div>
                            <div>
                                <label for="parentesco"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Parentesco</label>
                                <input type="text" name="parentesco" id="parentesco"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                    v-model="paciente.tutor_parentesco" :disabled="!isEditing">
                            </div>

                            <h3 class="text-lg font-bold text-gray-900 dark:text-white mb-2">
                                Observaciones</h3>
                            <br>
                            <div>
                                <label for="fechaIngreso"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Fecha
                                    de ingreso</label>
                                <input type="date" name="fechaIngreso" id="fechaIngreso"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                    v-model="paciente.fecha_ingreso" :disabled="!isEditing">
                            </div>
                            <div class="sm:col-span-2"><label for="observacion"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Observaciones
                                    generales</label><textarea id="observacion" rows="5"
                                    class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-primary-500 focus:border-primary-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                    v-model="paciente.observaciones_generales" :disabled="!isEditing"></textarea>
                            </div>
                        </div>
                        <div class="flex items-center space-x-4">
                            <button type="button" @click="toggleEditar"
                                class="text-white bg-primary-700 hover:bg-primary-800 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">
                                {{ isEditing ? "Cancelar" : "Editar" }}
                            </button>
                            <button type="submit" :disabled="!isEditing"
                                class="text-white bg-green-600 hover:bg-green-700 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-green-500 dark:hover:bg-green-600 dark:focus:ring-green-800">
                                Guardar
                            </button>

                        </div>
                    </form>
                </div>

                <!-- Antecedentes Clinicos -->
                <div class="hidden" id="clinical-background" role="tabpanel" aria-labelledby="clinical-background-tab">
                    <h3 class="text-lg font-bold text-gray-900 dark:text-white mb-2">Antecedentes
                        Clínicos</h3>
                    <p class="mb-2">This is some placeholder content the Clinical Background tab's
                        associated content, clicking another tab will toggle the visibility of this
                        one for the next.</p>
                    <p>The tab JavaScript swaps classes to control the content visibility and
                        styling.</p>
                </div>

                <!-- Historias clinicas -->
                <div class="hidden" id="clinical-history" role="tabpanel" aria-labelledby="clinical-history-tab">
                    <h3 class="text-lg font-bold text-gray-900 dark:text-white mb-2">Historias
                        Clínicas</h3>
                    <p class="mb-2">This is some placeholder content the Clinical History tab's
                        associated content, clicking another tab will toggle the visibility of this
                        one for the next.</p>
                    <p>The tab JavaScript swaps classes to control the content visibility and
                        styling.</p>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
<script setup>
import { onMounted } from 'vue';
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import jsPDF from "jspdf";

const props = defineProps({ paciente: { type: Object, required: true } });


const generarPDF = () => {
  const doc = new jsPDF();

  // Título del documento
  doc.setFont("helvetica", "bold");
  doc.setFontSize(16);
  doc.setTextColor(0, 0, 255); // Color azul
  doc.text("Reporte del Paciente", 10, 10);

  // Información del paciente
  doc.setFontSize(12);
  doc.setFont("helvetica", "normal");
  doc.setTextColor(0, 0, 0); // Color negro

  const datosPaciente = [
    { title: "Perfil", data: [
      `Nombres: ${props.paciente.usuarios.nombres || "N/A"}`,
      `Apellidos: ${props.paciente.usuarios.apellidos || "N/A"}`,
      `Celular: ${props.paciente.usuarios.celular || "N/A"}`,
      `Fecha de nacimiento: ${props.paciente.usuarios.fecha_nacimiento || "N/A"}`,
      `Dirección: ${props.paciente.usuarios.direccion || "N/A"}`,
      `Correo electrónico: ${props.paciente.usuarios.email || "N/A"}`,
      `Escolaridad: ${props.paciente.escolaridad || "N/A"}`,
      `Sexo: ${props.paciente.usuarios.sexo || "N/A"}`,
      `Fecha de ingreso: ${props.paciente.fecha_ingreso || "N/A"}`
    ]},
    { title: "Datos del tutor", data: [
      `Nombres: ${props.paciente.tutor_nombre || "N/A"}`,
      `Parentesco: ${props.paciente.tutor_parentesco || "N/A"}`
    ]},
    { title: "Antecedentes Clínicos", data: [
      `Antecedentes Prenatales`,
      `Nro de gestaciones: ${props.paciente.antecedentes_prenatales.gesta || "N/A"}`,
      `Nro de partos: ${props.paciente.antecedentes_prenatales.para || "N/A"}`,
      `Nro de cesareas: ${props.paciente.antecedentes_prenatales.cesarea || "N/A"}`,
      `Nro de abortos: ${props.paciente.antecedentes_prenatales.abortos || "N/A"}`,
      `Edad de la madre en el embarazo: ${props.paciente.antecedentes_prenatales.edad_madre_embarazo || "N/A"}`,
      `Semanas de gestación: ${props.paciente.antecedentes_prenatales.semanas_gestacion || "N/A"}`,
      `Control prenatal: ${props.paciente.antecedentes_prenatales.control_prenatal || "N/A"}`,
      `Profesional a cargo: ${props.paciente.antecedentes_prenatales.profesional_control || "N/A"}`,
      `Complicaciones: ${props.paciente.antecedentes_prenatales.complicaciones || "N/A"}`,
      `Alimentación: ${props.paciente.antecedentes_prenatales.alimentacion || "N/A"}`,
      `Traumatismos: ${props.paciente.antecedentes_prenatales.traumatismos || "N/A"}`
    ]},
    { title: "Antecedentes Perinatales", data: [
      `Características del trabajo de parto: ${props.paciente.antecedentes_perinatales.trabajo_parto_caracteristicas || "N/A"}`,
      `Duración del trabajo de parto: ${props.paciente.antecedentes_perinatales.duracion_trabajo_parto || "N/A"}`,
      `Lugar de atención: ${props.paciente.antecedentes_perinatales.lugar_atencion || "N/A"}`,
      `Método: ${props.paciente.antecedentes_perinatales.metodo_obtencion || "N/A"}`,
      `Complicaciones: ${props.paciente.antecedentes_perinatales.complicaciones_extraccion || "N/A"}`,
      `Uso de forceps: ${props.paciente.antecedentes_perinatales.uso_forceps || "N/A"}`,
      `Incubadora: ${props.paciente.antecedentes_perinatales.incubadora || "N/A"}`,
      `Tiempo en la incubadora: ${props.paciente.antecedentes_perinatales.tiempo_incubadora || "N/A"}`
    ]},
    { title: "Antecedentes Heredofamiliares", data: [
      `Descripción: ${props.paciente.antecedentes_heredofamiliares.descripcion || "N/A"}`
    ]},
    { title: "Historias Clínicas", data: [
      `Fisioterapeuta: ${props.paciente.historias_clinicas.profesional_registro || "N/A"}`,
      `Tipo de historia: ${props.paciente.historias_clinicas.tipo_historia || "N/A"}`,
      `Fecha de registro: ${props.paciente.historias_clinicas.fecha_registro || "N/A"}`,
      `Motivo de consulta: ${props.paciente.historias_clinicas.motivo_consulta || "N/A"}`,
      `Diagnostico médico: ${props.paciente.historias_clinicas.diagnostico_medico || "N/A"}`,
      `Medicamentos: ${props.paciente.historias_clinicas.medicamentos || "N/A"}`,
      `Examenes complementarios: ${props.paciente.historias_clinicas.examenes_complementarios || "N/A"}`
    ]}
  ];

  let yPosition = 20;
  datosPaciente.forEach((section) => {
    doc.setFont("helvetica", "bold");
    doc.setTextColor(0, 0, 255); // Color azul para los títulos
    doc.text(section.title, 10, yPosition);
    yPosition += 10;

    doc.setFont("helvetica", "normal");
    doc.setTextColor(0, 0, 0); // Color negro para los datos
    section.data.forEach((linea) => {
      doc.text(linea, 10, yPosition);
      yPosition += 10;
    });
    yPosition += 10; // Espacio entre secciones
  });

  // Guardar el PDF
  doc.save(`Reporte_${props.paciente.usuarios.nombres || "Paciente"}.pdf`);
};




const form = ref({
    gesta: props.paciente.antecedentes_prenatales?.gesta || '',
    para: props.paciente.antecedentes_prenatales?.para || '',
    cesarea: props.paciente.antecedentes_prenatales?.cesarea || '',
    abortos: props.paciente.antecedentes_prenatales?.abortos || '',
    edad_madre_embarazo: props.paciente.antecedentes_prenatales?.edad_madre_embarazo || '',
    semanas_gestacion: props.paciente.antecedentes_prenatales?.semanas_gestacion || '',
    control_prenatal: props.paciente.antecedentes_prenatales?.control_prenatal || '',
    profesional_control: props.paciente.antecedentes_prenatales?.profesional_control || '',
    complicaciones: props.paciente.antecedentes_prenatales?.complicaciones || '',
    alimentacion: props.paciente.antecedentes_prenatales?.alimentacion || '',
    traumatismos: props.paciente.antecedentes_prenatales?.traumatismos || '',

    trabajo_parto_caracteristicas: props.paciente.antecedentes_perinatales?.trabajo_parto_caracteristicas || '',
    duracion_trabajo_parto: props.paciente.antecedentes_perinatales?.duracion_trabajo_parto || '',
    lugar_atencion: props.paciente.antecedentes_perinatales?.lugar_atencion || '',
    metodo_obtencion: props.paciente.antecedentes_perinatales?.metodo_obtencion || '',
    complicaciones_extraccion: props.paciente.antecedentes_perinatales?.complicaciones_extraccion || '',
    uso_forceps: props.paciente.antecedentes_perinatales?.uso_forceps || '',
    incubadora: props.paciente.antecedentes_perinatales?.incubadora || '',
    tiempo_incubadora: props.paciente.antecedentes_perinatales?.tiempo_incubadora || '',

    descripcion: props.paciente.antecedentes_heredofamiliares?.descripcion || '',
})

const formH = ref({
    profesional_registro: '',
    tipo_historia: '',
    fecha_registro: '',
    motivo_consulta: '',
    diagnostico_medico: '',
    medicamentos: '',
    examenes_complementarios: '',
})

const enviarFormulario = () => {
    Inertia.post('/PacientesPerfil', {
        ...form.value,
        id_paciente: props.paciente.id_paciente,
    });
};

const enviarFormularioHistoriaClinica = () => {
    Inertia.post('/PacientesHistoria', {
        ...formH.value,
        id_paciente: props.paciente.id_paciente,
    });
};

import { reactive, ref } from "vue";
import axios from "axios";
import { Head } from '@inertiajs/vue3';
import TableCRUDLayout from '@/Layouts/TableCRUDLayout.vue';
import { Inertia } from '@inertiajs/inertia';

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
                        <h3 class="text-lg font-bold text-gray-900 dark:text-white mb-2">Perfil</h3>
                        <div class="grid gap-4 mb-4 sm:grid-cols-2">
                            <div class="sm:col-span-2">
                                <button @click="generarPDF"
                                    class="text-white bg-green-600 hover:bg-green-700 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-green-500 dark:hover:bg-green-600 dark:focus:ring-green-800">
                                    Generar PDF
                                </button>
                            </div>
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
                    </form>
                </div>

                <!-- Antecedentes Clinicos -->
                <div class="hidden" id="clinical-background" role="tabpanel" aria-labelledby="clinical-background-tab">
                    <form @submit.prevent="enviarFormulario">
                        <h3 class="text-lg font-bold text-gray-900 dark:text-white mb-2 text-center">Antecedentes
                            Clínicos</h3>
                        <h3 class="text-lg font-bold text-gray-900 dark:text-white mb-2">Antecedentes Prenatales </h3>
                        <div class="grid gap-4 mb-4 sm:grid-cols-3">
                            <div>
                                <label for="quantity-input"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nro de
                                    gestaciones</label>
                                <div class="relative flex items-center max-w-[8rem]">
                                    <input v-model="form.gesta" type="text" id="quantity-input" data-input-counter
                                        aria-describedby="helper-text-explanation"
                                        class="bg-gray-50 border-x-0 border-gray-300 h-11 text-center text-gray-900 text-sm focus:ring-blue-500 focus:border-blue-500 block w-full py-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                        placeholder="0" />
                                </div>
                            </div>
                            <div>
                                <label for="quantity-input"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nro de
                                    partos</label>
                                <div class="relative flex items-center max-w-[8rem]">
                                    <input v-model="form.para" type="text" id="quantity-input2" data-input-counter
                                        aria-describedby="helper-text-explanation"
                                        class="bg-gray-50 border-x-0 border-gray-300 h-11 text-center text-gray-900 text-sm focus:ring-blue-500 focus:border-blue-500 block w-full py-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                        placeholder="0" />
                                </div>
                            </div>
                            <div>
                                <label for="quantity-input"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nro de
                                    cesáreas</label>
                                <div class="relative flex items-center max-w-[8rem]">
                                    <input v-model="form.cesarea" type="text" id="quantity-input3" data-input-counter
                                        aria-describedby="helper-text-explanation"
                                        class="bg-gray-50 border-x-0 border-gray-300 h-11 text-center text-gray-900 text-sm focus:ring-blue-500 focus:border-blue-500 block w-full py-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                        placeholder="0" />
                                </div>
                            </div>
                            <div>
                                <label for="quantity-input"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nro de
                                    abortos</label>
                                <div class="relative flex items-center max-w-[8rem]">
                                    <input v-model="form.abortos" type="text" id="quantity-input4" data-input-counter
                                        aria-describedby="helper-text-explanation"
                                        class="bg-gray-50 border-x-0 border-gray-300 h-11 text-center text-gray-900 text-sm focus:ring-blue-500 focus:border-blue-500 block w-full py-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                        placeholder="0" />
                                </div>
                            </div>
                            <div>
                                <label for="quantity-input5"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Edad de la
                                    madre durante el embarazo</label>
                                <div class="relative flex items-center max-w-[8rem]">
                                    <input v-model="form.edad_madre_embarazo" type="text" id="quantity-input5"
                                        data-input-counter aria-describedby="helper-text-explanation"
                                        class="bg-gray-50 border-x-0 border-gray-300 h-11 text-center text-gray-900 text-sm focus:ring-blue-500 focus:border-blue-500 block w-full py-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                        placeholder="0" />
                                </div>
                            </div>
                            <div>
                                <label for="quantity-input"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Semanas de
                                    gestación</label>
                                <div class="relative flex items-center max-w-[8rem]">
                                    <input v-model="form.semanas_gestacion" type="text" id="quantity-input6"
                                        data-input-counter aria-describedby="helper-text-explanation"
                                        class="bg-gray-50 border-x-0 border-gray-300 h-11 text-center text-gray-900 text-sm focus:ring-blue-500 focus:border-blue-500 block w-full py-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                        placeholder="0" />
                                </div>
                            </div>
                            <div><label for="control_prenatal"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Control
                                    prenatal</label><select id="control_prenatal" v-model="form.control_prenatal"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                                    <option value="1">Si hubo control</option>
                                    <option value="0">No hubo control</option>
                                </select></div>
                            <div>
                                <label for="profesional_control"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Profesional a
                                    cargo del control</label>
                                <input type="text" name="profesional_control" id="profesional_control"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                    v-model="form.profesional_control">
                            </div>
                            <div>
                                <label for="complicaciones"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Complicaciones</label>
                                <input type="text" name="complicaciones" id="complicaciones"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                    v-model="form.complicaciones">
                            </div>
                            <div>
                                <label for="alimentacion"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Alimentación</label>
                                <input type="text" name="alimentacion" id="alimentacion"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                    v-model="form.alimentacion">
                            </div>
                            <div>
                                <label for="traumatismos"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Traumatismos</label>
                                <input type="text" name="traumatismos" id="traumatismos"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                    v-model="form.traumatismos">
                            </div>
                        </div>

                        <h3 class="text-lg font-bold text-gray-900 dark:text-white mb-2">Antecedentes Perinatales </h3>
                        <div class="grid gap-4 mb-4 sm:grid-cols-3">
                            <div>
                                <label for="trabajo_parto_caracteristicas"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Características
                                    del trabajo de parto</label>
                                <input type="text" name="trabajo_parto_caracteristicas"
                                    id="trabajo_parto_caracteristicas"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                    v-model="form.trabajo_parto_caracteristicas">
                            </div>
                            <div>
                                <label for="quantity-input"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Duración del
                                    trabajo de parto</label>
                                <div class="relative flex items-center max-w-[8rem]">
                                    <input v-model="form.duracion_trabajo_parto" type="text" id="quantity-input2"
                                        data-input-counter aria-describedby="helper-text-explanation"
                                        class="bg-gray-50 border-x-0 border-gray-300 h-11 text-center text-gray-900 text-sm focus:ring-blue-500 focus:border-blue-500 block w-full py-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                        placeholder="0" />
                                </div>
                            </div>
                            <div>
                                <label for="lugar_atencion"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Lugar de
                                    atención</label>
                                <input type="text" name="lugar_atencion" id="lugar_atencion"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                    v-model="form.lugar_atencion">
                            </div>
                            <div>
                                <label for="metodo_obtencion"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Método</label>
                                <input type="text" name="metodo_obtencion" id="metodo_obtencion"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                    v-model="form.metodo_obtencion">
                            </div>
                            <div>
                                <label for="complicaciones_extraccion"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Complicaciones
                                    en el nacimiento</label>
                                <input type="text" name="complicaciones_extraccion" id="complicaciones_extraccion"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                    v-model="form.complicaciones_extraccion">
                            </div>
                            <div><label for="uso_forceps"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Uso de
                                    forceps</label><select id="uso_forceps" v-model="form.uso_forceps"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                                    <option value="1">Si</option>
                                    <option value="0">No</option>
                                </select></div>
                            <div><label for="incubadora"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Uso de
                                    incubadora</label><select id="incubadora" v-model="form.incubadora"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                                    <option value="1">Si</option>
                                    <option value="0">No</option>
                                </select></div>
                            <div>
                                <label for="quantity-input5"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tiempo en la
                                    incubadora</label>
                                <div class="relative flex items-center max-w-[8rem]">
                                    <input v-model="form.tiempo_incubadora" type="text" id="quantity-input5"
                                        data-input-counter aria-describedby="helper-text-explanation"
                                        class="bg-gray-50 border-x-0 border-gray-300 h-11 text-center text-gray-900 text-sm focus:ring-blue-500 focus:border-blue-500 block w-full py-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                        placeholder="0" />
                                </div>
                            </div>
                        </div>

                        <h3 class="text-lg font-bold text-gray-900 dark:text-white mb-2">Antecedentes Heredofamiliares
                        </h3>
                        <div>
                            <label for="descripcion"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Descripción</label>
                            <input type="text" name="descripcion" id="descripcion"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                v-model="form.descripcion">
                        </div>
                        <button type="submit"
                            class="text-white bg-green-600 hover:bg-green-700 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-green-500 dark:hover:bg-green-600 dark:focus:ring-green-800">
                            Guardar
                        </button>
                    </form>
                </div>

                <!-- Historias clinicas -->
                <div class="hidden" id="clinical-history" role="tabpanel" aria-labelledby="clinical-history-tab">
                    <TableCRUDLayout>
                        <template #titulo>Historias Clínicas</template>
                        <template #titulosColummas>
                            <th scope="col" class="p-4">Fisioterapeuta</th>
                            <th scope="col" class="p-4">Tipo de historia</th>
                            <th scope="col" class="p-4">Fecha de registro</th>
                            <th scope="col" class="p-4">Motivo de la consulta</th>
                            <th scope="col" class="p-4">Diagnostico médico</th>
                            <th scope="col" class="p-4">Medicamentos</th>
                            <th scope="col" class="p-4">Examenes complementarios</th>
                        </template>
                        <template #main>
                            <tr v-for="historia in paciente.historias_clinicas" :key="paciente.id_paciente"
                                class="border-b dark:border-gray-600 hover:bg-gray-100 dark:hover:bg-gray-700">
                                <td class="p-4 w-4">
                                    <div class="flex items-center">
                                        <input id="checkbox-table-search-1" type="checkbox"
                                            onclick="event.stopPropagation()"
                                            class="w-4 h-4 text-primary-600 bg-gray-100 rounded border-gray-300 focus:ring-primary-500 dark:focus:ring-primary-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                        <label for="checkbox-table-search-1" class="sr-only">checkbox</label>
                                    </div>
                                </td>
                                <td>{{ historia.tipo_historia }}</td>
                                <td>{{ historia.profesional_registro }}</td>
                                <td>{{ historia.fecha_registro }}</td>
                                <td>{{ historia.motivo_consulta }}</td>
                                <td>{{ historia.diagnostico_medico }}</td>
                                <td>{{ historia.medicamentos }}</td>
                                <td>{{ historia.examenes_complementarios }}</td>
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
                                            <h3 class="text-lg font-semibold text-gray-900 dark:text-white">Añadir
                                                nueva historia clínica
                                            </h3>
                                            <button type="button"
                                                class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white"
                                                data-modal-target="createProductModal"
                                                data-modal-toggle="createProductModal">
                                                <svg aria-hidden="true" class="w-5 h-5" fill="currentColor"
                                                    viewbox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                                    <path fill-rule="evenodd"
                                                        d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                                        clip-rule="evenodd" />
                                                </svg>
                                                <span class="sr-only">Close modal</span>
                                            </button>
                                        </div>
                                        <!-- Modal body -->
                                        <form @submit.prevent="enviarFormularioHistoriaClinica">
                                            <div class="grid gap-4 mb-4 sm:grid-cols-2">
                                                <h3 class="text-lg font-bold text-gray-900 dark:text-white mb-2">
                                                    Historia Clínica General</h3>
                                                <br>
                                                <div>
                                                    <label for="profesional_registro"
                                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Fisioterapeuta</label>
                                                    <input type="text" name="profesional_registro"
                                                        id="profesional_registro"
                                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                                        v-model="formH.profesional_registro">
                                                </div>
                                                <div>
                                                    <label for="tipo_historia"
                                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tipo
                                                        de historia</label>
                                                    <input type="text" name="tipo_historia" id="tipo_historia"
                                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                                        v-model="formH.tipo_historia">
                                                </div>
                                                <div>
                                                    <label for="fecha_registro"
                                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Fecha
                                                        de registro</label>
                                                    <input type="date" name="fecha_registro" id="fecha_registro"
                                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                                        v-model="formH.fecha_registro">
                                                </div>
                                                <div>
                                                    <label for="motivo_consulta"
                                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Motivo
                                                        de la consulta</label>
                                                    <input type="text" name="motivo_consulta" id="motivo_consulta"
                                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                                        v-model="formH.motivo_consulta">
                                                </div>
                                                <div>
                                                    <label for="diagnostico_medico"
                                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Diagnostico
                                                        médico</label>
                                                    <input type="text" name="diagnostico_medico" id="diagnostico_medico"
                                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                                        v-model="formH.diagnostico_medico">
                                                </div>
                                                <div>
                                                    <label for="medicamentos"
                                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Medicamentos</label>
                                                    <input type="text" name="medicamentos" id="medicamentos"
                                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                                        v-model="formH.medicamentos">
                                                </div>
                                                <div>
                                                    <label for="examenes_complementarios"
                                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Examenes
                                                        complementarios</label>
                                                    <input type="text" name="examenes_complementarios"
                                                        id="examenes_complementarios"
                                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                                        v-model="formH.examenes_complementarios">
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
                                            <svg aria-hidden="true" class="w-5 h-5" fill="currentColor"
                                                viewbox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                                <path fill-rule="evenodd"
                                                    d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                                    clip-rule="evenodd" />
                                            </svg>
                                            <span class="sr-only">Close modal</span>
                                        </button>
                                        <div class="p-6 text-center">
                                            <svg aria-hidden="true"
                                                class="mx-auto mb-4 text-gray-400 w-14 h-14 dark:text-gray-200"
                                                fill="none" stroke="currentColor" viewbox="0 0 24 24"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                            </svg>
                                            <h3 class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400">
                                                Estás seguro que quieres eliminar este paciente?</h3>
                                            <button data-modal-toggle="delete-modal" type="button"
                                                class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center mr-2">Si,
                                                estoy seguro</button>
                                            <button data-modal-toggle="delete-modal" type="button"
                                                class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">No,
                                                cancelar</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </template>
                    </TableCRUDLayout>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
<script setup>
import ApplicationLogo from '@/Components/ApplicationLogo.vue';
</script>
<!-- ESTA ES LA PAGINA DEL DASHBOARD :D -->
<template>
    <div>
        <div class="p-6 lg:p-8 bg-white border-b border-gray-200">
            
            <img src="/assets/img/kaiadmin/logo_light.png" alt="Logo de la aplicación" class="block h-12 w-auto w-20 h-auto mx-auto my-4" />

            <h1 class="mt-8 text-2xl font-medium text-gray-900">
            
                ¡Bienvenido a BookNet, tu sistema integral de gestión bibliotecaria!
            </h1>

            <p class="mt-6 text-gray-500 leading-relaxed">
                BookNetOF es una herramienta diseñada para facilitar el acceso y la gestión de recursos bibliográficos, brindando una experiencia 
                intuitiva tanto a estudiantes y lectores como a administradores de la biblioteca. Aquí podrás consultar la disponibilidad de nuestros
                libros en tiempo real, realizar reservas y gestionar tus préstamos de manera sencilla y eficiente. Los administradores cuentan con 
                 funcionalidades avanzadas para organizar el inventario, controlar los préstamos, gestionar categorías y enviar notificaciones a los 
                 usuarios, todo en un solo lugar.
            </p>
            <!-- Botón para redirigir a la página principal -->
            <div class="mt-8">
                <a href="/inicio" class="inline-block px-6 py-3 text-white bg-blue-500 rounded-md hover:bg-blue-600">
                    Ir a la página principal
                </a>
            </div>
        </div>
    </div>
</template>

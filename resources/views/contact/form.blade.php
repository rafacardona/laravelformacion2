<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Pagina de contacto') }}
        </h2>
    </x-slot>

    <!-- AQUI VA EL FORMULARIO DE CONTACTO -->
    <div class="py-12">
        <div class="max-w-2xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-md sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <form method="POST" action="{{route("contact.send")}}">
                        <!-- DIRECTICA BLADE para incluir token al form, evita que nos hagan peticiones externas. Añade una capa de seguridad-->
                        @csrf
                        <div class="block mt-4">
                            <x-form-input name="subject" label="Escribe el motivo de tu mensaje" />
                        </div>
                        <div class="block mt-4">
                            <x-form-textarea name="message" label="Escribe tu mensaje aqui" />
                        </div>
                        <div class="flex items-center justify-end mt-4">
                            <x-form-submit/>Enviar Mensaje</x-form-submit>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

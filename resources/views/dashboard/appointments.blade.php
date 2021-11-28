<x-vue-app-layout>
    <x-slot name="moduleName">
        {{ __('Appointments') }}
    </x-slot>

    <x-slot name="vueApp">
        {{ mix('js/app-appointments.js') }}
    </x-slot>
</x-vue-app-layout>

<x-vue-app-layout>
    <x-slot name="moduleName">
        {{ __('Patients') }}
    </x-slot>

    <x-slot name="vueApp">
        {{ mix('js/app-patients.js') }}
    </x-slot>
</x-vue-app-layout>

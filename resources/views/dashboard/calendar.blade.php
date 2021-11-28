<x-vue-app-layout>
    <x-slot name="moduleName">
        {{ __('Calendar') }}
    </x-slot>

    <x-slot name="vueApp">
        {{ mix('js/app-calendar.js') }}
    </x-slot>
</x-vue-app-layout>

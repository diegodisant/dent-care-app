<x-vue-app-layout>
    <x-slot name="moduleName">
        {{ __('Users') }}
    </x-slot>

    <x-slot name="vueApp">
        {{ mix('js/app-users.js') }}
    </x-slot>
</x-vue-app-layout>

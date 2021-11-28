<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="grid grid-cols-3 gap-4 modules content-between justify-items-center">
                        <div></div>

                        <div class="item">
                            <a href="{{ route('dashboard.users') }}">
                                <p>{{ __('Users') }}</p>
                                <img src="img/dashboard/users.png" class="image"/>
                            </a>
                        </div>

                        <div></div>

                        <div class="item">
                            <a href="#">
                                <p>{{__('Patients')}}</p>
                                <img src="img/dashboard/patient.png" class="image"/>
                            </a>
                        </div>

                        <div class="item">
                            <a href="#">
                                <p>{{__('Appointments')}}</p>
                                <img src="img/dashboard/appointment.png" class="image"/>
                            </a>
                        </div>

                        <div class="item">
                            <a href="#">
                                <p>{{__('Calendar')}}</p>
                                <img src="img/dashboard/calendar.png" class="image justify-self-center"/>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

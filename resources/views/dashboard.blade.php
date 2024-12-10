<x-layout title="dashboard">
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @if($userRegistration->isEmpty())
                <p class="col-span-full text-center text-gray-500">{{ __('Je hebt nog niet gereageerd op vacatures.') }}</p>
            @else
                <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6 p-4">
                    @foreach($userRegistration as $registration)
                        <div class="card transition-transform transform hover:scale-105 hover:shadow-xl">
                            <img src="{{ asset('storage/'.$registration->vacancy->image) }}"
                                 alt="afbeelding van {{ basename($registration->vacancy->image) }}"
                                 class="rounded-t-lg">
                            <div class="p-4 bg-white dark:bg-gray-800 rounded-b-lg">
                                <h2 class="text-xl font-bold text-gray-800 mb-1">{{ $registration->vacancy->job_title }}</h2>
                                <p class="text-gray-600 mb-2">{{ Str::limit($registration->vacancy->description, 100) }}</p>
                                <h3 class="text-lg font-semibold text-gray-700"><b>Salaris:</b>
                                    €{{ $registration->vacancy->paycheck }}</h3>
                                <h3 class="text-lg font-semibold text-gray-700">
                                    <b>Contractduur:</b> {{ $registration->vacancy->contract_term }} maanden</h3>
                                <div class="mt-4 space-x-2">
                                    <a href="{{ route('vacancies.show', $registration->vacancy) }}"
                                       class="inline-block bg-primary-violet text-white font-semibold py-2 px-4 rounded hover:bg-primary-yellow transition hover:text-primary-violet duration-200">
                                        Bekijk vacature
                                    </a>

                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @endif
        </div>
    </div>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100 flex justify-evenly">

                    <a href="{{ route('profile.edit') }}" class="text-primary-violet hover:text-primary-yellow mx-4">
                        Mijn Profiel
                    </a>
                </div>
            </div>
            {{ __("You're logged in!") }}
        </div>
    </div>
</x-layout>

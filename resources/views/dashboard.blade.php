<x-layout title="dashboard">
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight text-center">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-lg mx-auto px-4">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100 text-center">
                    <a href="{{ route('profile.edit') }}" class="inline-block w-full bg-primary-yellow text-primary-violet font-semibold py-3 px-6 rounded-md hover:bg-primary-violet transition hover:text-white duration-200">
                        Profiel gegevens
                    </a>
                </div>
            </div>

        </div>
    </div>

    <div class="py-6">
        <div class="max-w-lg mx-auto px-4">
            @if($userRegistration->isEmpty())
                <p class="text-center text-gray-500">
                    {{ __('Je hebt nog niet gereageerd op vacatures.') }}
                </p>
            @else
                <div class="space-y-6">
                    @foreach($userRegistration as $registration)
                        <div class="card transition-transform transform hover:scale-105 hover:shadow-xl">
                            <img src="{{ asset('storage/'.$registration->vacancy->image) }}"
                                 alt="afbeelding van {{ basename($registration->vacancy->image) }}"
                                 class="rounded-t-lg">
                            <div class="p-4 bg-white dark:bg-gray-800 rounded-b-lg">
                                <h2 class="text-xl font-bold text-gray-800 mb-2">
                                    {{ $registration->vacancy->job_title }}
                                </h2>
                                <p class="text-gray-600 mb-4">
                                    {{ Str::limit($registration->vacancy->description, 100) }}
                                </p>
                                <h3 class="text-lg font-semibold text-gray-700 mb-1">
                                    <b>Salaris:</b> €{{ $registration->vacancy->paycheck }}
                                </h3>
                                <h3 class="text-lg font-semibold text-gray-700 mb-4">
                                    <b>Contractduur:</b> {{ $registration->vacancy->contract_term }} maanden
                                </h3>
                                <div class="mt-4">
                                    <a href="{{ route('vacancies.show', $registration->vacancy) }}"
                                       class="inline-block w-full bg-primary-violet text-white font-semibold py-2 px-4 rounded hover:bg-primary-yellow transition hover:text-primary-violet duration-200 text-center">
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
</x-layout>

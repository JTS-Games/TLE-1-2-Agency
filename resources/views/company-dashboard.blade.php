<x-layout title="Bedrijfsdashboard">
    <div class="container mx-auto">
        <h1 class="text-2xl font-bold mb-6">Welkom, {{ $company->name }}</h1>

        {{-- Knop om nieuwe vacature toe te voegen --}}
        <a href="{{ route('vacancies.create') }}"
           class="bg-primary-violet text-white rounded-full px-6 py-2 text-base hover:bg-primary-yellow hover:text-primary-violet hover:duration-200">
            + Voeg nieuwe vacature toe
        </a>

        <div class="mt-6">
            <h2 class="text-lg font-semibold mb-4">Vacatures van {{ $company->name }}</h2>

            {{-- Als er vacatures zijn --}}
            @if($vacancies->count() > 0)
                <table class="table-auto w-full border-collapse">
                    <thead>
                    <tr>
                        <th class="border px-4 py-2">Vacature Titel</th>
                        <th class="border px-4 py-2">Beschrijving</th>
                        <th class="border px-4 py-2">Locatie</th>
                        <th class="border px-4 py-2">Status</th>
                        <th class="border px-4 py-2">Registraties</th>
                        <th class="border px-4 py-2">Volgende in wachtrij uitnodigen</th>
                        <th class="border px-4 py-2">Acties</th>

                    </tr>
                    </thead>
                    <tbody>
                    @foreach($vacancies as $vacancy)
                        <tr>
                            <td class="border px-4 py-2">{{ $vacancy->job_title }}</td>
                            <td class="border px-4 py-2">{{ $vacancy->description }}</td>
                            <td class="border px-4 py-2">{{ $vacancy->location }}</td>
                            <td class="border px-4 py-2">{{ $vacancy->registrations_count }}</td>
                            @if($vacancy->registrations_count > 0 && $vacancy->appointments_count == 0)
                                <td>
                                <form action="{{ route('appointments.store', $vacancy->id) }}" method="POST" style="display: inline;">
                                    @csrf
                                    <label for="date">Datum</label>
                                    <input type="datetime-local" name="date" id="date">
                                    <label for="description">Bericht</label>
                                    <textarea name="description" id="description" cols="20" rows="5"></textarea>
                                    <button type="submit"
                                            class="bg-primary-violet text-white rounded-full px-4 py-2 text-sm hover:bg-primary-yellow hover:text-primary-violet hover:duration-200 inline-block">
                                        Uitnodigen
                                    </button>
                                </form>
                                </td>
                            @else
                                <td>{{$vacancy->registrations_count <= 0 ? 'Geen registraties' : 'U heeft al een kandidaat uitgenodigd'}}</td>
                            @endif
                            <td class="border px-4 py-2">
                                @if($vacancy->is_created==1)
                                    <span class="text-green-600">Wel gepubliceerd</span>
                                @else
                                    <span class="text-red-600">Niet gepubliceerd</span>
                                @endif
                            </td>
                            <td class="border px-4 py-2 text-center space-x-8-0">
                                <form action="{{ route('vacancies.toggle', $vacancy) }}" method="POST">
                                    @csrf
                                    @method('POST')
                                    <button type="submit"
                                            class="bg-primary-violet text-white rounded-full px-4 py-2 text-sm hover:bg-primary-yellow hover:text-primary-violet hover:duration-200">
                                        Toggle publicatie
                                    </button>
                                </form>

                                {{-- Bekijk knop --}}
                                <a href="{{ route('vacancies.show', $vacancy->id) }}"
                                   class="bg-primary-violet text-white rounded-full px-4 py-2 text-sm hover:bg-primary-yellow hover:text-primary-violet hover:duration-200 inline-block">
                                    Bekijk
                                </a>

                                {{-- Bewerken knop --}}
                                <a href="{{ route('vacancies.edit', $vacancy) }}"
                                   class="bg-primary-violet text-white rounded-full px-4 py-2 text-sm hover:bg-primary-yellow hover:text-primary-violet hover:duration-200 inline-block">
                                    Bewerken
                                </a>
                                <form action="{{ route('vacancies.destroy', $vacancy) }}" method="POST" style="display: inline;" onsubmit="return confirm('Weet jij zeker of jij deze vacature wil verwijderen?');">
                                    @csrf
                                    @method('DELETE')
                                        <button type="submit"
                                                class="bg-primary-violet text-white rounded-full px-4 py-2 text-sm hover:bg-primary-yellow hover:text-primary-violet hover:duration-200 inline-block">
                                            Verwijder vacature
                                        </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            @else
                {{-- Geen vacatures gevonden --}}
                <p class="text-gray-600">Geen vacatures gevonden.</p>
            @endif
        </div>
    </div>
</x-layout>

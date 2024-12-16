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
                        <th class="border px-4 py-2">Acties</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($vacancies as $vacancy)
                        <tr>
                            <td class="border px-4 py-2">{{ $vacancy->job_title }}</td>
                            <td class="border px-4 py-2">{{ $vacancy->description }}</td>
                            <td class="border px-4 py-2">{{ $vacancy->location }}</td>
                            <td class="border px-4 py-2">
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

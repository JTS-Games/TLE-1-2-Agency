<x-layout>
    <x-slot name="title">Vacature Preview</x-slot>
    <div class="bg-[rgb(251,252,247)] min-h-screen flex items-center justify-center py-12 px-4">
        <div class="bg-[rgb(226,236,200)] p-8 rounded-lg shadow-md w-full max-w-4xl">
            <h1 class="text-[rgb(170,1,96)] font-bold text-3xl mb-8 font-radikal-bold text-center">Vacature Preview</h1>

            <div class="space-y-6">
                <p><strong>Afbeelding:</strong></p>
                <img src="{{ asset('storage/' . $vacancy->image) }}" alt="Vacature afbeelding" class="w-full h-auto rounded-md">

                <p><strong>Titel:</strong> {{ $vacancy->job_title }}</p>
                <p><strong>Beschrijving:</strong> {{ $vacancy->description }}</p>
                <p><strong>Locatie:</strong> {{ $vacancy->location }}</p>
                <p><strong>Salaris:</strong> {{ $vacancy->paycheck }}</p>
                <p><strong>Contract Termijn:</strong> {{ $vacancy->contract_term }}</p>
                <p><strong>Werktijden:</strong> {{ $vacancy->working_hours }}</p>
                <p><strong>Bedrijfs-ID:</strong> {{ $vacancy->company_id }}</p>

                <form action="{{ route('vacancies.confirm', $vacancy->id) }}" method="POST">
                    @csrf
                    <div class="flex justify-between">
                        <a href="{{ route('vacancies.edit', $vacancy->id) }}" class="btn btn-secondary">Terug naar bewerken</a>
                        <button type="submit" class="btn btn-primary">Maak Vacature</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-layout>

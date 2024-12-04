<x-layout title="Verdachte Vacatures">
    <h2>Verdachte Vacatures</h2>

    @if(session('status'))
        <div style="color: green;">
            {{ session('status') }}
        </div>
    @endif

    <table border="1" style="width: 100%; border-collapse: collapse; text-align: left;">
        <thead>
        <tr>
            <th>Id</th>
            <th>Functie</th>
            <th>Uurloon</th>
            <th>Contractduur</th>
            <th>Aangemaakt</th>
            <th>Acties</th>
        </tr>
        </thead>
        <tbody>
        @foreach($suspiciousVacancies as $vacancy)
            <tr>
                <td>{{ $vacancy->id }}</td>
                <td>{{ $vacancy->job_title }}</td>
                <td>€{{ $vacancy->paycheck }}</td>
                <td>{{ $vacancy->contract_term }}</td>
                <td>{{ $vacancy->created_at->format('d-m-Y H:i') }}</td>
                <td>
                    <form action="{{ route('vacancies.destroy', $vacancy) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" onclick="return confirm('Weet je zeker dat je deze vacature wilt verwijderen?')">
                            Verwijderen
                        </button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</x-layout>

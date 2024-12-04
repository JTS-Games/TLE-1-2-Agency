@php use Carbon\Carbon; @endphp
<x-layout title="OpenHiring | Vacatures">
    <h2>Alle vacatures</h2>


    <table border="1" style="width: 100%; border-collapse: collapse; text-align: left;">
        <thead>
        <tr>
            <th>Id</th>
            <th>Functie</th>
            <th>Uurloon</th>
            <th>Contractduur</th>
            <th>Aangemaakt</th>
            <th>Bewerkt</th>
            <th>Acties</th>
        </tr>
        </thead>
        <tbody>
        @foreach($allVacancies as $vacancy)
            <tr>
                <td>{{ $vacancy->id }}</td>
                <td>{{ $vacancy->job_title }}</td>
                <td>€{{ $vacancy->paycheck }}</td>
                <td>{{ $vacancy->contract_term }}</td>
                <td>{{ Carbon::parse($vacancy->created_at)->format('d-m-Y H:i') }}</td>
                <td>{{ Carbon::parse($vacancy->updated_at)->format('d-m-Y H:i') }}</td>
                <td>

                    <form action="{{ route('vacancies.destroy', $vacancy->id) }}" method="POST" style="display: inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" onclick="return confirm('Weet je zeker dat je deze vacature wilt verwijderen?')">
                            Verwijder
                        </button>
                    </form>


                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</x-layout>

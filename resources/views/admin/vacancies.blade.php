@php use Carbon\Carbon; @endphp
<x-layout title="OpenHiring | Vacatures">
    <h2>Alle vacatures</h2>
    <table>
        <thead>
        <tr>
            <th>Id</th>
            <th>Functie</th>
            <th>Uurloon</th>
            <th>Contractduur</th>
            <th>Aangemaakt</th>
            <th>Bewerkt</th>
        </tr>
        </thead>
        <tbody>
        @foreach($allVacancies as $vacancy)
            <tr>
                <td>{{$vacancy->id}}</td>
                <td>{{$vacancy->job_title}}</td>
                <td>€{{$vacancy->paycheck}}</td>
                <td>{{$vacancy->contract_term}}</td>
                <td>{{$vacancy->created_at}}</td>
                <td>{{$vacancy->updated_at}}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
</x-layout>

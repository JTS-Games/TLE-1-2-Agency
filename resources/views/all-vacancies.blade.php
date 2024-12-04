<x-layout title="Mijn Vacatures">
    @dump($allVacancies)
    @foreach($allVacancies as $vacancy)
        <div>
            <h1>{{$vacancy->job_title}}</h1>
            <h1>{{$vacancy->description}}</h1>
            <h1>{{$vacancy->paycheck}}</h1>
            <h1>{{$vacancy->contract_term}}</h1>
            <h1>{{$vacancy->con}}</h1>
        </div>
    @endforeach
</x-layout>

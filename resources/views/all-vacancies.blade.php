<x-layout title="Alle vacatures">
    <div class="grid grid-cols-4">
        @foreach($allVacancies as $vacancy)
            <div class="flex flex-col  border-solid border-2 border-black ">
                <h1>{{$vacancy->job_title}}</h1>
                <h1>{{$vacancy->description}}</h1>
                <h1>{{$vacancy->paycheck}}</h1>
                <h1>{{$vacancy->contract_term}}</h1>
                <h1>{{$vacancy->company_id}}</h1>
                <a href="{{route('vacancies.show',$vacancy)}}">Bekijk vacatures</a>
            </div>
        @endforeach
    </div>

</x-layout>

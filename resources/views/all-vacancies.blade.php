<x-layout title="Alle vacatures">
    <div class="grid grid-cols-3">
        @foreach($allVacancies as $vacancy)
            <div class="p-5">
                <div class="flex flex-col border-solid border-2 border-black items-baseline rounded-lg w-100 min-h-full">
                    <img class="object-contain h-48 w-96" src="{{asset('images/openhiring-logo.png')}}">
                    <h1 class="ml-3 font-bold">{{$vacancy->job_title}}</h1>
                    <h1 class="ml-3 mt-2">{{$vacancy->description}}</h1>
                    <div class="mt-auto">
                    <h1 class="ml-3">{{$vacancy->paycheck}}</h1>
                    <h1 class="ml-3">{{$vacancy->contract_term}}</h1>
                    <h1 class="ml-3">{{$vacancy->company_id}}</h1>
                    </div>
                    <a class="ml-3 mt-auto mb-5 border-4 border-solid border-pink-800 rounded-full bg-pink-800 text-white" href="{{route('vacancies.show', $vacancy)}}">Bekijk vacatures</a>
                </div>
            </div>
        @endforeach
    </div>
</x-layout>

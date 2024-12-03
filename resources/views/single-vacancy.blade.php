<x-layout title="{{$vacancy->job_title}}">
    <div class="bg-white shadow-lg rounded-lgz p-4">
        <div class="flex flex-col w-1/2 m-auto justify-between items-center">
            <img src="{{asset('images/openhiring-logo.png')}}" alt="afbeelding van {{$vacancy->job_title}}" class="h-6">
            <h1 class="font">Functie titel:{{$vacancy->job_title}}</h1>
            <h1>Functieomschrijving:{{$vacancy->description}}</h1>
            <h1>Salaris:{{$vacancy->paycheck}}</h1>
            <h1>{{$vacancy->company_id}}</h1>
        </div>
    </div>
</x-layout>

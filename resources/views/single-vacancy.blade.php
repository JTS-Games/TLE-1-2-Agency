<x-layout title="{{$vacancy->job_title}}">

    <div class="flex flex-col w-11/12 md:w-3/4 lg:w-2/3 m-auto bg-white shadow-md rounded-lg overflow-hidden my-20 transition-transform transform hover:scale-110">

        <img src="{{asset('storage/'.$vacancy->image)}}" alt="afbeelding van {{basename($vacancy->image)}}"

             class="h-60 w-full object-cover object-top">
        <div class="p-8">
            <div>
                <h1 class="text-4xl font-bold text-gray-800 mb-2">Functie titel: {{$vacancy->job_title}}</h1>
                <h3 class="text-xl  text-gray-700 mb-4">
                    <b>Bedrijf:</b> {{$company->name}}
                </h3>
                <h3 class="text-xl  text-gray-700 mb-4">
                    <b>Functieomschrijving:</b> {{$vacancy->description}}
                </h3>
            </div>
        </div>
    </div>


    <div class="flex flex-col w-11/12 md:w-3/4 lg:w-2/3 m-auto bg-white shadow-md rounded-lg overflow-hidden my-20 p-8">
        <div class="mb-4">
            <h1 class="text-center text-3xl font-bold text-gray-800 mb-8">Wat bieden wij</h1>
            <h3 class="text-xl  text-gray-700"><b>Salaris:</b> €{{$vacancy->paycheck}}</h3>
            <h3 class="text-xl  text-gray-700"><b>Locatie:</b> {{$vacancy->location}}</h3>
            <h3 class="text-xl  text-gray-700"><b>Werktijden:</b> {{$vacancy->working_hours}} Uur per week</h3>
        </div>

        <div class="mb-6">
            <h3 class="text-xl font-semibold text-gray-800 mb-2"><b>Vereisten:</b></h3>
            <ul class="list-disc list-inside text-gray-700">
                @foreach($vacancy->qualifications as $qualification)
                    <li>{{ $qualification->name }}</li>
                @endforeach
            </ul>
        </div>

        <div class="flex flex-col md:flex-row justify-center md:gap-20 gap-4 mt-6">

            <a href="{{route('vacancies.index')}}"
               class="bg-primary-violet text-white rounded-full px-8 py-3 text-lg text-center hover:bg-primary-yellow hover:text-primary-violet transition">
                Ga terug
            </a>

            @if(!$alreadyRegistered)
                <a href="{{route('vacancies.registration',$vacancy)}}"
                   class="bg-primary-violet text-white rounded-full px-8 py-3 text-lg text-center hover:bg-primary-yellow hover:text-primary-violet transition">
                    Aanmelden
                </a>
            @endif

        </div>

    </div>

</x-layout>

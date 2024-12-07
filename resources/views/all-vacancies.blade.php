<x-layout title="Alle vacatures">

    <div class=" grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6 p-4 justify-between">
        @foreach($allVacancies as $vacancy)
            <div
                class="flex flex-col items-left content-around  border border-gray-300 rounded-lg shadow-lg p-6 bg-white transition-transform transform hover:scale-110">
                <img src="{{asset('storage/'.$vacancy->image)}}"
                     alt="afbeelding van {{basename($vacancy->image)}}">
                <h1 class="text-xl font-bold text-gray-800 mb-2">{{$vacancy->job_title}}</h1>
                <p class="text-gray-600 mb-4">{{$vacancy->description}}</p>
                <h2 class="text-lg font-semibold text-gray-700"><b>Salaris:</b>€{{$vacancy->paycheck}}</h2>
                <h2 class="text-lg font-semibold text-gray-700"><b>Contractduur:</b> {{$vacancy->contract_term}} maanden
                </h2>
                <div>
                    <a href="{{route('vacancies.show', $vacancy)}}"
                       class="mt-auto inline-block bg-primary-violet text-white  font-semibold py-2 px-4 rounded hover:bg-primary-yellow transition hover:text-primary-violet duration-200">
                        Bekijk vacature
                    </a>
                    <a href="{{route('vacancies.edit', $vacancy)}}"
                       class="mt-auto inline-block bg-primary-violet text-white  font-semibold py-2 px-4 rounded hover:bg-primary-yellow transition hover:text-primary-violet duration-200">
                        Wijzig vacature
                    </a>
                </div>
            </div>
        @endforeach
    </div>

</x-layout>

<x-layout title="Werknemer dashboard">

    <div class="flex flex-col items-center gap-6 p-4">
        @foreach($vacancies as $vacancy)
            <div
                class="w-full sm:w-4/5 md:w-3/5 lg:w-2/5 border border-gray-300 rounded-lg shadow-lg p-6 bg-white flex flex-col justify-between transition-transform transform hover:scale-105">

                <div>
                    <img src="{{asset('storage/'.$vacancy->image)}}"
                         alt="afbeelding van {{basename($vacancy->image)}}"
                         class="w-full h-auto rounded mb-4">
                    <h1 class="text-xl font-bold text-gray-800 mb-2">{{$vacancy->job_title}}</h1>
                    <p class="text-gray-600 mb-4">{{$vacancy->description}}</p>
                    <h2 class="text-lg font-semibold text-gray-700 mb-1"><b>Salaris:</b> €{{$vacancy->paycheck}}</h2>
                    <h2 class="text-lg font-semibold text-gray-700 mb-4"><b>Contractduur:</b> {{$vacancy->contract_term}} maanden</h2>
                </div>

                <div class="flex justify-center mt-4">
                    <a href="{{route('vacancies.show', $vacancy)}}"
                       class="inline-block bg-primary-violet text-white font-semibold py-2 px-4 rounded hover:bg-primary-yellow transition hover:text-primary-violet duration-200">
                        Bekijk vacature
                    </a>
                </div>
            </div>
        @endforeach
    </div>

</x-layout>

<x-layout title="Werknemer dashboard">

    <form class="max-w-lg mx-auto my-10">
        @csrf
        <label for="search" class="mb-2 text-sm font-medium text-gray-900 sr-only dark:text-white">Search</label>
        <div class="relative">
            <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                <svg class="w-5 h-5 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 19l-4-4m0-7a7 7 0 1 1-14 0 7 7 0 0 1 14 0Z"/>
                </svg>
            </div>
            <input type="search" id="search" name="search" class="block w-full p-4 pl-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-800 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="zoek op locatie, salaris of naam" required />
            <button type="submit" class="absolute right-2.5 bottom-2.5 bg-blue-600 text-white hover:bg-blue-700 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Search</button>
        </div>
        <div class="mt-4 text-center">
            <a href="{{ route('userHomepage') }}" class="text-blue-500 hover:underline">Reset zoekopdracht</a>
        </div>
    </form>

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

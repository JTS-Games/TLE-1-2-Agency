<x-layout title="{{$vacancy->job_title}}">

    <div class="flex flex-col w-11/12 md:w-3/4 lg:w-2/3 m-auto bg-white shadow-md rounded-lg overflow-hidden my-20">

        <img src="{{asset('images/openhiring-logo.png')}}" alt="afbeelding van {{$vacancy->job_title}}"

             class="h-60 w-full object-cover object-top">


        <div class="p-8">
            <h1 class="text-4xl font-bold text-gray-800 mb-2">Functie titel: {{$vacancy->job_title}}</h1>
            <h3 class="text-xl font-semibold text-gray-700 mb-4"><b>Functieomschrijving:</b> {{$vacancy->description}}
            </h3>

            <div class="mb-4">

                <h3 class="text-xl font-semibold text-gray-700"><b>Salaris:</b> €{{$vacancy->paycheck}}</h3>

                <h3 class="text-xl font-semibold text-gray-700"><b>Locatie:</b> {{$vacancy->location}}</h3>

                <h3 class="text-xl font-semibold text-gray-700"><b>Werktijden:</b> {{$vacancy->working_hours}} Uur per
                    week</h3>

            </div>


            <div class="mb-6">

                <h3 class="text-xl font-semibold text-gray-800 mb-2"><b>Vereisten:</b></h3>

                <ul class="list-disc list-inside text-gray-700">

                    <li>Minimaal 2 jaar ervaring in een vergelijkbare functie</li>

                    <li>Uitstekende communicatieve vaardigheden</li>

                    <li>In staat om zowel zelfstandig als in teamverband te werken</li>

                    <li>Flexibel en bereid om te leren</li>

                </ul>

            </div>


            <a href="#"

               class="inline-block bg-blue-600 text-white font-semibold py-2 px-4 rounded hover:bg-blue-500 transition duration-200">

                Aanmelden

            </a>

        </div>

    </div>

</x-layout>

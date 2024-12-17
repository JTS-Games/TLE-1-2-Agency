<x-layout title="inspiration">
    <div class="container mx-auto px-4 py-10 text-gray-800">
        <h1 class="text-center text-6xl font-bold mb-8 text-primary-violet">Onze succesverhalen, uw inspiratie</h1>

        <div class="grid sm:grid-cols-1 md:grid-cols-2 gap-8">
            {{-- Werkgevers Section --}}
            <div>
                <h2 class="text-2xl font-bold mb-4 text-pink-700">Werkgevers</h2>

                <div class="space-y-6">
                    {{-- Card 1 --}}
                    <div class="border border-gray-200 p-4 rounded-md bg-white shadow-md">
                        <div class="flex items-center">
                            <img src="{{ asset('images/face-1.png') }}" class="w-16 h-16 bg-gray-300 rounded-full mr-4" alt="Amanda">
                            <h3 class="text-xl font-semibold">Amanda</h3>
                        </div>
                        <p class="text-gray-600 mt-2">
                            'We hebben inmiddels 3 pilots gedaan en de uitkomsten zijn positief. Er komen mensen op af die we anders niet spreken. Daar gaan we mee in gesprek om te bekijken of er vanuit beide kanten een klik is. Door deze manier van werven benutten we meer potentieel van mensen...'
                        </p>
                    </div>

                    {{-- Card 2 --}}
                    <div class="border border-gray-200 p-4 rounded-md bg-white shadow-md">
                        <div class="flex items-center">
                            <img src="{{ asset('images/face-2.png') }}" class="w-16 h-16 bg-gray-300 rounded-full mr-4" alt="Marieke van der Kleij">
                            <h3 class="text-xl font-semibold">Marieke van der Kleij</h3>
                        </div>
                        <p class="text-gray-600 mt-2">
                            “We lazen in een artikel in het AD dat Start Foundation bedrijven zocht die mee wilden doen aan een pilot met Open Hiring..."
                        </p>
                    </div>

                    {{-- Card 3 --}}
                    <div class="border border-gray-200 p-4 rounded-md bg-white shadow-md">
                        <div class="flex items-center">
                            <img src="{{ asset('images/face-3.png') }}" class="w-16 h-16 bg-gray-300 rounded-full mr-4" alt="Bart Dikkeschei">
                            <h3 class="text-xl font-semibold">Bart Dikkeschei</h3>
                        </div>
                        <p class="text-gray-600 mt-2">
                            “Wij gaan actief langs bij opvanglocaties en gemeenten. Hier geven wij voorlichting over onze werkwijze en Open Hiring..."
                        </p>
                    </div>
                </div>

                {{-- Button --}}
                <div class="mt-6">
                    <a href="{{ route('companies.create') }}" class="block text-center bg-pink-600 text-white py-2 rounded-md hover:bg-pink-700 transition-all">
                        Geef u nu op voor Open Hiring
                    </a>
                </div>
            </div>

            {{-- Werknemers Section --}}
            <div>
                <h2 class="text-2xl font-bold mb-4 text-pink-700">Werknemers</h2>

                <div class="space-y-6">
                    {{-- Card 1 --}}
                    <div class="border border-gray-200 p-4 rounded-md bg-white shadow-md">
                        <h3 class="text-xl font-semibold">Tevreden werknemer</h3>
                        <p class="text-gray-600 mt-2">
                            'Ik hou niet van stilzitten en wilde in mijn nieuwe woonplaats ook weer snel aan de slag. Maar ik heb vier kinderen en daardoor langere periodes niet gewerkt...'
                        </p>
                    </div>

                    {{-- Card 2 --}}
                    <div class="border border-gray-200 p-4 rounded-md bg-white shadow-md">
                        <h3 class="text-xl font-semibold">Tevreden werknemer</h3>
                        <p class="text-gray-600 mt-2">
                            ‘Ik heb jarenlang gewerkt, maar zat een tijdje thuis vanwege privéomstandigheden. Toen ik weer aan het werk wilde, dacht ik: hoe ga ik dit aanpakken?...'
                        </p>
                    </div>

                    {{-- Card 3 --}}
                    <div class="border border-gray-200 p-4 rounded-md bg-white shadow-md">
                        <h3 class="text-xl font-semibold">Tevreden werknemer</h3>
                        <p class="text-gray-600 mt-2">
                            ‘De wil om te gaan werken was voor mij het belangrijkste. Veel werkzaamheden leer je toch in de praktijk. De proefmaand beviel me goed...'
                        </p>
                    </div>
                </div>

                {{-- Button --}}
                <div class="mt-6">
                    <a href="{{ route('register') }}" class="block text-center w-full bg-pink-600 text-white py-2 rounded-md hover:bg-pink-700 transition-all">
                        Begin nu met werk zoeken
                    </a>
                </div>
            </div>
        </div>
    </div>
</x-layout>

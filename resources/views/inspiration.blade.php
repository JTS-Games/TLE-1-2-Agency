<x-layout title="inspiration">
<div class="container mx-auto px-4 py-10 text-gray-800">
    <h1 class="text-center text-6xl font-bold mb-8">Onze succesverhalen, uw inspiratie</h1>

    <div class="grid grid-cols-2 gap-8">
        <div>
            <h2 class="text-2xl font-bold mb-4 text-pink-700">Werkgevers</h2>

            <div class="space-y-6">
                <div class="border border-gray-200 p-4 rounded-md bg-white shadow-md">
                    <div class="flex items-center">
                        <img src="{{asset('images/face-1.png')}}" class="w-16 h-16 bg-gray-300 rounded-full mr-4">
                        <h3 class="text-xl font-semibold">Amanda</h3>
                    </div>
                    <p class="text-gray-600 mt-2">'We hebben inmiddels 3 pilots gedaan en de uitkomsten zijn positief. Er komen mensen op af die we anders niet spreken. Daar gaan we mee in gesprek om te bekijken of er vanuit beide kanten een klik is. Uit gesprekken blijkt dat Open Hiring werkt omdat de drempel lager is. Je hoeft bijvoorbeeld geen brief te schrijven of uitgebreide digitale vaardigheden te hebben. Door deze manier van werven benutten we meer potentieel van mensen. Hoe mooi is het als we iemand die graag wil werken, maar op bepaalde vlakken onzeker is, een baan kunnen aanbieden. Dan maakt mijn hart een sprongetje. Dat is goed voor de betrokkene, de maatschappij en voor de zorg. Win-win-win dus!'</p>
                </div>

                <div class="border border-gray-200 p-4 rounded-md bg-white shadow-md">
                    <div class="flex items-center">
                        <img src="{{asset('images/face-2.png')}}" class="w-16 h-16 bg-gray-300 rounded-full mr-4">
                        <h3 class="text-xl font-semibold">Marieke van der Kleij</h3>
                    </div>
                    <p class="text-gray-600 mt-2">“We lazen in een artikel in het AD dat Start Foundation bedrijven zocht die mee wilden doen aan een pilot met Open Hiring. Omdat het lastig is om goede vakmensen te vinden, hebben we toen als Kleywegen meegedaan.”</p>
                </div>

                <div class="border border-gray-200 p-4 rounded-md bg-white shadow-md">
                    <div class="flex items-center">
                        <img src="{{asset('images/face-3.png')}}" class="w-16 h-16 bg-gray-300 rounded-full mr-4">
                        <h3 class="text-xl font-semibold">Bart Dikkeschei</h3>
                    </div>
                    <p class="text-gray-600 mt-2">“Wij gaan actief langs bij opvanglocaties en gemeenten. Hier geven wij voorlichting over onze werkwijze en Open Hiring. Mensen kunnen zich bij ons inschrijven voor verschillende functies. Wij verbinden vervolgens onze klanten die nieuwe collega’s zoeken en de mensen op onze wachtlijst met elkaar.”</p>
                </div>
            </div>

            <div class="mt-6">
                <a href="{{route('companies.create')}}" class="w-full bg-pink-600 text-white py-2 rounded-md hover:bg-green-700 transition">
                    Geef u nu op voor Open Hiring
                </a>
            </div>
        </div>

        <div>
            <h2 class="text-2xl font-bold mb-4 text-pink-700">Werknemers</h2>

            <div class="space-y-6">
                <!-- Werknemer Cards -->
                <div class="border border-gray-200 p-4 rounded-md bg-white shadow-md">
                    <h3 class="text-xl font-semibold">Tevreden werknemer</h3>
                    <p class="text-gray-600 mt-2"> Ik hou niet van stilzitten en wilde in mijn nieuwe woonplaats ook weer snel aan de slag. Maar ik heb vier kinderen en daardoor langere periodes niet gewerkt. Ik merkte dat veel werkgevers die gaten in je cv toch lastig vinden. Mijn werkcoach had gehoord dat Van der Valk met Open Hiring werkte en raadde me aan om mezelf daar in te schrijven op de wachtlijst. Ik ben er naartoe gefietst en het was nog makkelijker: ik kon meteen beginnen. Zonder gesprek. Dat is nu zo’n tien maanden geleden en ik vind het hartstikke leuk. We hebben een heel fijn team. En ik werk altijd direct samen met een gezellige collega.</p>
                </div>

                <div class="border border-gray-200 p-4 rounded-md bg-white shadow-md">
                    <h3 class="text-xl font-semibold">Tevreden werknemer</h3>
                    <p class="text-gray-600 mt-2">‘Ik heb jarenlang gewerkt, maar zat een tijdje thuis vanwege privéomstandigheden. Toen ik weer aan het werk wilde, dacht ik: hoe ga ik dit aanpakken? Kan ik nog wel iets? En word ik met mijn leeftijd nog wel aangenomen? Bovendien had ik helemaal geen horeca-ervaring. Ik had nog nooit een kassa aangeraakt. Maar deze manier van solliciteren was zo laagdrempelig dat ik dacht: laat ik het gewoon proberen. Nu werk ik alweer anderhalf jaar op Schiphol bij horeca exploitant HMS Host Nederland. Daar sta ik voornamelijk achter de kassa. Maar ik bak ook brood, smeer broodjes en maak schoon.’</p>
                </div>

                <div class="border border-gray-200 p-4 rounded-md bg-white shadow-md">
                    <h3 class="text-xl font-semibold">Tevreden werknemer</h3>
                    <p class="text-gray-600 mt-2">‘De wil om te gaan werken was voor mij het belangrijkste. Veel werkzaamheden leer je toch in de praktijk. De proefmaand beviel me goed en heb nu een jaarcontract gekregen. Ik word nu verder opgeleid om de uiteenlopende vragen van inwoners te kunnen beantwoorden.’</p>
                </div>
            </div>

            <!-- Call to Action -->
            <div class="mt-6">
                <a href="{{route('register')}}" class="w-full bg-pink-600 text-white py-2 rounded-md hover:bg-pink-700 transition">
                    Begin nu met werk zoeken
                </a>
            </div>
        </div>
    </div>
</div>

</x-layout>

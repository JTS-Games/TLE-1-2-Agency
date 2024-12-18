<x-layout title="startpagina">
    <div class="container mx-auto p-6">
        <section class="flex flex-col lg:flex-row gap-2 justify-evenly items-start">

            {{--     Hier zouden de meest recente werknemers / reviews kunnen komen  --}}
            <div class="bg-primary-moss_light rounded-lg shadow p-6 max-w-md flex flex-col items-center text-center">
                <img src="{{asset('images/face-4.webp')}}" class="bg-basic-cream w-20 h-20 rounded-full mb-4">
                <p class="uppercase text-sm font-bold text-gray-600 mb-2">Werknemer</p>
                <blockquote class="text-lg font-medium text-gray-800 italic mb-4">
                    “Zonder sollicitatiegesprek is het makkelijker om aan het werk te gaan. Het is leuk, iedereen is
                    aardig. Ik heb het hier naar mijn zin.”
                </blockquote>
                <p class="text-sm text-gray-500">Vulploegmedewerker</p>
                <div class="flex gap-4 mt-4">

                    {{--                    <!-- Registreer als Gebruiker -->--}}
                    {{--                    <a href="{{ route('register') }}"--}}
                    {{--                       class="bg-white border border-gray-400 rounded-full px-4 py-2 text-sm font-semibold text-gray-700 hover:bg-gray-100">--}}
                    {{--                        Registreer als Gebruiker--}}
                    {{--                    </a>--}}
                </div>
            </div>
            <div class="bg-white rounded-lg shadow p-6 max-w-md flex flex-col items-center text-left">
                <img src="{{asset('images/face-2.png')}}" class="bg-basic-cream w-20 h-20 rounded-full mb-4">
                <p class="uppercase text-sm font-bold text-primary-violet mb-2">Werkgever</p>
                <blockquote class="text-lg font-bold text-gray-800  mb-4">
                    “Je moet je vooroordelen en aannames kunnen loslaten, maar dan zul je vaak verrast worden door de
                    kwaliteit en de persoon zelf.”
                </blockquote>
                <p class="font-semibold text-gray-700">Gaby Westekalen</p>
                <p class="text-sm text-gray-500">GWS de Schoonmaker</p>
                <div class="flex gap-4">
                    {{--                    <a href="{{ route('company.login.form') }}"--}}
                    {{--                       class="bg-white border border-gray-400 rounded-full px-4 py-2 text-sm font-semibold text-gray-700 hover:bg-gray-100">--}}
                    {{--                        Log In als Bedrijf--}}
                    {{--                    </a>--}}
                    {{--                    <a href="{{ route('companies.index') }}"--}}
                    {{--                       class="bg-white border border-gray-400 rounded-full px-4 py-2 text-sm font-semibold text-gray-700 hover:bg-gray-100">--}}
                    {{--                        Registreer als Bedrijf--}}
                    {{--                    </a>--}}
                </div>
            </div>
        </section>

        <section class="mt-12">
            <h2 class="text-center text-2xl font-bold text-gray-800 mb-8">Werkgevers die openstaan voor iedereen</h2>
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-2">

                <!-- Employer Card -->
                <div class="bg-white rounded-lg shadow p-4 text-center">
                    <div class="bg-gray-100 flex items-center justify-center rounded-lg mb-4">
                        <img src="{{asset('images/csu-logo.webp')}}" alt="CSU Logo" class="object-cover object-top w-full h-40">
                    </div>
                    <p class="text-lg font-semibold text-gray-800">CSU</p>
                    <p class="text-sm text-gray-500 mb-4">Schoonmaak - Ouddorp</p>
                </div>

                <!-- Employer Card -->
                <div class="bg-white rounded-lg shadow p-4 text-center">
                    <div class="bg-gray-100 flex items-center justify-center rounded-lg mb-4">
                        <img src="{{asset('images/ah-logo.jpeg')}}" alt="AH Logo" class="object-cover object-center w-full h-40">
                    </div>
                    <p class="text-lg font-semibold text-gray-800">Albert Heijn - Marketplaza</p>
                    <p class="text-sm text-gray-500 mb-4">Retail - Bruinisse</p>
                </div>

                <!-- Employer Card -->
                <div class="bg-white rounded-lg shadow p-4 text-center">
                    <div class="bg-gray-100 flex items-center justify-center rounded-lg mb-4">
                        <img src="{{asset('images/vdv-logo.jpg')}}" alt="Van der Valk Logo" class="object-cover object-center w-full h-40">
                    </div>
                    <p class="text-lg font-semibold text-gray-800">Van der Valk - Groningen</p>
                    <p class="text-sm text-gray-500 mb-4">Horeca - Eelderwolde</p>
                </div>
            </div>
            <div class="text-center mt-8 py-6">
                <a href="{{route('vacancies.index')}}"
                   class="bg-primary-violet text-white rounded-full px-6 py-4 text-base hover:bg-primary-yellow hover:text-primary-violet hover:duration-200">
                    Bekijk alle vacatures
                </a>
            </div>
        </section>
    </div>

</x-layout>

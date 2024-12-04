<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Game Dashboard</title>
</head>
<x-layout title="index">
    <div class="container mx-auto p-6">
        <section class="flex flex-col lg:flex-row gap-2 justify-evenly items-start">

            {{--     Hier zouden de meest recente werknemers / reviews kunnen komen  --}}
            <div class="bg-primary-moss_light rounded-lg shadow p-6 max-w-md flex flex-col items-center text-center">
                <div class="bg-basic-cream w-20 h-20 rounded-full mb-4"></div>
                <p class="uppercase text-sm font-bold text-gray-600 mb-2">Werknemer</p>
                <blockquote class="text-lg font-medium text-gray-800 italic mb-4">
                    “Zonder sollicitatiegesprek is het makkelijker om aan het werk te gaan. Het is leuk, iedereen is
                    aardig. Ik heb het hier naar mijn zin.”
                </blockquote>
                <p class="font-semibold text-gray-700">Adela</p>
                <p class="text-sm text-gray-500">Vulploegmedewerker</p>
                <a href="#"
                   class="mt-4 bg-white border border-gray-400 rounded-full px-4 py-2 text-sm font-semibold text-gray-700 hover:bg-gray-100">
                    Vind ook een baan
                </a>
            </div>
            <div class="bg-white rounded-lg shadow p-6 max-w-md flex flex-col items-center text-left">
                <div class="bg-basic-cream w-20 h-20 rounded-full mb-4"></div>
                <p class="uppercase text-sm font-bold text-primary-violet mb-2">Werkgever</p>
                <blockquote class="text-lg font-bold text-gray-800  mb-4">
                    “Je moet je vooroordelen en aannames kunnen loslaten, maar dan zul je vaak verrast worden door de
                    kwaliteit en de persoon zelf.”
                </blockquote>
                <p class="font-semibold text-gray-700">Gaby Westekalen</p>
                <p class="text-sm text-gray-500">GWS de Schoonmaker</p>
                <a href="#"
                   class="mt-4 bg-white border border-gray-400 rounded-full px-4 py-2 text-sm font-semibold text-gray-700 hover:bg-gray-100">
                    Een baan plaatsen
                </a>
            </div>
        </section>

        <section class="mt-12">
            <h2 class="text-center text-2xl font-bold text-gray-800 mb-8">Werkgevers die openstaan voor iedereen</h2>
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-2">

                <!-- Employer Card -->
                <div class="bg-white rounded-lg shadow p-4 text-center">
                    <div class="h-20 bg-gray-100 flex items-center justify-center rounded-lg mb-4">
                        <img src="logo-csu.png" alt="CSU Logo" class="h-12">
                    </div>
                    <p class="text-lg font-semibold text-gray-800">CSU</p>
                    <p class="text-sm text-gray-500 mb-4">Schoonmaak - Ouddorp</p>
                    <a href="#"
                       class="bg-primary-violet text-white rounded-full px-4 py-2 text-sm hover:bg-primary-violet_hover">
                        Lees meer
                    </a>
                </div>

                <!-- Employer Card -->
                <div class="bg-white rounded-lg shadow p-4 text-center">
                    <div class="h-20 bg-gray-100 flex items-center justify-center rounded-lg mb-4">
                        <img src="logo-ah.png" alt="AH Logo" class="h-12">
                    </div>
                    <p class="text-lg font-semibold text-gray-800">Albert Heijn - Marketplaza</p>
                    <p class="text-sm text-gray-500 mb-4">Retail - Bruinisse</p>
                    <a href="#"
                       class="bg-primary-violet text-white rounded-full px-4 py-2 text-sm hover:bg-primary-violet_hover">
                        Lees meer
                    </a>
                </div>

                <!-- Employer Card -->
                <div class="bg-white rounded-lg shadow p-4 text-center">
                    <div class="h-20 bg-gray-100 flex items-center justify-center rounded-lg mb-4">
                        <img src="logo-valk.png" alt="Van der Valk Logo" class="h-12">
                    </div>
                    <p class="text-lg font-semibold text-gray-800">Van der Valk - Groningen</p>
                    <p class="text-sm text-gray-500 mb-4">Horeca - Eelderwolde</p>
                    <a href="#"
                       class="bg-primary-violet text-white rounded-full px-4 py-2 text-sm hover:bg-primary-violet_hover">
                        Lees meer
                    </a>
                </div>
            </div>
            <div class="text-center mt-8">
                <a href="#"
                   class="bg-gray-100 border border-gray-400 rounded-full px-6 py-2 text-sm font-semibold text-gray-700 hover:bg-gray-200">
                    Alle werkgevers bekijken
                </a>
            </div>
        </section>
    </div>

</x-layout>

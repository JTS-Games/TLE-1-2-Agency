<x-layout title="employeedetails">
    <main>
        <div class="flex items-center justify-center py-10">
            <h1 class="text-6xl font-bold text-black text-center">Bedrijfdetails</h1>
        </div>
        <div class="max-w-4xl mx-auto p-6 bg-gray-100 rounded-lg shadow-lg space-y-6">
            <!-- Company Name -->
            <div class="border-b pb-4">
                <p class="text-sm text-gray-600 font-medium">Bedrijfsnaam</p>
                <h1 class="text-2xl font-semibold text-gray-800">{{$company->name}}</h1>
            </div>

            <!-- Company Description -->
            <div class="border-b pb-4">
                <p class="text-sm text-gray-600 font-medium">Bedrijfsomschrijving</p>
                <h1 class="text-lg text-gray-700">{{$company->description}}</h1>
            </div>

            <!-- Location -->
            <div class="border-b pb-4">
                <p class="text-sm text-gray-600 font-medium">Locatie</p>
                <h1 class="text-lg text-gray-700">{{$company->location_hq}}</h1>
            </div>

            <!-- KVK Certificate -->
            <div class="border-b pb-4">
                <p class="text-sm text-gray-600 font-medium">KVK-Certificaat</p>
                <img src="{{$company->coc_extract}}" alt="KVK-Waardering" class="text-lg text-gray-700">
            </div>

            <!-- Email -->
            <div>
                <p class="text-sm text-gray-600 font-medium">Email</p>
                <h1 class="text-lg text-gray-700">{{$company->email}}</h1>
            </div>
        </div>
    </main>
</x-layout>

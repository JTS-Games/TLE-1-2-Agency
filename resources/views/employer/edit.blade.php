<x-layout title="Bewerk {{$company->name}}">
    <div class="bg-[#2F4F4F] text-white py-6 text-center">
        <h1 class="text-3xl font-bold">Bewerk uw bedrijf {{$company->name}}</h1>
    </div>
    <div class="max-w-4xl mx-auto p-8 bg-white rounded-xl shadow-xl mt-10">
    <form action="{{route('company.update')}}" method="post">
        @csrf
        @method('patch')

        <!-- Naam bedrijf -->
        <div class="mb-6">
            <label for="name" class="block text-lg text-[#2F4F4F]">Naam bedrijf</label>
            <input type="text" name="name" id="name" value="{{$company->name}}" class="mt-1 block w-full border-2 border-gray-300 rounded-lg p-3 focus:border-purple-600 focus:ring-2 focus:ring-purple-500 transition duration-200" />
            @if($errors->has('name'))
                <div class="text-red-500 mt-1">{{ $errors->first('name') }}</div>
            @endif
        </div>

        <!-- Locatie HQ -->
        <div class="mb-6">
            <label for="location" class="block text-lg text-[#2F4F4F]">Locatie HQ</label>
            <input type="text" name="location" id="location" value="{{$company->location_hq}}" class="mt-1 block w-full border-2 border-gray-300 rounded-lg p-3 focus:border-purple-600 focus:ring-2 focus:ring-purple-500 transition duration-200" />
            @if($errors->has('location'))
                <div class="text-red-500 mt-1">{{ $errors->first('location') }}</div>
            @endif
        </div>

        <!-- Omschrijving -->
        <div class="mb-6">
            <label for="description" class="block text-lg text-[#2F4F4F]">Omschrijving van het bedrijf</label>
            <textarea id="description" name="description" rows="4" class="mt-1 block w-full border-2 border-gray-300 rounded-lg p-3 focus:border-purple-600 focus:ring-2 focus:ring-purple-500 transition duration-200" placeholder="Vul hier een omschrijving in van je bedrijf.">{{$company->description}}</textarea>
            @if($errors->has('description'))
                <div class="text-red-500 mt-1">{{ $errors->first('description') }}</div>
            @endif
        </div>

        <!-- Submit Button -->
        <div class="flex justify-center">
            <button type="submit" class="bg-pink-800 text-white px-8 py-3 rounded-lg shadow-lg hover:bg-pink-900 focus:outline-none focus:ring-4 focus:ring-purple-500 transform hover:scale-105 transition duration-300 ease-in-out">
                Bewerken
            </button>
        </div>
    </form>
    </div>
</x-layout>

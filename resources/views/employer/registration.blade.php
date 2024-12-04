<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Open Hiring</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<x-layout title="index">
    <body class="bg-[#f1f9f6] font-sans">

    <!-- Header -->
    <div class="bg-[#2F4F4F] text-white py-6 text-center">
        <h1 class="text-3xl font-bold">Registreer uw bedrijf</h1>
    </div>

    <!-- Formulier -->
    <div class="max-w-4xl mx-auto p-8 bg-white rounded-xl shadow-xl mt-10">
        <h2 class="text-2xl font-semibold text-[#2F4F4F] text-center mb-8">Vul de gegevens van uw bedrijf in</h2>

        <form action="{{ route('companies.store') }}" method="post">
            @csrf

            <!-- Naam bedrijf -->
            <div class="mb-6">
                <label for="name" class="block text-lg text-[#2F4F4F]">Naam bedrijf</label>
                <input type="text" name="name" id="name" class="mt-1 block w-full border-2 border-gray-300 rounded-lg p-3 focus:border-purple-600 focus:ring-2 focus:ring-purple-500 transition duration-200" />
                @if($errors->has('name'))
                    <div class="text-red-500 mt-1">{{ $errors->first('name') }}</div>
                @endif
            </div>

            <!-- Wachtwoord -->
            <div class="mb-6">
                <label for="password" class="block text-lg text-[#2F4F4F]">Wachtwoord <br>Vereisten:<br>-hoofdletter<br>-kleine letter<br>-speciaal teken (@$!%*?&)<br>-getal<br>-minimaal 8 tekens lang</label>
                <input type="password" name="password" id="password" class="mt-1 block w-full border-2 border-gray-300 rounded-lg p-3 focus:border-purple-600 focus:ring-2 focus:ring-purple-500 transition duration-200" />
                @if($errors->has('password'))
                    <div class="text-red-500 mt-1">{{ $errors->first('password') }}</div>
                @endif
            </div>

            <!-- Email -->
            <div class="mb-6">
                <label for="email" class="block text-lg text-[#2F4F4F]">Email</label>
                <input type="email" name="email" id="email" class="mt-1 block w-full border-2 border-gray-300 rounded-lg p-3 focus:border-purple-600 focus:ring-2 focus:ring-purple-500 transition duration-200" />
                @if($errors->has('email'))
                    <div class="text-red-500 mt-1">{{ $errors->first('email') }}</div>
                @endif
            </div>

            <!-- Locatie HQ -->
            <div class="mb-6">
                <label for="location" class="block text-lg text-[#2F4F4F]">Locatie HQ</label>
                <input type="text" name="location" id="location" class="mt-1 block w-full border-2 border-gray-300 rounded-lg p-3 focus:border-purple-600 focus:ring-2 focus:ring-purple-500 transition duration-200" />
                @if($errors->has('location'))
                    <div class="text-red-500 mt-1">{{ $errors->first('location') }}</div>
                @endif
            </div>

            <!-- Soort bedrijf -->
            <div class="mb-6">
                <label for="type" class="block text-lg text-[#2F4F4F]">Soort bedrijf</label>
                <input type="text" name="type" id="type" class="mt-1 block w-full border-2 border-gray-300 rounded-lg p-3 focus:border-purple-600 focus:ring-2 focus:ring-purple-500 transition duration-200" />
                @if($errors->has('type'))
                    <div class="text-red-500 mt-1">{{ $errors->first('type') }}</div>
                @endif
            </div>

            <!-- Omschrijving -->
            <div class="mb-6">
                <label for="description" class="block text-lg text-[#2F4F4F]">Omschrijving van het bedrijf</label>
                <textarea id="description" name="description" rows="4" class="mt-1 block w-full border-2 border-gray-300 rounded-lg p-3 focus:border-purple-600 focus:ring-2 focus:ring-purple-500 transition duration-200" placeholder="Vul hier een omschrijving in van je bedrijf."></textarea>
                @if($errors->has('description'))
                    <div class="text-red-500 mt-1">{{ $errors->first('description') }}</div>
                @endif
            </div>

            <!-- KVK Waardering -->
            <div class="mb-6">
                <label for="kvkWaardering" class="block text-lg text-[#2F4F4F]">KVK Waardering</label>
                <input type="text" name="kvkWaardering" id="kvkWaardering" class="mt-1 block w-full border-2 border-gray-300 rounded-lg p-3 focus:border-purple-600 focus:ring-2 focus:ring-purple-500 transition duration-200" />
                @if($errors->has('kvkWaardering'))
                    <div class="text-red-500 mt-1">{{ $errors->first('kvkWaardering') }}</div>
                @endif
            </div>

            <!-- Submit Button -->
            <div class="flex justify-center">
                <button type="submit" class="bg-pink-800 text-white px-8 py-3 rounded-lg shadow-lg hover:bg-pink-900 focus:outline-none focus:ring-4 focus:ring-purple-500 transform hover:scale-105 transition duration-300 ease-in-out">
                    Vraag screening aan
                </button>
            </div>

        </form>
    </div>

    </body>
</x-layout>

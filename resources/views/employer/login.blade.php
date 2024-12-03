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
    <h1>Log in met uw bedrijfsaccount</h1>
    <div class="max-w-4xl mx-auto p-8 bg-white rounded-xl shadow-xl mt-10">
        <h2 class="text-2xl font-semibold text-[#2F4F4F] text-center mb-8">Vul uw inlog gegevens in</h2>

        <form action="{{ route('company.login') }}" method="post">
            @csrf

            <!-- Email -->
            <div class="mb-6">
                <label for="email" class="block text-lg text-[#2F4F4F]">Email</label>
                <input type="email" name="email" id="email" class="mt-1 block w-full border-2 border-gray-300 rounded-lg p-3 focus:border-purple-600 focus:ring-2 focus:ring-purple-500 transition duration-200" />
                @if($errors->has('email'))
                    <div class="text-red-500 mt-1">{{ $errors->first('email') }}</div>
                @endif
            </div>

            <!-- Password -->
            <div class="mb-6">
                <label for="password" class="block text-lg text-[#2F4F4F]">Wachtwoord</label>
                <input type="password" name="password" id="password" class="mt-1 block w-full border-2 border-gray-300 rounded-lg p-3 focus:border-purple-600 focus:ring-2 focus:ring-purple-500 transition duration-200" />
                @if($errors->has('password'))
                    <div class="text-red-500 mt-1">{{ $errors->first('password') }}</div>
                @endif
            </div>
            <div class="flex justify-center">
                <button type="submit" class="bg-purple-600 text-white px-6 py-3 rounded-full shadow-lg hover:bg-purple-700 focus:outline-none focus:ring-4 focus:ring-purple-500 transform hover:scale-105 transition duration-300 ease-in-out">
                    Inloggen
                </button>
            </div>

        </form>
    </div>
    </body>
</x-layout>

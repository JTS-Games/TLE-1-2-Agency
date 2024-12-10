<x-layout title="Account aanmaken">
    <div class="flex items-center justify-center min-h-screen bg-gray-100">
        <form method="POST" action="{{ route('register') }}"
              class="bg-white p-8 border border-gray-300 rounded-lg shadow-lg w-full max-w-md">
            @csrf

            <h1 class="text-2xl font-bold mb-6 text-center">Account aanmaken</h1>

            <div class="mb-4">
                <x-input-label for="name" :value="__('Name')" class="text-sm font-medium text-gray-700"/>
                <x-text-input id="name"
                              class="mt-1 p-2 block w-full shadow-sm border border-gray-300 rounded-md bg-red-50 focus:border-primary-violet"
                              type="text" name="name" :value="old('name')" required autofocus autocomplete="name"/>
                <x-input-error :messages="$errors->get('name')" class="mt-2"/>
            </div>

            <div class="mb-4">
                <x-input-label for="email" :value="__('Email')" class="text-2xl font-medium text-gray-700"/>
                <x-text-input id="email"
                              class="mt-1 p-2 block w-full shadow-sm border border-gray-300 rounded-md bg-white focus:border-primary-violet"
                              type="email" name="email" :value="old('email')" required autocomplete="username"/>
                <x-input-error :messages="$errors->get('email')" class="mt-2"/>
            </div>

            <div class="mb-4">
                <x-input-label for="password" :value="__('Password')" class="text-sm font-medium text-gray-700"/>
                <x-text-input id="password"
                              class="mt-1 p-2 block w-full shadow-sm border border-gray-300 rounded-md bg-white focus:border-primary-violet"
                              type="password" name="password" required autocomplete="new-password"/>
                <x-input-error :messages="$errors->get('password')" class="mt-2"/>
            </div>

            <div class="mb-4">
                <x-input-label for="password_confirmation" :value="__('Confirm Password')"
                               class="text-sm font-medium text-gray-700"/>
                <x-text-input id="password_confirmation"
                              class="mt-1 p-2 block w-full shadow-sm border border-gray-300 rounded-md bg-white focus:border-primary-violet"
                              type="password" name="password_confirmation" required autocomplete="new-password"/>
                <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2"/>
            </div>

            <div class="flex items-center justify-between mt-6">
                <a class="text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 underline"
                   href="{{ route('login') }}">
                    {{ __('Already registered?') }}
                </a>

                <x-primary-button
                    class="py-2 px-4 bg-primary-violet text-white rounded-md hover:bg-primary-yellow transition duration-200">
                    {{ __('Register') }}
                </x-primary-button>
            </div>
        </form>
    </div>
</x-layout>

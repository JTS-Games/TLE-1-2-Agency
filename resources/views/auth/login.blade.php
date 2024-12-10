<x-layout title="Log in">
    <div class="flex items-center justify-center min-h-screen bg-gray-100">
        <form method="POST" action="{{ route('login') }}"
              class="bg-white p-8 border border-gray-300 rounded-lg shadow-lg w-full max-w-md">
            @csrf

            <h1 class="text-2xl font-bold mb-6 text-center">Log in</h1>

            <!-- Session Status -->
            <x-auth-session-status class="mb-4" :status="session('status')"/>

            <!-- Email Address -->
            <div class="mb-4">
                <x-input-label for="email" :value="__('Email')" class="text-sm font-medium text-gray-700"/>
                <x-text-input id="email"
                              class="mt-1 p-2 block w-full shadow-sm border border-gray-300 rounded-md bg-white focus:border-primary-violet"
                              type="email" name="email" :value="old('email')" required autofocus
                              autocomplete="username"/>
                <x-input-error :messages="$errors->get('email')" class="mt-2"/>
            </div>

            <!-- Password -->
            <div class="mb-4">
                <x-input-label for="password" :value="__('Password')" class="text-sm font-medium text-gray-700"/>
                <x-text-input id="password"
                              class="mt-1 p-2 block w-full shadow-sm border border-gray-300 rounded-md bg-white focus:border-primary-violet"
                              type="password" name="password" required autocomplete="current-password"/>
                <x-input-error :messages="$errors->get('password')" class="mt-2"/>
            </div>

            <!-- Remember Me -->
            <div class="block mb-4">
                <label for="remember_me" class="inline-flex items-center">
                    <input id="remember_me" type="checkbox"
                           class="rounded border-gray-300 text-primary-violet shadow-sm focus:ring-primary-violet"
                           name="remember">
                    <span class="ms-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                </label>
            </div>

            <div class="flex items-center justify-between mt-6">
                @if (Route::has('password.request'))
                    <a class="text-sm text-gray-600 hover:text-gray-900 underline"
                       href="{{ route('register') }}">
                        {{ __('Geen account? Registreer') }}
                    </a>
                @endif

                <x-primary-button
                    class="py-2 px-4 bg-primary-violet text-white rounded-md hover:bg-primary-yellow transition duration-200">
                    {{ __('Log in') }}
                </x-primary-button>
            </div>
        </form>
    </div>
</x-layout>

<nav>
    <div class="flex flex-col md:flex-row justify-evenly items-center gap-4">

        <!-- Logo -->
        <a href="{{ route('index') }}">
            <img src="{{ asset('images/openhiring-logo.png') }}" width="100" height="100" alt="Open Hiring logo">
        </a>

        <!-- Generieke Links -->
        <a href="{{ route('vacancies.index') }}"
           class="bg-primary-violet text-white rounded-full px-6 py-4 text-base hover:bg-primary-yellow hover:text-primary-violet hover:duration-200">
            Alle vacatures
        </a>

        <a href="{{ route('companies.index') }}"
           class="bg-primary-violet text-white rounded-full px-6 py-4 text-base hover:bg-primary-yellow hover:text-primary-violet hover:duration-200">
            Alle bedrijven
        </a>

        <a href="{{ route('inspiration') }}"
           class="bg-primary-violet text-white rounded-full px-6 py-4 text-sm hover:bg-primary-yellow hover:text-primary-violet hover:duration-200">
            Inspiratie
        </a>

        <a href="{{ route('contact') }}"
           class="bg-primary-violet text-white rounded-full px-6 py-4 text-sm hover:bg-primary-yellow hover:text-primary-violet hover:duration-200">
            Contact
        </a>

        @if(auth('web')->check() && Auth::guard('web')->user()->isAdmin())
            <a href="{{ route('screenings.index') }}"
               class="bg-primary-violet text-white rounded-full px-6 py-4 text-sm hover:bg-primary-yellow hover:text-primary-violet hover:duration-200">
                Zie alle screenings
            </a>
        @endif

        <!-- Gebruikerssectie -->
        @if(auth('web')->check() && !Auth::guard('web')->user()->isAdmin())
            <div class="relative group block">
                <a href="{{ route('dashboard') }}"
                   class="bg-primary-violet text-white rounded-full px-6 py-4 text-sm hover:bg-primary-yellow hover:text-primary-violet hover:duration-200">
                    Mijn Profiel
                </a>

                <!-- Logout knop -->
                <div
                    class="absolute hidden group-hover:block right-1 mt-1 w-48 bg-white border border-gray-200 rounded-lg shadow-lg z-50">
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit"
                                class="bg-primary-violet text-white rounded-full px-6 py-4 text-sm hover:bg-primary-yellow hover:text-primary-violet hover:duration-200">
                            Log uit
                        </button>
                    </form>
                </div>
            </div>

            <!-- Bedrijfsectie -->
        @elseif(Auth::guard('company')->check())
            <div class="flex flex-col md:flex-row justify-evenly items-center">
                <a href="{{ route('login') }}"
                   class="bg-primary-violet text-white rounded-full rounded-r-none px-6 py-4 text-sm transition-all ease-in-out hover:scale-110">
                    Log In als Gebruiker
                </a>
                <a href="{{ route('company.dashboard') }}"
                   class="bg-primary-yellow text-primary-violet rounded-full rounded-l-none px-6 py-4 text-sm transition-all ease-in-out hover:scale-110">
                    Werkgevers Profiel
                </a>
            </div>

            <!-- Adminsectie -->
        @elseif(Auth::guard('web')->check() && Auth::guard('web')->user()->isAdmin())
            <!-- Extra functie voor Admin -->
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit"
                        class="bg-primary-violet text-white rounded-full px-6 py-4 text-sm hover:bg-primary-yellow hover:text-primary-violet hover:duration-200">
                    Log uit
                </button>
            </form>

            <!-- Ongeautoriseerde gebruiker -->
        @else
            <div class="flex flex-col md:flex-row justify-evenly items-center">
                <a href="{{ route('login') }}"
                   class="bg-primary-violet text-white rounded-full rounded-r-none px-6 py-4 text-sm transition-all ease-in-out hover:scale-110">
                    Log In als Gebruiker
                </a>
                <a href="{{ route('company.login.form') }}"
                   class="bg-primary-yellow text-primary-violet rounded-full rounded-l-none px-6 py-4 text-sm transition-all ease-in-out hover:scale-110">
                    Log In als Bedrijf
                </a>
            </div>
        @endif
    </div>
</nav>

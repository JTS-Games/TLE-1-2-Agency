<nav>
    <div class="flex flex-row justify-evenly items-center">
        <a href="{{route('vacancies.index')}}"
           class="bg-primary-violet text-white rounded-full px-6 py-2 text-base hover:bg-primary-yellow hover:text-primary-violet hover:duration-200">
            Alle vacatures
        </a>

        <a href="#"
           class="bg-primary-violet text-white rounded-full px-6 py-2 text-sm hover:bg-primary-yellow hover:text-primary-violet hover:duration-200">
            Over Open Hiring
        </a>

        <a href="{{route('index')}}"><img src="{{asset('images/openhiring-logo.png')}}" width="100" height="100"
                                          alt="Open Hiring logo"></a>

        <a href="#"
           class="bg-primary-violet text-white rounded-full px-6 py-2 text-sm hover:bg-primary-yellow hover:text-primary-violet hover:duration-200">
            Inspiratie
        </a>

        <a href="{{route('contact')}}"
           class="bg-primary-violet text-white rounded-full px-6 py-2 text-sm hover:bg-primary-yellow hover:text-primary-violet hover:duration-200">
            Contact
        </a>

        @auth
            @if(auth('web')->check())
                <div class="relative group block">
                    <a href="{{route('dashboard')}}"
                       class="bg-primary-violet text-white rounded-full px-6 py-2 text-sm hover:bg-primary-yellow
            hover:text-primary-violet hover:duration-200">
                        Mijn Profiel
                    </a>
                    <div
                        class="absolute hidden group-hover:block right-1 mt-1 w-48 bg-white border border-gray-200 rounded-lg shadow-lg z-50">
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf

                            <button type="submit"
                                    class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 w-full">
                                Log uit
                            </button>
                        </form>

                    </div>
                </div>
                {{--            @elseif(auth('company')->check())--}}
            @elseif(Auth::guard('company')->user())
                <a href="{{route('company.dashboard')}}"
                   class="bg-primary-violet text-white rounded-full px-6 py-2 text-sm hover:bg-primary-yellow
            hover:text-primary-violet hover:duration-200">
                    Werkgevers Profiel
                </a>
            @endif
        @endauth

        @guest
            <div class="relative group block">
                <a href="#"
                   class="bg-primary-violet text-white rounded-full px-6 py-2 text-lg hover:bg-primary-yellow hover:text-primary-violet   duration-500 hover:duration-200">
                    Inloggen
                </a>

                <div
                    class="absolute hidden group-hover:block right-1 mt-1 w-48 bg-white border border-gray-200 rounded-lg shadow-lg z-50">
                    <a href="{{ route('login') }}"
                       class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                        Log In als Gebruiker
                    </a>
                    <a href="{{ route('company.login.form') }}"
                       class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                        Log In als Bedrijf
                    </a>
                </div>
            </div>
        @endguest
    </div>
</nav>

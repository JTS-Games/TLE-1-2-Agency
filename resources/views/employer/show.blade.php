{{--<x-layout title="{{$company->name}}">--}}
{{--    <h1>{{$company->name}}</h1>--}}
{{--    <div>isAdmin: {{$isAdmin}}</div>--}}
{{--    <div>isOwner: {{$isOwner}}</div>--}}
{{--    <div>company: {{$company}}</div>--}}
{{--    @if($isAdmin || $isOwner)--}}
{{--        <form action="{{route('companies.destroy', $company->id)}}" method="post">--}}
{{--            @csrf--}}
{{--            @method('delete')--}}
{{--            <input type="submit" value="Verwijder {{$isOwner ? 'mijn' : 'dit'}} bedrijf van Open Hiring">--}}
{{--        </form>--}}
{{--    @endif--}}
{{--    @if($isOwner)--}}
{{--        <a href="{{route('company.edit')}}">Bewerk uw bedrijf</a>--}}
{{--    @endif--}}
{{--    <h2>Vacatures van {{$company->name}}</h2>--}}
{{--    @foreach($company->vacancies as $vacancy)--}}
{{--        <x-vacancy :vacancy="$vacancy" :company="$company"></x-vacancy>--}}
{{--    @endforeach--}}
{{--</x-layout>--}}

<x-layout title="{{ $company->name }}">
    <div class="container mx-auto px-4 py-8">
        <!-- Company Name -->
        <h1 class="text-4xl font-bold text-gray-800 mb-6 text-center">{{ $company->name }}</h1>

        <!-- Company Overview -->
        <div class="bg-white shadow-md rounded-lg p-6 border border-gray-200 mb-6">
            <h2 class="text-2xl font-semibold text-gray-800 mb-4">Bedrijfsinformatie</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <p class="text-gray-600"><span class="font-medium">ID:</span> {{ $company->id }}</p>
                    <p class="text-gray-600"><span class="font-medium">E-mailadres:</span> {{ $company->email }}</p>
                    <p class="text-gray-600"><span class="font-medium">Locatie:</span> {{ $company->location_hq }}</p>
                </div>
                <div>
                    <p class="text-gray-600"><span class="font-medium">Geverifieerd:</span> {{ $company->verified ? 'Ja' : 'Nee' }}</p>
                    <p class="text-gray-600"><span class="font-medium">KvK Uittreksel:</span> {{ $company->coc_extract }}</p>
                    <p class="text-gray-600"><span class="font-medium">Aangemaakt op:</span> {{ $company->created_at->format('d-m-Y H:i:s') }}</p>
                </div>
            </div>
        </div>

        <!-- Company Description -->
        <div class="bg-gray-100 shadow-md rounded-lg p-6 border border-gray-300 mb-6">
            <h2 class="text-2xl font-semibold text-gray-800 mb-4">Beschrijving</h2>
            <p class="text-gray-700">{{ $company->description }}</p>
        </div>

        <!-- Admin/Owner Actions -->
        @if($isAdmin || $isOwner)
            <div class="bg-white shadow-md rounded-lg p-6 border border-gray-200 mb-6">
                <h2 class="text-2xl font-semibold text-gray-800 mb-4">Beheerdersacties</h2>
                <form action="{{ route('companies.destroy', $company->id) }}" method="post" class="mb-4">
                    @csrf
                    @method('delete')
                    <button type="submit" class="bg-red-500 text-white py-2 px-4 rounded hover:bg-red-600 transition">
                        Verwijder {{ $isOwner ? 'mijn' : 'dit' }} bedrijf van Open Hiring
                    </button>
                </form>
                @if($isOwner)
                    <a href="{{ route('company.edit') }}" class="text-blue-600 hover:underline">
                        Bewerk uw bedrijf
                    </a>
                @endif
            </div>
        @endif

        <!-- Vacancies Section -->
        @if($company->vacancies->isNotEmpty())
            <div class="bg-white shadow-md rounded-lg p-6 border border-gray-200">
                <h2 class="text-2xl font-semibold text-gray-800 mb-4">Vacatures</h2>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                    @foreach($company->vacancies as $vacancy)
                        <x-vacancy :vacancy="$vacancy" :company="$company" class="shadow-lg rounded-lg bg-gray-50 p-4 border hover:shadow-xl transition-shadow duration-200" />
                    @endforeach
                </div>
            </div>
        @else
            <div class="text-center text-gray-600 mt-6">
                Er zijn nog geen vacatures voor dit bedrijf.
            </div>
        @endif
    </div>
</x-layout>

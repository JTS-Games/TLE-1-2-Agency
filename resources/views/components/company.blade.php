{{--<article>--}}
{{--    <h2>{{$company->name}}</h2>--}}
{{--    <div>Locatie: {{$company->location_hq}}</div>--}}
{{--    <div>Aantal vacatures: {{count($company->vacancies)}}</div>--}}
{{--    <a href="{{route('companies.show', $company->id)}}">Bekijk bebrijf</a>--}}
{{--</article>--}}

<article {{ $attributes->merge(['class' => 'bg-white shadow-md rounded-lg p-4 border border-gray-200 hover:shadow-lg transition-shadow duration-200']) }}>
    <h2 class="text-xl font-semibold text-gray-800 mb-2">{{ $company->name }}</h2>
    <div class="text-gray-600 mb-1">
        <span class="font-medium">Locatie:</span> {{ $company->location_hq }}
    </div>
    <div class="text-gray-600 mb-3">
        <span class="font-medium">Aantal vacatures:</span> {{ count($company->vacancies) }}
    </div>
    <a href="{{ route('companies.show', $company->id) }}" class="text-blue-600 hover:underline">
        Bekijk bedrijf
    </a>
</article>

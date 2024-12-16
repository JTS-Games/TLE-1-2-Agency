{{--<x-layout title="Onze bedrijven">--}}
{{--    @foreach($companies as $company)--}}
{{--        <x-company :company="$company"/>--}}
{{--    @endforeach--}}
{{--    @if(count($companies) === 0)--}}
{{--        <div>Er zijn nog geen bedrijven bij ons geregistreerd.</div>--}}
{{--    @endif--}}
{{--</x-layout>--}}

<x-layout title="Onze bedrijven">
    <div class="container mx-auto px-4 py-8">
        <h1 class="text-3xl font-bold text-center text-gray-800 mb-6">Onze Bedrijven</h1>

        @if(count($companies) > 0)
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
                @foreach($companies as $company)
                    <x-company :company="$company" class="shadow-lg rounded-lg border border-gray-200 p-4 bg-white hover:shadow-xl transition-shadow duration-200"/>
                @endforeach
            </div>
        @else
            <div class="text-center text-gray-600 mt-8">
                Er zijn nog geen bedrijven bij ons geregistreerd.
            </div>
        @endif
    </div>
</x-layout>

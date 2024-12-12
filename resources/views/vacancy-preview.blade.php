{{--<x-layout>--}}
{{--    <x-slot name="title">Vacature Preview</x-slot>--}}
{{--    <div class="bg-[rgb(251,252,247)] min-h-screen flex items-center justify-center py-12 px-4">--}}
{{--        <div class="bg-white p-8 rounded-lg shadow-md w-full max-w-4xl">--}}
{{--            <h1 class="text-[rgb(170,1,96)] font-bold text-3xl mb-8 font-radikal-bold text-center">--}}
{{--                {{ $data['job_title'] }}--}}
{{--            </h1>--}}
{{--            <p><strong>Omschrijving:</strong> {{ $data['description'] }}</p>--}}
{{--            <p><strong>Locatie:</strong> {{ $data['location'] }}</p>--}}
{{--            <p><strong>Loon:</strong> {{ $data['paycheck'] ?? 'Niet opgegeven' }}</p>--}}
{{--            <p><strong>Werkuren:</strong> {{ $data['working_hours'] ?? 'Niet opgegeven' }}</p>--}}
{{--            <p><strong>Dienstverband:</strong> {{ $data['contract_term'] ?? 'Niet opgegeven' }}</p>--}}

{{--            <div class="mt-6 flex justify-center space-x-4">--}}
{{--                <a href="{{ url()->previous() }}" class="px-6 py-2 bg-gray-400 text-white rounded-lg">Terug</a>--}}
{{--                <form action="{{ route('vacancies.store') }}" method="post">--}}
{{--                    @csrf--}}
{{--                    <input type="hidden" name="job_title" value="{{ $data['job_title'] }}">--}}
{{--                    <input type="hidden" name="description" value="{{ $data['description'] }}">--}}
{{--                    <input type="hidden" name="location" value="{{ $data['location'] }}">--}}
{{--                    <input type="hidden" name="paycheck" value="{{ $data['paycheck'] }}">--}}
{{--                    <input type="hidden" name="working_hours" value="{{ $data['working_hours'] }}">--}}
{{--                    <input type="hidden" name="contract_term" value="{{ $data['contract_term'] }}">--}}
{{--                    <button type="submit" class="px-6 py-2 bg-blue-500 text-white rounded-lg">Maak Vacature</button>--}}
{{--                </form>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--</x-layout>--}}
<x-layout>
    <h1>Test</h1>
</x-layout>

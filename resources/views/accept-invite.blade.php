<x-layout title="Accepteer de Uitnodiging voor de Vacature">

    <div class="flex justify-center items-center min-h-screen bg-gray-100 py-10">
        <div class="bg-white p-10 border border-gray-300 rounded-lg shadow-lg mb-10 w-full max-w-2xl">

            <h2 class="text-2xl font-bold text-center mb-6">Bekijk de vacature voordat je de uitnodiging accepteert</h2>

            <div class="mb-4">
                <p class="text-lg text-gray-700"><b>Titel:</b> <strong>{{ $vacancy->job_title }}</strong></p>
            </div>

            <div class="mb-4">
                <p class="text-lg text-gray-700"><b>Beschrijving:</b> <strong>{{ $vacancy->description }}</strong></p>
            </div>

            <div class="mb-4">
                <p class="text-lg text-gray-700"><b>Locatie:</b> <strong>{{ $vacancy->location }}</strong></p>
            </div>

            <div class="mb-4">
                <p class="text-lg text-gray-700"><b>Salaris:</b> <strong>€{{ $vacancy->paycheck }}</strong></p>
            </div>

            <div class="mb-6">
                <p class="text-lg text-gray-700"><b>Werktijden:</b> <strong>{{ $vacancy->working_hours }} Uur per week</strong></p>
            </div>

            <h3 class="text-lg font-semibold text-gray-800 mb-2"><b>Vereisten:</b></h3>
            <ul class="list-disc list-inside text-gray-700 mb-6">
                @foreach($vacancy->qualifications as $qualification)
                    <li>{{ $qualification->name }}</li>
                @endforeach
            </ul>



            <form action="{{ route('appointment.accept', $appointment->id) }}" method="POST">
                @csrf
                <label for="date" class="block text-lg font-medium text-gray-700 mb-2">Selecteer een datum wanneer je kan starten</label>
                <input type="datetime-local" name="date" id="date"
                       class="w-full py-3 px-4 border border-gray-300 rounded-md shadow-sm text-gray-700 focus:ring-primary-violet focus:border-primary-violet">

                <button type="submit"
                        class="w-full py-3 px-4 border border-transparent rounded-md shadow-sm text-lg font-medium text-white bg-primary-violet hover:bg-primary-yellow transition duration-200 hover:text-primary-violet">
                    Accepteer uitnodiging
                </button>
            </form>

            <form action="{{ route('appointment.destroy', $appointment->id) }}" method="POST" class="mt-4">
                @csrf
                @method('DELETE')
                <button type="submit"
                        class="w-full py-3 px-4 border border-red-500 rounded-md shadow-sm text-lg font-medium text-white bg-red-500 hover:bg-white hover:text-red-500 hover:border-red-500 transition duration-200">
                    Weiger uitnodiging
                </button>
            </form>

        </div>
    </div>
</x-layout>

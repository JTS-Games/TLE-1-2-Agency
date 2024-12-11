<x-layout>
    <x-slot name="title">Nieuwe Vacature Maken</x-slot>

    <div class="bg-[rgb(251,252,247)] min-h-screen flex items-center justify-center py-12 px-4">
        <div class="bg-[rgb(226,236,200)] p-8 rounded-lg shadow-md w-full max-w-4xl">

            <h1 class="text-[rgb(170,1,96)] font-bold text-3xl mb-8 font-radikal-bold text-center">Nieuwe Vacature Maken</h1>

            <form action="{{ route('vacancies.store') }}" method="post" enctype="multipart/form-data" class="space-y-6">
                @csrf

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                    <div>
                        <label for="image" class="block font-radikal text-[rgb(49,61,41)]">Afbeelding:</label>
                        <input type="file" id="image" name="image" class="mt-1 block w-full border border-black rounded-lg p-2">
                    </div>


                    <div>
                        <label for="job_title" class="block font-radikal text-[rgb(49,61,41)]">Functie:</label>
                        <input type="text" id="job_title" name="job_title" placeholder="Vul functie in" class="mt-1 block w-full border border-black rounded-lg p-2">
                    </div>


                    <div>
                        <label for="description" class="block font-radikal text-[rgb(49,61,41)]">Functie omschrijving:</label>
                        <textarea id="description" name="description" rows="3" placeholder="Voeg hier extra informatie toe" class="mt-1 block w-full border border-black rounded-lg p-2"></textarea>
                    </div>


                    <div>
                        <label for="location" class="block font-radikal text-[rgb(49,61,41)]">Locatie:</label>
                        <input type="text" id="location" name="location" placeholder="Voer de locatie in" class="mt-1 block w-full border border-black rounded-lg p-2">
                    </div>


                    <div>
                        <label for="company_id" class="block font-radikal text-[rgb(49,61,41)]">Bedrijf:</label>
                        <select id="company_id" name="company_id" class="mt-1 block w-full border border-black rounded-lg p-2">
                            <option value="">Selecteer een bedrijf</option>
                            @foreach($companies as $company)
                                <option value="{{ $company->id }}" {{ old('company_id') == $company->id ? 'selected' : '' }}>
                                    {{ $company->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>


                    <div>
                        <label for="paycheck" class="block font-radikal text-[rgb(49,61,41)]">Loon:</label>
                        <input type="text" id="paycheck" name="paycheck" placeholder="Voer loon in" class="mt-1 block w-full border border-black rounded-lg p-2">
                    </div>


                    <div>
                        <label for="competence" class="block font-radikal text-[rgb(49,61,41)]">Bevoegdheid:</label>
                        <input type="text" id="competence" name="competence" placeholder="Voeg enige bevoegdheden" class="mt-1 block w-full border border-black rounded-lg p-2">
                    </div>


                    <div>
                        <label for="working_hours" class="block font-radikal text-[rgb(49,61,41)]">Werkuren:</label>
                        <input type="text" id="working_hours" name="working_hours" placeholder="Voer werkuren in" class="mt-1 block w-full border border-black rounded-lg p-2">
                    </div>


                    <div>
                        <label for="contract_term" class="block font-radikal text-[rgb(49,61,41)]">Dienstverband:</label>
                        <input type="text" id="contract_term" name="contract_term" placeholder="Voer dienstverband in" class="mt-1 block w-full border border-black rounded-lg p-2">
                    </div>
                </div>


                <div class="flex justify-center">
                    <button type="submit" class="px-6 py-2 rounded-lg border-2" style="background-color: #AA0160; color: white;">
                        Maak Vacature
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-layout>

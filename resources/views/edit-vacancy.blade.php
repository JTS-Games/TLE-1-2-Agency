<x-layout title="{{ $vacancy->job_title }}">
    <div class="max-w-2xl mx-auto bg-basic-cream p-6 rounded-md shadow-md">
        <form action="{{ route('vacancies.update', $vacancy) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="mb-4">
                <label for="job_title" class="block text-sm font-medium text-moss_dark">Functie Titel:</label>
                <input type="text" id="job_title" name="job_title" value="{{ $vacancy->job_title }}"
                       class="mt-1 block w-full px-3 py-2 border border-others-stroke_thin rounded-md shadow-sm focus:ring-primary-violet focus:border-primary-violet_dark font-sans">
            </div>
            @error('job_title')
            {{$message}}
            @enderror

            <div class="mb-4">
                <label for="description" class="block text-sm font-medium text-moss_dark">Functie omschrijving:</label>
                <textarea id="description" name="description" rows="4"
                          class="mt-1 block w-full px-3 py-2 border border-others-stroke_thin rounded-md shadow-sm focus:ring-primary-violet focus:border-primary-violet_dark font-sans">{{ $vacancy->description }}</textarea>
            </div>
            @error('description')
            {{$message}}
            @enderror
            <div class="mb-4">
                <label for="paycheck" class="block text-sm font-medium text-moss_dark">Salaris:</label>
                <input type="number" id="paycheck" name="paycheck" value="{{$vacancy->paycheck }}"
                       class="mt-1 block w-full px-3 py-2 border border-others-stroke_thin rounded-md shadow-sm focus:ring-primary-violet focus:border-primary-violet_dark font-sans">
            </div>
            @error('paycheck')
            {{$message}}
            @enderror

            <div class="mb-4">
                <label for="contract_term" class="block text-sm font-medium text-moss_dark">Contract termijn
                    (maanden):</label>
                <input type="number" id="contract_term" name="contract_term" value="{{ $vacancy->contract_term }}"
                       class="mt-1 block w-full px-3 py-2 border border-others-stroke_thin rounded-md shadow-sm focus:ring-primary-violet focus:border-primary-violet_dark font-sans">
            </div>
            @error('contract_term')
            {{$message}}
            @enderror
            <div class="mb-4">
                <label for="location" class="block text-sm font-medium text-moss_dark">Locatie:</label>
                <input type="text" id="location" name="location" value="{{ $vacancy->location }}"
                       class="mt-1 block w-full px-3 py-2 border border-others-stroke_thin rounded-md shadow-sm focus:ring-primary-violet focus:border-primary-violet_dark font-sans">
            </div>
            @error('location')
            {{$message}}
            @enderror
            <div class="mb-4">
                <label for="working_hours" class="block text-sm font-medium text-moss_dark">Working Hours:</label>
                <input type="number" id="working_hours" name="working_hours" value="{{ $vacancy->working_hours }}"
                       class="mt-1 block w-full px-3 py-2 border border-others-stroke_thin rounded-md shadow-sm focus:ring-primary-violet focus:border-primary-violet_dark font-sans">
            </div>
            @error('working_hours')
            {{$message}}
            @enderror
            <div class="mb-4">
                <label for="image" class="block text-sm font-medium text-moss_dark">Afbeelding:</label>
                <input type="file" id="image" name="image"
                       class="mt-1 block w-full text-moss_dark px-3 py-2 border border-others-stroke_thin rounded-md shadow-sm focus:ring-primary-violet focus:border-primary-violet_dark font-sans">
            </div>


            {{--   De company id is not really of use right now , maybe it can be deleted         --}}
            {{--            <div class="mb-4">--}}
            {{--                <label for="company_id" class="block text-sm font-medium text-moss_dark">bedrijf:</label>--}}
            {{--                <select id="company_id" name="companies[]"--}}
            {{--                        class="mt-1 block w-full px-3 py-2 border border-others-stroke_thin rounded-md shadow-sm focus:ring-primary-violet focus:border-primary-violet_dark font-sans">--}}
            {{--                    <option value="">Select a company</option>--}}
            {{--                    @foreach ($companies as $company)--}}
            {{--                        <option--}}
            {{--                            value="{{ $company->id }}">{{ $company->name }}</option>--}}
            {{--                    @endforeach--}}
            {{--                </select>--}}
            {{--            </div>--}}

            <div class="flex justify-end">
                <button type="submit"
                        class="bg-primary-violet text-basic-white px-4 py-2 rounded-md shadow hover:bg-primary-violet_hover font-sans">
                    Opslaan
                </button>
            </div>
        </form>
    </div>
</x-layout>

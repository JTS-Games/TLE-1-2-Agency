<!-- resources/views/employer-vacancies.blade.php -->
<x-layout title="Employer Vacancies">
    <h1>Employer Vacancies</h1>

    @if($allVacancies->isEmpty())
        <p>No vacancies available.</p>
    @else
        <ul>
            @foreach($allVacancies as $vacancy)
        <div>
            <h1>{{$vacancy->job_title}}</h1>
            <h1>{{$vacancy->description}}</h1>
            <h1>{{$vacancy->paycheck}}</h1>
            <h1>{{$vacancy->contract_term}}</h1>
            <h1>{{$vacancy->con}}</h1>
            <form action="{{ route('vacancies.destroy', $vacancy) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this vacancy?');">
                @csrf
                @method('DELETE')  <!-- This is required for sending a DELETE request -->
                <button type="submit" class="btn btn-danger">Delete</button>
            </form>
        </div>
        </ul>
        @endforeach
    @endif
</x-layout>

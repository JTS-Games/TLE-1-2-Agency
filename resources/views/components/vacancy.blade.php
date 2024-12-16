<article>
    <h2>{{$vacancy->job_title}}</h2>
    <div>Bedrijf: <a href="{{route('companies.show', $company)}}">{{$company->name}}</a></div>
    <div>Salaris: {{$vacancy->paycheck}}</div>
    <a href="{{route('vacancies.show', $vacancy->id)}}">Bekijk Vacature</a>
</article>

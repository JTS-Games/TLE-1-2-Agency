<x-layout title="Regristatie Vacature">
    <h1>Bevestiging van je aanmelding</h1>
    <p>Beste {{ auth()->user()->name }},</p>
    <p>Bedankt voor je aanmelding voor de volgende vacature:</p>
    <ul>
        <li><b>Titel:</b> {{ $vacancy->job_title }}</li>
        <li><b>Locatie:</b> {{ $vacancy->location }}</li>
        <li><b>Salaris:</b> €{{ $vacancy->paycheck }}</li>
        <li><b>Werktijden:</b> {{ $vacancy->working_hours }} uur per week</li>
    </ul>
    <p>We nemen binnenkort contact met je op.</p>
    <p>Met vriendelijke groet,</p>
    <p>Het Open Hiring Team</p>
</x-layout>


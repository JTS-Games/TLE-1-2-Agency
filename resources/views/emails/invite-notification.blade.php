<x-layout title="Regristatie Vacature">
    <h1>Bevestiging van je aanmelding</h1>
    <p>Beste {{ $name }},</p>
    <p>{{ $appointment->description }}</p>
    <ul>
        <li><b>Titel:</b> {{ $vacancy->job_title }}</li>
        <li><b>Locatie:</b> {{ $vacancy->location }}</li>
        <li><b>Salaris:</b> €{{ $vacancy->paycheck }}</li>
        <li><b>Werktijden:</b> {{ $vacancy->working_hours }} uur per week</li>
    </ul>
    <p><a href="{{ $acceptInviteUrl }}">Klik hier om de uitnodiging the accepteren</a></p>
    <p>Met vriendelijke groet,</p>
    <p>Het Open Hiring Team</p>
</x-layout>


<?php
?>
    <!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Create Vacancy</title>
</head>
<body>
<form action="{{route('vacancies.store')}}" method="post" enctype="multipart/form-data">
    @csrf
<label for="image">Afbeelding</label>
<input type="file" id="image" name="image">
<label for="job_title">Functie:</label>
<input type="text" id="job_title" name="job_title">
<label for="description">Omschrijving:</label>
<input type="text" id="description" name="description">
<label for="location">Locatie:</label>
<input type="text" id="location" name="location">

<label for="paycheck">Loon:</label>
<input type="text" id="paycheck" name="paycheck">
<label for="competence">Bevoegdheid:</label>
<input type="text" id="competence" name="competence">
<label for="working_hours">Werkuren:</label>
<input type="text" id="working_hours" name="working_hours">
<label for="contract_term">Dienstverband:</label>
<input type="text" id="contract_term" name="contract_term">
    <label for="company_id">Bedrijf:</label>
    <select id="company_id" name="company_id">
        <option value="">Selecteer een bedrijf</option>
        @foreach($companies as $company)
            <option value="{{ $company->id }}" {{ old('company_id') == $company->id ? 'selected' : '' }}>
                {{ $company->name }}
            </option>
        @endforeach
    </select>


    <button type="submit">Maak Vacature</button>

</form>
</body>
</html>

<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Game Dashboard</title>


</head>
<x-layout title="index">
    <div>
        <h1 class="size-9 text-center">Hoe jouw verhaal verschil maakt </h1>
       <section class="flex-w30">
           <img class="object-contain h-48 w-96" src="{{asset('images/openhiring-logo.png')}}">
           <div>
               <H1>"Zonder sollicitatiegesprek is het makkelijker om aan het werk te gaan. Het is leuk, iedereen is aardig. Ik heb het hier naar mijn zin."</H1>
               <h2></h2>
               <h3></h3>
           </div>
       </section>
    </div>
    <div>
           <button>Vind ook een baan</button>
       </section>
        <section class="flex-w30">
            <img class="object-contain h-48 w-96" src="{{asset('images/openhiring-logo.png')}}">
            <div>
                <H1>"Je moet je vooroordelen en aannames kunnen loslaten, maar dan zul ja vaak verrast worden door de kwaliteit en de persoon zelf."</H1>
                <h2></h2>
                <h3></h3>
            </div>
            <button>Een baan plaatsen</button>
        </section>
        <h1>Werkgevers die openstaan voor iedereen</h1>
        <section>
            <div>
                <h2>bedrijf 1</h2>
                <h3>positie - locatie</h3>
                <button>Lees Meer</button>
            </div>
        </section>
        <section>
            <div>
                <h2>bedrijf 2</h2>
                <h3>positie - locatie</h3>
                <button>Lees Meer</button>
            </div>
        </section>
        <section>
            <div>
                <h2>bedrijf 3</h2>
                <h3>positie - locatie</h3>
                <button>Lees Meer</button>
            </div>
        </section>
    </div>
    <button>Alle werkgevers bekijken</button>
</x-layout>

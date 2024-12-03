<x-layout title="Contact">
    <div class="container mx-auto px-4 py-16 fam">
        <h1 class="text-4xl font-bold text-gray-800 mb-4">Contact Ons</h1>
        <p class="text-gray-600 mb-8">Ga je starten met Open Hiring, ben je al begonnen of heb je een heel andere
            vraag?
            We
            helpen je graag verder. Hier vind je onze contactgegevens.</p>


        <div class="flex flex-col md:flex-row mb-8">
            <div class="w-full md:w-1/2">
                <h2 class="text-2xl font-bold text-gray-800 mb-2">Contactgegevens</h2>
                <ul class="list-none text-gray-600">
                    <li><a href="tel:+310857603967" class="hover:underline">+31 (0)85 760 39 67</a></li>
                    <li><a href="mailto:info@openhiring.nl" class="hover:underline">info@openhiring.nl</a></li>
                </ul>
            </div>

            <div class="w-full md:w-1/2 md:ml-8">
                <h2 class="text-2xl font-bold text-gray-800 mb-2">Bezoekgegevens</h2>
                <ul class="list-none text-gray-600">
                    <li>Klokgebouw 188, 7e etage</li>
                    <li>5617 AB, Eindhoven</li>
                </ul>
            </div>

        </div>


        <div class="w- full">

            <h2 class="text-2xl font-bold text-gray-800 mb-2">Stuur ons een bericht</h2>

            <form action="#" method="POST" class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">

                <div class="mb-4">

                    <label class="block text-gray-700 text-sm font-bold mb-2" for="name">Naam</label>

                    <input type="text" id="name" name="name" required
                           class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                           placeholder="Je naam">

                </div>

                <div class="mb-4">

                    <label class="block text-gray-700 text-sm font-bold mb-2" for="email">E-mail</label>

                    <input type="email" id="email" name="email" required
                           class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                           placeholder="Je e-mail">

                </div>

                <div class="mb-6">

                    <label class="block text-gray-700 text-sm font-bold mb-2" for="message">Bericht</label>

                    <textarea id="message" name="message" required
                              class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                              rows="4" placeholder="Je bericht"></textarea>

                </div>

                <div class="flex items-center justify-between">

                    <button type="submit"
                            class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                        Verstuur
                    </button>

                </div>

            </form>

        </div>

    </div>
</x-layout>

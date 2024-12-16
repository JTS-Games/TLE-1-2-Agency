<x-layout title="Contact">
    <div class="container mx-auto px-4 py-16 space-y-12">
        <!-- Header Section -->
        <div class="text-center">
            <h1 class="text-4xl font-extrabold text-gray-800 mb-4">Contact Ons</h1>
            <p class="text-lg text-gray-600 leading-relaxed">
                Ga je starten met Open Hiring, ben je al begonnen of heb je een totaal andere vraag?
                We helpen je graag verder. Hier vind je onze contactgegevens.
                <br> Wij als Open Hiring gaan niet over pending vacatures. Je kan hier alleen terecht
                als je hulp nodig hebt op het platform of bij klachten.
            </p>
        </div>

        <!-- Contact Information Section -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8 text-center">
            <div>
                <h2 class="text-2xl font-semibold text-gray-800 mb-4">Contactgegevens</h2>
                <ul class="text-gray-600 space-y-2">
                    <li><a href="tel:+310857603967" class="hover:underline text-blue-600">+31 (0)85 760 39 67</a></li>
                    <li><a href="mailto:info@openhiring.nl" class="hover:underline text-blue-600">info@openhiring.nl</a></li>
                </ul>
            </div>

            <div>
                <h2 class="text-2xl font-semibold text-gray-800 mb-4">Locatie</h2>
                <ul class="text-gray-600 space-y-2">
                    <li>Klokgebouw 188, 7e etage</li>
                    <li>5617 AB, Eindhoven</li>
                </ul>
            </div>
        </div>

        <!-- Contact Form Section -->
        <div>
            <h2 class="text-2xl font-semibold text-gray-800 mb-6">Stuur ons een bericht</h2>
            <form action="#" method="POST" class="bg-white shadow-lg rounded-lg px-8 pt-6 pb-8">
                <!-- Name Field -->
                <div class="mb-6">
                    <label for="name" class="block text-sm font-medium text-gray-700 mb-2">Naam</label>
                    <input type="text" id="name" name="name" required
                           class="shadow-sm border rounded-lg w-full py-3 px-4 text-gray-700 focus:ring focus:ring-blue-200 focus:outline-none focus:ring-opacity-50"
                           placeholder="Je naam">
                </div>

                <!-- Email Field -->
                <div class="mb-6">
                    <label for="email" class="block text-sm font-medium text-gray-700 mb-2">E-mail</label>
                    <input type="email" id="email" name="email" required
                           class="shadow-sm border rounded-lg w-full py-3 px-4 text-gray-700 focus:ring focus:ring-blue-200 focus:outline-none focus:ring-opacity-50"
                           placeholder="Je e-mail">
                </div>

                <!-- Message Field -->
                <div class="mb-6">
                    <label for="message" class="block text-sm font-medium text-gray-700 mb-2">Bericht</label>
                    <textarea id="message" name="message" required
                              class="shadow-sm border rounded-lg w-full py-3 px-4 text-gray-700 focus:ring focus:ring-blue-200 focus:outline-none focus:ring-opacity-50"
                              rows="4" placeholder="Je bericht"></textarea>
                </div>

                <!-- Submit Button -->
                <div class="flex justify-center">
                    <button type="submit"
                            class="inline-block w-1/2 bg-primary-yellow text-primary-violet font-semibold py-3 px-6 rounded-md hover:bg-primary-violet transition hover:text-white duration-200">
                        Verstuur
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-layout>

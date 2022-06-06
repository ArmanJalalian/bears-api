<h1> Bear API </h1>

Aan de hand van het laravel framework heb ik ervoor gezorgd dat alle beren in Nederland opgejaagd kunnen worden door
alle developers van Nederland.

Natuurlijk is het ook mogelijk om nieuwe beren toe te voegen als je deze in het wild tegenkomt:

Om bij de data te kunnen komen is het handig om je eerste even te registreren met je naam, emailadres en natuurlijk een wachtwoord. Na het registreren of inloggen krijg je een authentication token die je mee kan geven aan je requests. Alleen met een authentication code is het mogelijk om de locaties van verschillende beren te kunnen zien. We willen natuurlijk niet dat iedereen op de beren kan jagen...

Wil je alle beren zien navigeer naar: /bears/
Deze route kan ook gebruikt worden om aan de hand van een post nieuwe beren toe te voegen

Wil je alleen beren binnen 25 km van een bepaalde locatie zien gebruik dan: /bears/{latitude}/{longitude}. Geef je eigen coördinaten mee als parameters en je kan zo snel mogelijk weer verder met je jacht.

Dit is versie 1 van de bears api en alles is opgesplit zodat er makkelijk een tweede versie gemaakt kan worden zonder dat de eerste versie hier last van heeft! Het is daarvoor wel nodig om voor iedere route api\v1 te zetten!

Route lijst:

Get /bears
Get /bears/{latitude}/{longitude}
Post /bears

Get /bear/{id}
Put /bear/{id}
Delete /bear/{id}

TODO:

- Validation op de meeste invulbare fields moet nog toegevoegd worden, wat erg belangrijk is.
- Juiste RESTfull http error codes gebruiken.
- 
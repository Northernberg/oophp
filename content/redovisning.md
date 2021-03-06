---
---
Redovisning
=========================



Kmom01
-------------------------
Hur känns det att hoppa rakt in i objekt och klasser med PHP, gick det bra och kan du relatera till andra objektorienterade språk?
Jag tyckte att det kändes bra att komma igång med objektorienterad PHP.
Vi har tidigare arbetat med objektorienterad Python, vilket gav ett bra första intryck på programmeringsstilen.
Själva strukturen med klasser och objekt är detsamma, skillnaden är mest hur man uttrycker det i PHP.
Det kändes dessutom mer strukturerat i PHP då det finns mer regler och liknande.
Jag tyckte om programmeringsstilen i oopython så jag tror jag kommer nog trivas med oophp också.

Berätta hur det gick det att utföra uppgiften “Gissa numret” med GET, POST och SESSION?
Det gick bra att skapa grunden för spelet med hjälp av formulär som vi arbetat mycket med.
Klassen var ganska straight-forward då endast returnerar vissa värden som är satta i det pågående spelet.
Sedan gick det att lösa vissa saker på många olika sätt, såsom hur man inte kunde fortsätta gissa efter sista gissningen.
Jag löste det med en villkorssats som satte knappen som "disabled" efter sista gissningen.
När man hade löst spelet i GET så var POST ganska liknande men SESSION var lite svårare.
SESSION krävde att man skrev om lite mer och det krånglade lite när jag försökte nollställa spelet och förstöra sessionen.

Har du några inledande reflektioner kring me-sidan och dess struktur?
Strukturen känns igen från tidigare kurs med Anax ramverket.
Det är en mer omfattande mappstruktur och känns lite svårt att komma igång igen och hitta allting.
Men samtidigt känns det väldigt skönt att göra sidorna med markdown filer och t.ex enkelt använda sig utav "figure" för importering av bilder.

Vilken är din TIL för detta kmom?
TIL att förstöra en session och skapa en ny i samma sekvens inte är så enkelt som man kan tro.



Kmom02
-------------------------

Hur gick det att överföra spelet “Gissa mitt nummer” in i din me-sida?
-Det gick väldigt bra att implementera alla versioner i htdocs som startar utanför ramverket.
Sedan var GET versionen enkel att implementera all funktionalitet i routen.
Det svåra var att få POST och SESSION att fungera med nollställning av spelet.
Jag hade blandat ihop värden så att det var fel värden som visades för "tries" och "number".
Det var även svårt att nollställa SESSION och uppdatera sidan med header().
Jag hade först att jag förstörde SESSIONEN men löste det istället med att återställa den SESSIONEN som var igång.

Berätta om din syn på modellering likt UML jämfört med verktyg som phpDocumentor. Fördelar, nackdelar, användningsområde? Vad tycker du om konceptet make doc?
-Jag tycker först att UML är mer fritt och du har mer frihet att välja hur du ska strukturera diagrammet.
PhpDocumentor var enkel att använda då det endast är två kommandon, och justeringar i config filen.
Sedan är det självklart viktigt att du gjort rätt med docblock kommentarerna då de utgår från dessa.
Det verkar ganska effektivt att få en grundstruktur av dokumentationen och sen bygga upp och komplettera det som behövs.
Det hjälper dessutom att strukturera koden generellt då du använder dig utav mer detaljerade kommentarblocks.  

Hur känns det att skriva kod utanför och inuti ramverket, ser du fördelar och nackdelar med de olika sätten?
Det känns bra att skriva kod i båda delarna, det svåra kan vara att implementera den ena till den andra.
Utanför ramverket ger fler möjligheter att testa funktionaliteten och felsöka koden.
I ramverket så kan de uppstå problem och koden kan behövas ändringar för att fungera korrekt med ramverkets struktur.
Jag tycker att båda delarna är bra att använda sig utav för att lättare bygga grunden och testa funktionaliteten innan
och sedan göra justeringar.

Vilken är din TIL för detta kmom?
TIL att ha bättre koll på vilka värden som visas i den aktuella routens vy.


Kmom03
-------------------------

Har du tidigare erfarenheter av att skriva kod som testar annan kod?
Jag har arbetat tidigare med enhetstestning av klasser i Python.
Det var väldigt likt sätt att arbeta på, genom att skapa testklasser och köra dessa med assertions.
Det gjorde det dessutom enklare att börja med PHPUnit och förstå snabbare hur systemet fungerade.

Hur ser du på begreppen enhetstestning och att skriva testbar kod?
Jag tycker att enhetstestning kan vara väldigt svårt i vissa fall.
Dessa fall har varit min egen kod som t.ex inte returnerar något och därav blir svår att testa.
Det jag gjorde i DiceGame för de metoder som inte returnerade något, så kopplade jag ihop flertal metoder och
analyserade hur jag skulle kunna testa att den första metoden gör det den ska.
Det bästa skulle vara att ha i åtanke att denna kod kommer testas och därefter göra smarta val
över vad som är nödvändigt och om det du har verkligen är optimerat.

Förklara kort begreppen white/grey/black box testing samt positiva och negativa tester, med dina egna ord.
Positiva tester är något som du förväntar dig att den testade koden kommer returnera eller skapa.
Negativa tester är en test som du förväntar dig ska returnera något negativt, alltså en situation som din kod inte ska kunna göra.
White/grey/black box testing är olika tester som testar diverse sidor av programmet.
Alltså t.ex det interna delarna av programmet om hur det är strukturerat och uppbygt.
Eller utsidan av programmet som visar genom funktionaliteterna som programmet har.

Berätta om hur du löste uppgiften med Tärningsspelet 100, hur du tänkte, planerade och utförde uppgiften samt hur du organiserade din kod?
Jag använde mig först och främst utav tidigare klasserna "Dice" och "Dicehand" för att skapa grunden.
Sedan planerade jag hur spelfunktionaliteten skulle fungera i en klass samt hur "rundorna" skulle fungera i klassprogrammering.
Jag valde att skapa en "CurrentGame" för spelrundorna och "DiceGame" som en superklass där grunderna existerar.
Sedan ärver "Dicegame" funktionalitet från de olika Dice-klasserna samt en "Player" klass och fungerar som den grundläggande klassen.

Hur väl lyckades du testa tärningsspelet 100?
Jag lyckades testa grönt för de flesta klasserna där jag mestadels testar instansen och vissa metoder.
Det svåra var att testa grundklassen "DiceGame" då den mestadels arbetade som en grund och byggde på de andra klasserna.
Jag fick viss kodanvändning där när jag testade andra klasser som hade metoder kopplade till "DiceGame".
I övrigt så gick det ganska bra att göra ett par tester per klass.

Vilken är din TIL för detta kmom?
TIL att inte göra en spel för omfattande, tänk enkelt istället för det kan spara tid!


Kmom04
-------------------------

Vilka är dina tankar och funderingar kring trait och interface?
Jag tycker att det är intressanta koncept för att bättre strukturera modulärt.
Trait var väldigt användbart för att minska koden i klasserna genom att låta traiten importerar vissa metoder samt medlemsvariabler.
Dessutom är det väldigt bra om ett antal klasser har lika metoder så behöver det endast skriva en gång i traiten och importeras.
Interface verkar bra för att skapa regler för klasserna och att beskriva vad klasserna ska innehålla för andra programmerare.

Hur gick det att skapa intelligensen och taktiken till tärningsspelet, hur gjorde du?
Det var svårt att tänka sig hur intelligensen skulle fungera i ett slumpmässigt tärningsspel.
Jag försökte först använda mig utav histogram och göra tester för att se vissa mönster bland tärningskasten.
Det fungerade inte då det alltid var slumpmässigt och att testa det skulle bli ganska komplext.
Tillslut använde jag mig utav spelarnas totalpoäng.
Där jämför jag spelarens totalpoäng mot bottens totalpoäng och dess nuvarande kast.
Därefter gör botten ett nytt kast om skillnaden kommer vara högre än 10 i totalpoäng.


Några reflektioner från att integrera hårdare in i ramverkets klasser och struktur?
Det var ganska mycket ändringar i koden, då jag t.ex hade använd mig utav flertal "isset()" vilket inte fungerade på ramverkets metoder.
Det kändes bättre att använda ramverkets egna struktur för session, get och post då det blev snyggare i koden.
Det såg lite klumpigare ut i koden att använda de globala variablerna för requests och responses.

Berätta hur väl du lyckades med make test inuti ramverket och hur väl du lyckades att testa din kod med enhetstester och vilken kodtäckning du fick.
Jag lyckades testa min kod ganska bra, dock så blev många tester väldigt lika mellan klasserna.
Jag fick grön(över 70%) på alla klasser som jag implementerat i ramverkets dice 100 spel.
De flesta testerna var över rätt och fel typ av return värde men också set metoder för t.ex poängen i spelet.

Vilken är din TIL för detta kmom?
TIL en helt ny struktur för att sortera koden mellan klasser, trait.


Kmom05
-------------------------

Några reflektioner kring koden i övningen för PHP PDO och MySQL?
Jag tyckte det var användbart hur switch case satsen fungerade som en enkel router enligt övningen.
Det skulle nog gå att sortera upp router filen för anax att återanvända vissa variabler över alla routes.
Det var många säkerhets och valideringsåtgärder för uppgiften som var spännande att lära sig för att skapa mer vattentät kod.
I övrigt så hjälpte övningen väldigt mycket att komma igång med CRUD och interagera med databasen genom PHP.

Hur gick det att överföra koden in i ramverket, stötte du på några utmaningar?
Det gick ganska bra när databasen fungerade som den skulle och jag löste en index sida som bekräftade att allt fungerade.
Jag fick dock problem med filerna för config-mappen så att databasen inte fungerade korrekt och det var allting inte var på
plats för att databasen skulle fungera.
Sedan byggde jag upp CRUD efter det och testade mig framåt tillsammans med debugging utskriften som databas konfigurationen skrev ut.
Annars var det ganska straight forward att skriva ut resultatet av databasfrågorna.


Berätta om din slutprodukt för filmdatabasen, gjorde du endast basfunktionaliteten eller lade du till extra features och hur tänkte du till kring användarvänligheten och din kodstruktur?
Min slutprodukt blev en multisida som oftast redirecta tillbaka till index sidan för att visa resultat över filmerna.
Jag gjorde endast basfunktionaliteten i brist av tid men tycker att det fungerar ganska bra ändå.
Jag gjorde en länk för sökfunktionen och en länk för att uppdatera filmer.
I "uppdatera" så kan du både uppdatera, skapa och radera filmer i samma vy för att förenkla och inte ha för många länkar på index sidan.

Vilken är din TIL för detta kmom?
TIL att förenkla CRUD genom att bygga ihop flertal funktionaliteter till en i en vy.



Kmom06
-------------------------

Hur gick det att jobba med klassen för filtrering och formatting av texten?
Jag tycker det gick bra att arbeta med klassen för textfiltreringen.
Jag följde exemplen i artikeln för varje formatering och skapade därefter ett test i ramverket efter respektive.
"BBcode" och "makeClickable" hade mer avancerad regex i metoden, vilket jag inte förstod helt.
Det senare metoderna "markdown" och "nl2br" var mer simpla då de fanns en inbyggd funktion och klass redan i PHP.
För övrigt så fungerade det bra att skicka in en array av filtrerna då det var lätt att hantera när det skulle vara flertal.

Berätta om din klasstruktur och kodstruktur för din lösning av webbsidor med innehåll i databasen.
Jag skapade en översiktlig route som innehåller samtliga webbsidor i en tabell, med en länk till respektive.
Jag löste routingen genom att använda mig utav en gemensam vy för alla olika webbsidor.
Sedan kollar jag url:en efter "path" och söker genom databasen efter webbsidan för att få fram rätt data i vyn.
Jag har även skapat en felhantering där "path" är tom, vilket gör att sidan kastar en Exception och skriver ut
"Does not have a path".

Hur känner du rent allmänt för den koden du skrivit i din me/redovisa, vad är bra och mindre bra? Ser du potential till refactoring av din kod och/eller behov av stöd från ramverket?
Jag känner att jag inte haft tid att styla om hemsidan något, vilket är ganska tråkigt.
Nu när jag arbetat mycket med me/redovisa så har jag lärt mig mapphanteringen mycket bättre.
Det känns väldigt smidigt att använda sig utav "$app" för routing, databas, requests.
Jag tror att jag kunde ha fixat kodstrukturen lite snyggare i t.ex routingen då jag använder mig mycket av samma kod där.
Jag tycker det är ganska skönt att skriva mycket i inline PHP, då känns det som att man har mer koll.

Vilken är din TIL för detta kmom?
Hur filter kan appliceras och skapa HTML kod från en sträng.



Kmom07-10
-------------------------

Här är redovisningstexten

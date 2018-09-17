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

Här är redovisningstexten



Kmom04
-------------------------

Här är redovisningstexten



Kmom05
-------------------------

Här är redovisningstexten



Kmom06
-------------------------

Här är redovisningstexten



Kmom07-10
-------------------------

Här är redovisningstexten

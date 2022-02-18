# vaderlek-demo

I konsollen:
create database weather_db;
use weather_db;

## Läsa in data
Jag har läst in data på tre olika sätt och visar dem i tre olika filer här nedan. Samtliga filer står för sig själv och innehåller även kod för att ta bort och återskapa tabellen så den är tom när vi börjar.

### migrate-1-safe.php
Den här filen läser och importerar datafilen utifrån att jobba säkert med parametriserade frågor. Det är säkert men mycket långsamt. En körning tar ungefär 20 sekunder. Den stora nackdelen är att det kommer köras 1 fråga per rad i källfilen. 

### migrate-2-bulk.php
Den här filen läser och importerar datafilen utifrån att skapa en sträng och göra en enda insertfråga. Den stora fördelen är att det enbart sker en fråga och den är klar på runt 0.20 sekunder. Nackdelen med den är att datan inte granskas utifrån den skulle innehålla något skadligt.

### migrate-3-mysql.php
Den här filen låter mysql själv läsa in och importerar datafilen. MySQL är mycket effektivt på det och det går fort - enbart runt .017 sekunder. Inte heller här tas säkerhet någon hänsyn till. 

## api
Att göra ett API innebär egentligen bara att det ska finnas ett sätt att få ut eller lämna data. I vårt fall enbart hämta data. Jag har inte använt routing i mina exempel utan försökt hålla dem så rena och minimalistiska som möjligt. 



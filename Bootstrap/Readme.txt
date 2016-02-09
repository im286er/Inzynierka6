README

Jak utworzyæ i zupdatowaæ bazê danych:

1.Otwórz cmd i wejdŸ do katalogu z projektem nastêpnie wklej poni¿sze komendy:
2.php app/console doctrine:database:create
3.php app/console doctrine:schema:update --force
4.php app/console doctrine:fixtures:load 

Powy¿sze komendy wygeneruj¹ bazê danych wraz z 2 domyœlnymi u¿ytkownikami:
-admin has³o:admin
-user has³o:user

Dodatkowo wygenerowanych zostanie 100 losowych ofert z Lublina i okolic(mo¿na je potem usun¹æ czyszcz¹c tabelê oferty)

Do usuniêcia bazy danych nale¿y u¿yæ komendy:
- php app/console doctrine:database:drop --force

Jeœli podczas tworzenia bazy danych wyst¹pi³y problemy, mo¿na pomin¹æ powy¿sze kroki i zaimportowaæ gotowy skrypt:
/db_stancje.sql

Jak wgraæ pliki na serwer:

- W przypadku lokalnego hosta, wystarczy przenieœæ zawartoœæ folderu Bootstrap do udostêpnianego folderu
  (adres URL strony g³ównej bêdzie mia³ wtedy postaæ: localhost/web/)
- W przypadku serwera zewnêtrznêgo, nale¿y przenieœæ pliki za pomoc¹ ftp na serwer,
  w niektórych przypadkach moze istnieæ koniecznoœæ zmiany nazwy folderu /web na /public_html
  (adres URL strony g³ównej bêdzie mia³ wtedy postaæ: www.domena.com/)

Domyœlnie po³¹czenie z baz¹ danych skonfigurowane jest dla lokalnego hosta. 
Aby to zmieniæ nale¿y edytowaæ w pliku /app/config/parameters.yml nastêpuj¹ce linijki:

database_host: adres internetowy serwera bazy danych
database_port: port
database_name: nazwa bazy danych
database_user: nazwa u¿ytkownika
database_password: has³o











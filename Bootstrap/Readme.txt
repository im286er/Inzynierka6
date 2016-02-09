README

Jak utworzy� i zupdatowa� baz� danych:

1.Otw�rz cmd i wejd� do katalogu z projektem nast�pnie wklej poni�sze komendy:
2.php app/console doctrine:database:create
3.php app/console doctrine:schema:update --force
4.php app/console doctrine:fixtures:load 

Powy�sze komendy wygeneruj� baz� danych wraz z 2 domy�lnymi u�ytkownikami:
-admin has�o:admin
-user has�o:user

Dodatkowo wygenerowanych zostanie 100 losowych ofert z Lublina i okolic(mo�na je potem usun�� czyszcz�c tabel� oferty)

Do usuni�cia bazy danych nale�y u�y� komendy:
- php app/console doctrine:database:drop --force

Je�li podczas tworzenia bazy danych wyst�pi�y problemy, mo�na pomin�� powy�sze kroki i zaimportowa� gotowy skrypt:
/db_stancje.sql

Jak wgra� pliki na serwer:

- W przypadku lokalnego hosta, wystarczy przenie�� zawarto�� folderu Bootstrap do udost�pnianego folderu
  (adres URL strony g��wnej b�dzie mia� wtedy posta�: localhost/web/)
- W przypadku serwera zewn�trzn�go, nale�y przenie�� pliki za pomoc� ftp na serwer,
  w niekt�rych przypadkach moze istnie� konieczno�� zmiany nazwy folderu /web na /public_html
  (adres URL strony g��wnej b�dzie mia� wtedy posta�: www.domena.com/)

Domy�lnie po��czenie z baz� danych skonfigurowane jest dla lokalnego hosta. 
Aby to zmieni� nale�y edytowa� w pliku /app/config/parameters.yml nast�puj�ce linijki:

database_host: adres internetowy serwera bazy danych
database_port: port
database_name: nazwa bazy danych
database_user: nazwa u�ytkownika
database_password: has�o











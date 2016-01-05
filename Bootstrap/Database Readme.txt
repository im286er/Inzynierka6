Jak utworzyæ i zupdatowaæ bazê danych:

1.Otwórz cmd i wejdŸ do katalogu z projektem (u mnie cd C:/xampp/htdocs/Inzynierka6/Bootstrap) nastêpnie wklej poni¿sze komendy:
2.php app/console doctrine:database:create
3.php app/console doctrine:schema:update --force
4.php app/console doctrine:fixtures:load


Po œci¹gniêciu ka¿dego commita ode mnie, przed rozpoczêciem czegokolwiek, trzeba zupdatowaæ bazê wiêc wystarczy wejœæ w katalog z projektem i wkleiæ:
php app/console doctrine:schema:update --force
php app/console doctrine:fixtures:load




Jeœli z jakichœ powodów trzeba bazê usun¹c to tu jest komenda:
php app/console doctrine:database:drop --force






To tylko dla mnie:

php app/console doctrine:generate:entity 
php app/console doctrine:generate:entities AppBundle/Entity/nazwa
DROP TABLE fos_user,oferty,preferencje,wyposazenie,wyposazenie_oferty,preferencje_oferty,zdjecia,obserwowane,komentarze

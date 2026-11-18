A feladatok megoldására elkészített SQL parancsokat illessze be a feladat sorszáma után!
***
12. feladat

***
14. feladat
SELECT COUNT(letszam) AS "Nagyrendezvények száma" FROM rendezveny WHERE letszam >= 100; 
***
15. feladat
SELECT rendezveny.idopont, rendezveny.napokszama, rendezveny.letszam FROM rendezveny JOIN helyszin ON rendezveny.helyszinId = helyszin.id WHERE helyszin.nev = "Szeged";
***
16. feladat
UPDATE kapcsolat SET kapcsolat.cegnev = "BugFix IT" WHERE kapcsolat.nev = "Nagy Béla";
***
17. feladat
SELECT tipus.nev AS "típus", AVG(rendezveny.letszam) AS "átlaglétszám" FROM rendezveny JOIN tipus ON rendezveny.tipusId = tipus.id GROUP BY tipus.nev ORDER BY 2 DESC LIMIT 2;
***
18. feladat

***
19. feladat

***

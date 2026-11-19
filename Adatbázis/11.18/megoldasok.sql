A feladatok megoldására elkészített SQL parancsokat illessze be a feladat sorszáma után!
***
--12. feladat--

***
--14. feladat--
SELECT COUNT(letszam) AS "Nagyrendezvények száma" FROM rendezveny WHERE letszam >= 100; 
***
--15. feladat--
SELECT rendezveny.idopont, rendezveny.napokszama, rendezveny.letszam FROM rendezveny JOIN helyszin ON rendezveny.helyszinId = helyszin.id WHERE helyszin.nev = "Szeged";
***
--16. feladat--
UPDATE kapcsolat SET kapcsolat.cegnev = "BugFix IT" WHERE kapcsolat.nev = "Nagy Béla";
***
--17. feladat--
SELECT tipus.nev AS "típus", AVG(rendezveny.letszam) AS "átlaglétszám" FROM rendezveny JOIN tipus ON rendezveny.tipusId = tipus.id GROUP BY tipus.nev ORDER BY 2 DESC LIMIT 2;
***
--18. feladat--
--LEFT JOIN megoldás--
SELECT helyszin.nev FROM helyszin LEFT JOIN rendezveny ON helyszin.id = rendezveny.helyszinId WHERE rendezveny.id IS NULL;
--RIGHT JOIN megoldás--
SELECT helyszin.nev FROM rendezveny RIGHT JOIN helyszin ON helyszin.id = rendezveny.helyszinId WHERE rendezveny.id IS NULL;
--Allekérdezéses megoldás--
SELECT helyszin.nev FROM helyszin WHERE helyszin.id NOT IN (SELECT rendezveny.helyszinId FROM rendezveny);
***
--19. feladat--
SELECT kapcsolat.nev, kapcsolat.email, (rendezveny.napokszama*20000 + rendezveny.letszam*1000) AS "szervezési díj" 
FROM kapcsolat 
    JOIN rendezveny ON kapcsolat.id = rendezveny.kapcsolatId 
    JOIN tipus ON rendezveny.tipusId = tipus.id 
WHERE tipus.nev = "tréning";
***

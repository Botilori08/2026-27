--3.feladat--
SELECT nevado FROM feladatsor WHERE nevado NOT LIKE "% % %";
--4.feladat--
SELECT nevado, kituzes FROM feladatsor WHERE "2018-12-31" BETWEEN kituzes AND hatarido;
--5.feladat--
SELECT csapat.nev, SUM(megoldas.pontszam) FROM csapat JOIN megoldas ON csapat.id = megoldas.csapatid GROUP BY 1 ORDER BY 2 DESC;
--6.feladat--
SELECT feladatsor.nevado, feladatsor.ag, SUM(feladat.pontszam) FROM feladatsor JOIN feladat ON feladatsor.id = feladat.feladatsorid GROUP BY 1 HAVING SUM(feladat.pontszam) < 150;

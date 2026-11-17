--2.feladat--
SELECT nev FROM tevekenyseg WHERE iskolai ORDER BY nev;
--3.feladat--
SELECT SUM(hossz*maxletszam) FROM munka;
--4.feladat--
SELECT osztaly,diak.nev,datum,kezdes AS "időpont",hossz AS oraszam,tevekenyseg.nev AS "tevékenység" FROM diak JOIN jelentkezes ON diak.id = jelentkezes.diakid JOIN munka ON jelentkezes.munkaid = munka.id JOIN tevekenyseg ON munka.tevekenysegid = tevekenyseg.id WHERE osztaly LIKE "10/%" ORDER BY diak.nev,munka.datum;
--5.feladat--
SELECT nev, COUNT(*) FROM diak JOIN jelentkezes ON diak.id = jelentkezes.diakid WHERE jelentkezes.elfogadva AND NOT teljesitve GROUP BY diak.id HAVING COUNT(*) >= 2;
--6.feladat--
SELECT datum,kezdes,hossz,tevekenyseg.nev FROM munka JOIN tevekenyseg ON munka.tevekenysegid = tevekenyseg.id LEFT JOIN jelentkezes ON munka.id = jelentkezes.munkaid;
---Még nem végleges!--
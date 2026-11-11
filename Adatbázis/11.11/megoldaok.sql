--2.feladat--
SELECT sorszam,ertek FROM valasz JOIN jatekos ON jatekos_id = jatekos.id WHERE veznev="Szolnoki" AND utonev="Lajos";
--3.feladat--
SELECT kategoria,COUNT(id) FROM jatekos WHERE csapat=3 GROUP BY kategoria;
--4.feladat--
SELECT COUNT(*) FROM javkulcs JOIN valasz ON javkulcs.sorszam = valasz.sorszam WHERE javkulcs.ertek = valasz.ertek AND valasz.sorszam=5;
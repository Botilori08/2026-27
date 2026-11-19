-- A feladatok megoldására elkészített SQL parancsokat illessze be a feladat sorszáma után!

-- 9. feladat:


-- 11. feladat:
UPDATE faj SET ertek = 25 WHERE id = 352;

-- 12. feladat:
SELECT faj.nev, faj.latin FROM faj WHERE evszam IS NULL ORDER BY nev;

-- 13. feladat:
SELECT faj.evszam, COUNT(id) as "fajok szama" FROM faj WHERE evszam > 2000 GROUP BY evszam;

-- 14. feladat:
SELECT faj.nev, rend.nev, csalad.nev,faj.ertek*1000 AS "eszmei ertek" FROM rend JOIN csalad ON rend.id = csalad.rendId JOIN faj ON csalad.id=faj.csaladId WHERE faj.ertek*1000 > 500000 ; 
 
-- 15. feladat:
SELECT csalad.nev, AVG(faj.ertek) AS "atlag" FROM csalad JOIN faj ON csalad.id = faj.csaladId GROUP BY csalad.nev;

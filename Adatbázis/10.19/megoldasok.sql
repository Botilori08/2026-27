--2.feladat--
SELECT DISTINCT sofor, rendszam, engedely FROM gepkocsi WHERE vizsga=TRUE ORDER BY sofor ASC;
--3.feladat--
SELECT CONCAT(COUNT(id),' fuvar és ',SUM(tav),' km távolság') as "3 napi összegzés" FROM fuvar;
--4.feladat--
SELECT DISTINCT sofor FROM gepkocsi, fuvar WHERE gepkocsi.rendszam = fuvar.rendszam GROUP BY sofor HAVING SUM(fuvar.tav)>80;
--5.feladat--

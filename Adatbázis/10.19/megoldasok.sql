--2.feladat--
SELECT DISTINCT sofor, rendszam, engedely FROM gepkocsi WHERE vizsga=TRUE ORDER BY sofor ASC;
--3.feladat--
SELECT CONCAT(COUNT(id),' fuvar és ',SUM(tav),' km távolság') as "3 napi összegzés" FROM fuvar;
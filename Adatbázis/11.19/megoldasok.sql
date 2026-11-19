--2
SELECT nev FROM diakok WHERE diakok.telepules = "Barnamalom";
--3
SELECT datum, terem, orasorszam FROM orak WHERE orak.targy = "angol" ORDER BY datum, orasorszam;
--4
SELECT orak.csoport, orak.targy, orak.datum FROM orak WHERE orak.csoport LIKE "9%" AND (targy = "matematika" OR targy="fizika") ORDER BY targy;
--5
SELECT diakok.telepules, COUNT(diakok.nev) FROM diakok GROUP BY telepules ORDER BY 2 DESC;
--6
SELECT DISTINCT(orak.targy) FROM orak ORDER BY 1; 
--7
SELECT diakok.nev, diakok.email, diakok.telefon FROM orak JOIN kapcsolo ON orak.id = kapcsolo.oraid JOIN diakok ON kapcsolo.diakid = diakok.id WHERE orak.tanar = "Angol Anna" AND orak.datum = "2028-11-10";
--8
SELECT nev FROM `diakok` WHERE telepules = (SELECT diakok.telepules FROM diakok WHERE nev = "Majer Melinda") AND nev != "Majer Melinda";
--9




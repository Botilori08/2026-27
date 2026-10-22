--1.--
SELECT * FROM `termek`;
--2.--
SELECT * FROM `termek` WHERE ar < 10000;
--3.--
SELECT * FROM `termek` ORDER BY ar DESC;
--4.--
SELECT * FROM `termek` WHERE keszlet=0;
--5.--
SELECT * FROM `termek` WHERE kategoria = "CD";
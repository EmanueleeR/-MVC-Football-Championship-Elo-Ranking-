/*
------------------
DATABASE MONDO CALCIO
------------------
*/
-- --------------------------------------------------------

/*
-- Struttura della tabella `EDIZIONE`
*/ 

CREATE TABLE EDIZIONE(
  id_edizione INT(11) NOT NULL AUTO_INCREMENT,
  cod_campionato INT(11) NOT NULL,
  numero_edizione INT NOT NULL,
  nome_edizione VARCHAR(100) NOT NULL,
  stagione_calcistica VARCHAR(9) NOT NULL,
  mese_apertura VARCHAR(10) NOT NULL,
  mese_chiusura VARCHAR(10) NOT NULL,
  numero_partecipanti INT(2) NOT NULL,
  formula VARCHAR(50) NOT NULL,
  punti_a_vittoria INT(1) DEFAULT NULL,
  punti_a_pareggio INT(1) DEFAULT 1,
  punti_a_sconfitta INT(1) DEFAULT 0,
  PRIMARY KEY (id_edizione),
  FOREIGN KEY (cod_campionato) REFERENCES CAMPIONATO(id_campionato)
);


INSERT INTO EDIZIONE (
cod_campionato,
numero_edizione, nome_edizione, stagione_calcistica,
mese_apertura, mese_chiusura,
numero_partecipanti,
formula)
VALUES
(1,1,'Campionato Italiano di Football','1898','maggio','maggio',4,'Eliminazione diretta'),
(1,2,'Campionato Italiano di Football','1899','aprile','aprile',5,'Challenge round'),
(1,3,'Campionato Italiano di Football','1900','marzo','aprile',6,'Challenge round'),
(1,4,'Campionato Italiano di Football','1901','aprile','maggio',4,'Challenge round'),
(1,5,'Campionato Italiano di Football','1902','marzo','aprile',8,'Challenge round'),
(1,6,'Campionato Italiano di Football','1903','marzo','aprile',6,'Challenge round'),
(1,7,'Prima Categoria','1904','marzo','marzo',5,'Challenge round'),
(1,8,'Prima Categoria','1905','febbraio','aprile',6,'eliminatorie regionali + girone finale'),
(1,9,'Prima Categoria','1906','gennaio','maggio',5,'eliminatorie regionali + girone finale'),
(1,10,'Prima Categoria','1907','gennaio','aprile',6,'eliminatorie regionali + girone finale'),
(1,11,'Prima Categoria','1908','marzo','maggio',4,'eliminatorie regionali e girone finale'),
(1,12,'Prima Categoria','1909','gennaio','aprile',9,'eliminatorie regionali, semifinale e finale'),
(1,13,'Prima Categoria','1909-1910','novembre','maggio',9,'girone unico'),
(1,14,'Prima Categoria','1910-1911','novembre','giugno',13,'girone unico e finale'),
(1,15,'Prima Categoria','1911-1912','settembre','maggio',14,'girone unico e finale'),
(1,16,'Prima Categoria','1912-1913','ottobre','giugno',30,'eliminatorie regionali, girone finale e finalissim'),
(1,17,'Prima Categoria','1913-1914','ottobre','luglio',45,'eliminatorie regionali, girone finale e finalissim'),
(1,18,'Prima Categoria','1914-1915','ottobre','maggio',52,'eliminatorie regionali, semifinali, finali naziona'),
(1,19,'Prima Categoria','1919-1920','ottobre','giugno',66,'campionati regionali, semifinali, finali nazionali'),
(1,20,'Prima Categoria','1920-1921','ottobre','luglio',88,'campionati regionali, semifinali, finali nazionali'),
(1,21,'Prima Categoria','1921-1922','ottobre','maggio',47,'campionati regionali + semifinali e finali naziona'),
(1,21,'Prima Divisione','1921-1922','ottobre','giugno',58,'2 gironi+finale (N) gironi eliminatori regionali +'),
(1,23,'Prima Divisione','1922-1923','ottobre','luglio',56,'3 gironi, finale e finalissima'),
(1,24,'Prima Divisione','1923-1924','ottobre','settembre',45,'2 gironi, finale e finalissima'),
(1,25,'Prima Divisione','1924-1925','ottobre','agosto',43,'2 gironi, finale e finalissima'),
(1,26,'Prima Divisione','1925-1926','ottobre','settembre',44,'2 gironi, finale e finalissima'),
(1,27,'Divisione Nazionale','1926-1927','ottobre','luglio',20,'2 gironi + finale'),
(1,28,'Divisione Nazionale','1927-1928','settembre','luglio',22,'2 gironi + finale'),
(1,29,'Divisione Nazionale','1928-1929','settembre','luglio',32,'a due gironi + finale');





/*---------------------------------------------------------------------*/





/*INIZIO Girone unico all'italiana*/
/*--------------------------------*/
INSERT INTO EDIZIONE (
cod_campionato,
numero_edizione, nome_edizione, stagione_calcistica,
mese_apertura, mese_chiusura,
numero_partecipanti,
formula,
punti_a_vittoria)
VALUES
/*INIZIO 18 squadre, girone unico all'italiana*/
(1,30,'Serie A','1929-1930','settembre','maggio',18,'girone unico all''italiana',2),
(1,31,'Serie A','1930-1931','settembre','maggio',18,'girone unico all''italiana',2),
(1,32,'Serie A','1931-1932','settembre','maggio',18,'girone unico all''italiana',2),
(1,33,'Serie A','1932-1933','settembre','maggio',18,'girone unico all''italiana',2),
(1,34,'Serie A','1933-1934','settembre','maggio',18,'girone unico all''italiana',2),
/*FINE 18 squadre, girone unico all'italiana*/

/*INIZIO 16 squadre, girone unico all'italiana*/
(1,35,'Serie A','1934-1935','settembre','maggio',16,'girone unico all''italiana',2),
(1,36,'Serie A','1935-1936','settembre','maggio',16,'girone unico all''italiana',2),
(1,37,'Serie A','1936-1937','settembre','maggio',16,'girone unico all''italiana',2),
(1,38,'Serie A','1937-1938','settembre','maggio',16,'girone unico all''italiana',2),
(1,39,'Serie A','1938-1939','settembre','maggio',16,'girone unico all''italiana',2),
(1,40,'Serie A','1939-1940','settembre','maggio',16,'girone unico all''italiana',2),
(1,41,'Serie A','1940-1941','settembre','maggio',16,'girone unico all''italiana',2),
(1,42,'Serie A','1941-1942','settembre','maggio',16,'girone unico all''italiana',2),
(1,43,'Serie A','1942-1943','settembre','maggio',16,'girone unico all''italiana',2),
/*FINE 16 squadre, girone unico all'italiana*/


/*INIZIO 14 squadre, NON girone unico all'italiana*/
(1,44,'Divisione Nazionale','1945-1946','settembre','maggio',14,'2 gironi preliminari, 1 girone finale',2),
/*FINE 14 squadre, NON girone unico all'italiana*/

/*INIZIO 20 squadre, girone unico all'italiana*/
(1,45,'Serie A','1946-1947','settembre','maggio',20,'girone unico all''italiana',2),
/*FINE 20 squadre, girone unico all'italiana*/

/*INIZIO 21 squadre, girone unico all'italiana*/
(1,46,'Serie A','1947-1948','settembre','maggio',21,'girone unico all''italiana',2),
/*FINE 21 squadre, girone unico all'italiana*/

/*INIZIO 20 squadre, girone unico all'italiana*/
(1,47,'Serie A','1948-1949','settembre','maggio',20,'girone unico all''italiana',2),
(1,48,'Serie A','1949-1950','settembre','maggio',20,'girone unico all''italiana',2),
(1,49,'Serie A','1950-1951','settembre','maggio',20,'girone unico all''italiana',2),
(1,50,'Serie A','1951-1952','settembre','maggio',20,'girone unico all''italiana',2),
/*FINE 20 squadre, girone unico all'italiana*/

/*INIZIO 18 squadre, girone unico all'italiana*/
(1,51,'Serie A','1952-1953','settembre','maggio',18,'girone unico all''italiana',2),
(1,52,'Serie A','1953-1954','settembre','maggio',18,'girone unico all''italiana',2),
(1,53,'Serie A','1954-1955','settembre','maggio',18,'girone unico all''italiana',2),
(1,54,'Serie A','1955-1956','settembre','maggio',18,'girone unico all''italiana',2),
(1,55,'Serie A','1956-1957','settembre','maggio',18,'girone unico all''italiana',2),
(1,56,'Serie A','1957-1958','settembre','maggio',18,'girone unico all''italiana',2),
(1,57,'Serie A','1958-1959','settembre','maggio',18,'girone unico all''italiana',2),
(1,58,'Serie A','1959-1960','settembre','maggio',18,'girone unico all''italiana',2),
(1,59,'Serie A','1960-1961','settembre','maggio',18,'girone unico all''italiana',2),
(1,60,'Serie A','1961-1962','settembre','maggio',18,'girone unico all''italiana',2),
(1,61,'Serie A','1962-1963','settembre','maggio',18,'girone unico all''italiana',2),
(1,62,'Serie A','1963-1964','settembre','maggio',18,'girone unico all''italiana',2),
(1,63,'Serie A','1964-1965','settembre','maggio',18,'girone unico all''italiana',2),
(1,64,'Serie A','1965-1966','settembre','maggio',18,'girone unico all''italiana',2),
(1,65,'Serie A','1966-1967','settembre','maggio',18,'girone unico all''italiana',2),
/*FINE 18 squadre, girone unico all'italiana*/

/*INIZIO 16 squadre, girone unico all'italiana*/
(1,66,'Serie A','1967-1968','settembre','maggio',16,'girone unico all''italiana',2),
(1,67,'Serie A','1968-1969','settembre','maggio',16,'girone unico all''italiana',2),
(1,68,'Serie A','1969-1970','settembre','maggio',16,'girone unico all''italiana',2),
(1,69,'Serie A','1970-1971','settembre','maggio',16,'girone unico all''italiana',2),
(1,70,'Serie A','1971-1972','settembre','maggio',16,'girone unico all''italiana',2),
(1,71,'Serie A','1972-1973','settembre','maggio',16,'girone unico all''italiana',2),
(1,72,'Serie A','1973-1974','settembre','maggio',16,'girone unico all''italiana',2),
(1,73,'Serie A','1974-1975','settembre','maggio',16,'girone unico all''italiana',2),
(1,74,'Serie A','1975-1976','settembre','maggio',16,'girone unico all''italiana',2),
(1,75,'Serie A','1976-1977','settembre','maggio',16,'girone unico all''italiana',2),
(1,76,'Serie A','1977-1978','settembre','maggio',16,'girone unico all''italiana',2),
(1,77,'Serie A','1978-1979','settembre','maggio',16,'girone unico all''italiana',2),
(1,78,'Serie A','1979-1980','settembre','maggio',16,'girone unico all''italiana',2),
(1,79,'Serie A','1980-1981','settembre','giugno',16,'girone unico all''italiana',2),
(1,80,'Serie A','1981-1982','settembre','giugno',16,'girone unico all''italiana',2),
(1,81,'Serie A','1982-1983','settembre','giugno',16,'girone unico all''italiana',2),
(1,82,'Serie A','1983-1984','settembre','giugno',16,'girone unico all''italiana',2),
(1,83,'Serie A','1984-1985','settembre','giugno',16,'girone unico all''italiana',2),
(1,84,'Serie A','1985-1986','settembre','aprile',16,'girone unico all''italiana',2),
(1,85,'Serie A','1986-1987','settembre','maggio',16,'girone unico all''italiana',2),
(1,86,'Serie A','1987-1988','settembre','maggio',16,'girone unico all''italiana',2),
/*INIZIO 16 squadre, girone unico all'italiana*/

/*INIZIO 18 squadre, girone unico all'italiana*/
(1,87,'Serie A','1988-1989','ottobre','giugno',18,'girone unico all''italiana',2),
(1,88,'Serie A','1989-1990','agosto','aprile',18,'girone unico all''italiana',2),
(1,89,'Serie A','1990-1991','settembre','maggio',18,'girone unico all''italiana',2),
(1,90,'Serie A','1991-1992','settembre','maggio',18,'girone unico all''italiana',2),
(1,91,'Serie A','1992-1993','settembre','giugno',18,'girone unico all''italiana',2),
(1,92,'Serie A','1993-1994','agosto','maggio',18,'girone unico all''italiana',2),

/*INIZIANO I 3 PUNTI A VITTORIA*/
(1,93,'Serie A','1994-1995','settembre','giugno',18,'girone unico all''italiana',3),
(1,94,'Serie A','1995-1996','agosto','maggio',18,'girone unico all''italiana',3),
(1,95,'Serie A','1996-1997','settembre','giugno',18,'girone unico all''italiana',3),
(1,96,'Serie A','1997-1998','agosto','maggio',18,'girone unico all''italiana',3),
(1,97,'Serie A','1998-1999','settembre','maggio',18,'girone unico all''italiana',3),
(1,98,'Serie A','1999-2000','agosto','maggio',18,'girone unico all''italiana',3),
(1,99,'Serie A','2000-2001','settembre','giugno',18,'girone unico all''italiana',3),
(1,100,'Serie A','2001-2002','agosto','maggio',18,'girone unico all''italiana',3),
(1,101,'Serie A','2002-2003','settembre','maggio',18,'girone unico all''italiana',3),
(1,102,'Serie A','2003-2004','agosto','maggio',18,'girone unico all''italiana',3),
/*FINE 18 squadre, girone unico all'italiana*/

/*INIZIO 20 squadre, girone unico all'italiana*/
(1,103,'Serie A','2004-2005','settembre','maggio',20,'girone unico all''italiana',3),
(1,104,'Serie A','2005-2006','agosto','maggio',20,'girone unico all''italiana',3),
(1,105,'Serie A','2006-2007','settembre','maggio',20,'girone unico all''italiana',3),
(1,106,'Serie A','2007-2008','agosto','maggio',20,'girone unico all''italiana',3),
(1,107,'Serie A','2008-2009','agosto','maggio',20,'girone unico all''italiana',3),
(1,108,'Serie A','2009-2010','agosto','maggio',20,'girone unico all''italiana',3),
(1,109,'Serie A','2010-2011','agosto','maggio',20,'girone unico all''italiana',3),
(1,110,'Serie A','2011-2012','settembre','maggio',20,'girone unico all''italiana',3),
(1,111,'Serie A','2012-2013','agosto','maggio',20,'girone unico all''italiana',3),
(1,112,'Serie A','2013-2014','agosto','maggio',20,'girone unico all''italiana',3),
(1,113,'Serie A','2014-2015','agosto','maggio',20,'girone unico all''italiana',3),
(1,114,'Serie A','2015-2016','agosto','maggio',20,'girone unico all''italiana',3),
(1,115,'Serie A','2016-2017','agosto','maggio',20,'girone unico all''italiana',3),
(1,116,'Serie A','2017-2018','agosto','maggio',20,'girone unico all''italiana',3),
(1,117,'Serie A','2018-2019','agosto','maggio',20,'girone unico all''italiana',3),
(1,118,'Serie A','2019-2020','agosto','maggio',20,'girone unico all''italiana',3),
(1,119,'Serie A','2020-2021','settembre','maggio',20,'girone unico all''italiana',3),
(1,120,'Serie A','2021-2022','agosto','maggio',20,'girone unico all''italiana',3),
(1,121,'Serie A','2022-2023','agosto','giugno',20,'girone unico all''italiana',3),
(1,122,'Serie A','2023-2024','agosto','maggio',20,'girone unico all''italiana',3);
/*FINE 20 squadre, girone unico all'italiana*/




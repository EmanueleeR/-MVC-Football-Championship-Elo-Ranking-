/*
------------------
DATABASE MONDO CALCIO
------------------
*/
-- --------------------------------------------------------
CREATE DATABASE mondo_calcio;
USE mondo_calcio;
/*
-- Struttura della tabella `CAMPIONATO`
*/ 

CREATE TABLE CAMPIONATO(
  id_campionato INT(11) NOT NULL AUTO_INCREMENT,
  nome_campionato VARCHAR(100) NOT NULL,
  nome_abbreviato VARCHAR(100) NOT NULL,
  nome_ufficiale VARCHAR(100) NOT NULL,
  federazione VARCHAR(100) NOT NULL,
  paese VARCHAR(100) NOT NULL,
  organizzatore VARCHAR(100) NOT NULL,
  titolo VARCHAR(100) NOT NULL,
  cadenza VARCHAR(20) NOT NULL,
  fondazione INT(4) NOT NULL,
  /*stemma_squadra VARCHAR(50) DEFAULT NULL,*/
  PRIMARY KEY (id_campionato)
);




INSERT INTO CAMPIONATO (
nome_campionato, nome_abbreviato, nome_ufficiale,
federazione, paese, organizzatore,
titolo, cadenza, fondazione)
VALUES
('Campionato di Serie A','Serie A','Serie A TIM','FIGC','Italia','Lega Serie A','Campione d''Italia','annuale',1898),
('Premier League','EPL','English Premier League','The FA','Inghilterra','Premier League','Campione d''Inghilterra','annuale',1888),
('Campeonato Nacional de Liga de Primera División','LaLiga','LaLiga Santander','RFEF','Spagna','LFP','Campione di Spagna','annuale',1929),
('1. Fußball-Bundesliga','Bundesliga','1. Fußball-Bundesliga','DFB','Germania','DFL','Deutscher Fußballmeister (campione del calcio tedesco)','annuale',1902),
('Ligue 1','Ligue 1','Ligue 1','UEFA','Francia','LFP','Campione di Francia','annuale',1932),
('Eredivisie','Eredivisie','Eredivisie','KNVB','Olanda','KNVB','Kampioenen van Nederland; Landskampioen (campione dei Paesi Bassi)','annuale',1956);
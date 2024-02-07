/*
------------------
DATABASE MONDO CALCIO
------------------
*/
-- --------------------------------------------------------

/*
-- Struttura della tabella `SQUADRA`
*/ 

CREATE TABLE SQUADRA(
  id_squadra INT(11) NOT NULL AUTO_INCREMENT,
  nome_squadra VARCHAR(50) NOT NULL,
  nome_squadra_con_acronimo VARCHAR(50) DEFAULT NULL,
  nome_squadra_per_intero VARCHAR(100) DEFAULT NULL,
  data_fondazione DATE DEFAULT NULL, /*AAAA-MM-GG*/
  anno_fondazione INT(4) NOT NULL,
  citta VARCHAR(50) NOT NULL,
  stemma_squadra VARCHAR(50) DEFAULT NULL,
  stadio VARCHAR(60) DEFAULT NULL,
  PRIMARY KEY (id_squadra)
);



INSERT INTO SQUADRA (
nome_squadra, nome_squadra_con_acronimo, nome_squadra_per_intero,
data_fondazione, anno_fondazione,
citta, stemma_squadra, stadio)
VALUES
('Ascoli','Ascoli Calcio 1898 FC','Ascoli Calcio 1898 Football Club','1898-11-1',1898,'Ascoli Piceno','Stemma Ascoli.jpg','Stadio Cino e Lillo Del Duca'),
('Atalanta','Atalanta BC','Atalanta Bergamasca Calcio','1907-10-17',1907,'Bergamo','Stemma Atalanta.jpg','Gewiss Stadium'),
('Bari','SSC Bari','Società Sportiva Calcio Bari','1908-01-15',1908,'Bari','Stemma Bari.jpg','Stadio San Nicola'),
('Bologna','Bologna FC 1909','Bologna Football Club 1909','1909-10-3',1909,'Bologna','Stemma Bologna.jpg','Stadio Renato Dall''Ara'),
('Cesena','Cesena FC','Cesena Football Club','1940-4-21',1940,'Cesena','Stemma Cesena.jpg','Orogel Stadium-Dino Manuzzi'),
('Cremonese','US Cremonese','Unione Sportiva Cremonese','1903-3-24',1903,'Cremona','Stemma Cremonese.jpg','Stadio Giovanni Zini'),
('Fiorentina','ACF Fiorentina','Associazione Calcio Fiorentina Fiorentina','1926-8-29',1926,'Firenze','Stemma Fiorentina.jpg','Stadio Artemio Franchi'),
('Genoa','Genoa CFC','Genoa Cricket and Football Club','1893-9-7',1893,'Genova','Stemma Genoa.jpg','Stadio Luigi Ferraris'),
('Inter','FC Internazionale Milano','Football Club Internazionale Milano','1908-3-9',1908,'Milano','Stemma Inter.jpg','Stadio Giuseppe Meazza'),
('Juventus','Juventus FC','Juventus Football Club','1897-11-1',1897,'Torino','Stemma Juventus.jpg','Allianz Stadium'),
('Lazio','SS Lazio','Società Sportiva Lazio','1900-1-9',1900,'Roma','Stemma Lazio.jpg','Stadio Olimpico'),
('Lecce','U.S. Lecce','Unione Sportiva Lecce','1908-3-15',1908,'Lecce','Stemma Lecce.jpg','Stadio Via del mare'),
('Milan','AC Milan','Associazione Calcio Milan','1899-12-16',1899,'Milano','Stemma Milan.jpg','Stadio Giuseppe Meazza'),
('Napoli','SSC Napoli','Società Sportiva Calcio Napoli','1926-8-25',1926,'Napoli','Stemma Napoli.jpg','Stadio Diego Armando Maradona'),
('Roma','AS Roma','Associazione Sportiva Roma','1927-6-7',1927,'Roma','Stemma Roma.jpg','Stadio Olimpico'),
('Sampdoria','UC Sampdoria','Unione Calcio Sampdoria','1946-8-12',1946,'Genova','Stemma Sampdoria.jpg','Stadio Luigi Ferraris'),
('Chievo','AC ChievoVerona','Associazione Calcio ChievoVerona','1929-9-6',1929,'Chievo (frazione di Verona)','Stemma Chievo.jpg','Stadio Marcantonio Bentegodi'),
('Sassuolo','US Sassuolo Calcio','Unione Sportiva Sassuolo Calcio','1920-7-17',1920,'Sassuolo','Stemma Sassuolo.jpg','Mapei Stadium – Città del Tricolore (Reggio Emilia)'),
('Torino','Torino FC','Torino Football Club','1906-12-3',1906,'Verona','Stemma Torino.jpg','Stadio Olimpico Grande Torino'),
('Vicenza','L.R. Vicenza','Lanerossi Vicenza','1902-3-9',1902,'Vicenza','Stemma Vicenza.jpg','Stadio Comunale Romeo Menti'),
('Palermo','Palermo F.C.','Palermo Football Club','1900-11-1',1900,'Palermo','Stemma Palermo.jpg','Stadio Comunale "Renzo Barbera"'),
('Triestina','US Triestina Calcio','Unione Sportiva Triestina Calcio 1918','1919-2-2',1919,'Trieste','Stemma Trieste.jpg','Stadio Comunale Nereo Rocco'),
('Livorno','US Livorno 1915 SSD','Unione Sportiva Livorno 1915','1915-2-17',1915,'Livorno','Stemma Livorno.jpg','Stadio Armando Picchi'),
('Catania','Catania SSD','Catania Società Sportiva Dilettantistica','1946-9-24',1946,'Catania','Stemma Catania.jpg','Stadio Angelo Massimino'),
('Alessandria','US Alessandria Calcio 1912','Unione Sportiva Alessandria Calcio 1912','1912-2-18',1912,'Alessandria','Stemma Alessandria.jpg','Stadio Giuseppe Moccagatta'),
('Modena','Modena FC 2018','Modena Football Club 2018','1912-4-5',1912,'Modena','Stemma Modena.jpg','Stadio Alberto Braglia'),
('Novara','Novara FC','Novara Football Club','1908-12-22',1908,'Novara','Stemma Novara.jpg','Stadio Silvio Piola'),
('Perugia','AC Perugia Calcio','Associazione Calcistica Perugia Calcio','1905-6-9',1905,'Perugia','Stemma Perugia.jpg','Stadio Renato Curi'),
('Venezia','Venezia FC','Venezia Football Club','1907-12-14',1907,'Venezia','Stemma Venezia.jpg','Stadio Pier Luigi Penzo'),
('Avellino','US Avellino 1912','Unione Sportiva Avellino 1912','1912-12-12',1912,'Avellino','Stemma Avellino.jpg','Stadio Partenio-Adriano Lombardi'),
('Sampierdarenese','AC Sampierdarenese','Associazione Calcio Sampierdarenese','1899-3-19',1899,'Sampierdarena (quartiere di Genova)','Stemma Sampierdarenese.jpg','Stadio Luigi Ferraris'),
('Varese','SSD Varese Calcio','Società Sportiva Dilettantistica Varese Calcio','1910-3-22',1910,'Varese','Stemma Varese.jpg','Stadio Franco Ossola'),
('Messina','ACR Messina','Associazioni Calcio Riunite Messina','1900-12-1',1900,'Messina','Stemma Messina.jpg','Stadio San Filippo-Franco Scoglio'),
('Casale','FC Casale ASD','Football Club Casale Associazione Sportiva Dilettantistica','1909-12-17',1909,'Casale Monferrato (Alessandria)','Stemma Casale.jpg','Stadio Natale Palli'),
('Salernitana','US Salernitana','Unione Sportiva Salernitana 1919','1919-6-19',1919,'Salerno','Stemma Salernitana.jpg','Stadio Arechi'),
('Crotone','FC Crotone 1910','Football Club Crotone','1910-9-20',1910,'Crotone','Stemma Crotone.jpg','Stadio Comunale Ezio Scida'),
('Legnano','AC Legnano SSD','Associazione Calcio Legnano Società Sportiva Dilettantistica','1913-1-1',1913,'Legnano','Stemma Legnano.jpg','Stadio Comunale Giovanni Mari'),
('Reggiana','AC Reggiana 1919','Associazione Calcio Reggiana 1919','1919-9-25',1919,'Reggio Emilia','Stemma Reggiana.jpg','Mapei Stadium - Città del Tricolore'),
('Ancona','U.S. Ancona','Unione Sportiva Ancona','1905-3-5',1905,'Ancona','Stemma Ancona.jpg','Stadio Del Conero'),
('Monza','AC Monza','Associazione Calcio Monza','1912-9-1',1912,'Monza','Stemma Monza.jpg','Stadio Brianteo (U-Power Stadium)'),
('Pistoiese','US Pistoiese 1921','Unione Sportiva Pistoiese 1921','1921-12-8',1921,'Pistoia','Stemma Pistoiese.jpg','Stadio Comunale Marcello Melani');



INSERT INTO SQUADRA (
nome_squadra, nome_squadra_per_intero,
data_fondazione, anno_fondazione,
citta, stemma_squadra, stadio)
VALUES
('Udinese','Udinese Calcio','1896-11-30',1896,'Udine','Stemma Udinese.jpg','Stadio Friuli'),
('Cagliari','Cagliari Calcio','1920-5-30',1920,'Cagliari','Stemma Cagliari.jpg','Unipol Domus'),
('Parma','Parma Calcio 1913','1913-12-16',1913,'Parma','Stemma Parma.jpg','Stadio Ennio Tardini'),
('Frosinone','Frosinone Calcio','1906-3-5',1906,'Frosinone','Stemma Frosinone.jpg','Stadio Benito Stirpe'),
('Brescia','Brescia Calcio','1911-7-17',1911,'Brescia','Stemma Brescia.jpg','Stadio Mario Rigamonti'),
('Padova','Calcio Padova','1910-1-29',1910,'Padova','Stemma Padova.jpg','Stadio Euganeo'),
('Como','Como 1907','1907-5-25',1907,'Como','Stemma Como.jpg','Stadio Giuseppe Sinigaglia'),
('Pro Patria','Aurora Pro Patria 1919','1919-2-26',1919,'Busto Arsizio','Stemma Pro Patria.jpg','Stadio Carlo Speroni'),
('Foggia','Calcio Foggia 1920','1920-7-5',1920,'Foggia','Stemma Foggia.jpg','Stadio Pino Zaccheria'),
('Reggina','Reggina 1914','1914-1-11',1914,'Reggio Calabria','Stemma Reggina.jpg','Stadio Oreste Granillo'),
('Lucchese','Lucchese 1905','1905-5-25',1905,'Lucca','Stemma Lucchese.jpg','Stadio Porta Elisa');



INSERT INTO SQUADRA (
nome_squadra, nome_squadra_con_acronimo, nome_squadra_per_intero,
anno_fondazione,
citta, stemma_squadra, stadio)
VALUES
('Verona','Hellas Verona FC','Hellas Verona Football Club',1903,'Verona','Stemma Verona.jpg','Stadio Marcantonio Bentegodi'),
('SPAL','S.P.A.L.','Società Polisportiva Ars et Labor',1907,'Ferrara','Stemma SPAL.jpg','Stadio Paolo Mazza'),
('Empoli','Empoli FC','Empoli Football Club',1920,'Empoli','Stemma Empoli.jpg','Stadio Carlo Castellani'),
('Siena','AC Robur Siena 1904','Associazione Calcio Robur Siena 1904',1904,'Siena','Stemma Siena.jpg','Stadio Artemio Franchi (Siena)'),
('Catanzaro','U.S. Catanzaro 1929','Unione Sportiva Catanzaro 1929',1927,'Catanzaro','Stemma Catanzaro.jpg','Stadio Nicola Ceravolo'),
('Pro Vercelli','FC Pro Vercelli 1892','Football Club Pro Vercelli 1892',1903,'Vercelli','Stemma Pro Vercelli.jpg','Stadio Silvio Piola (Vercelli)'),
('Carpi','A.C. Carpi SSD','Associazione Calcio Carpi Società Sportiva Dilettantistica',1909,'Carpi','Stemma Carpi.jpg','Stadio Sandro Cabassi'),
('Treviso','Treviso FBC 1993','Treviso Foot Ball Club 1993',1909,'Treviso','Stemma Treviso.jpg','Stadio Omobono Tenni'),
('Pisa','Pisa SC','Pisa Sporting Club',1909,'Pisa','Stemma Pisa.jpg','Stadio Arena Garibaldi-Romeo Anconetani');



INSERT INTO SQUADRA (
nome_squadra, nome_squadra_per_intero,
anno_fondazione,
citta, stemma_squadra, stadio)
VALUES
('Piacenza','Piacenza Calcio 1919',1919,'Piacenza','Stemma Piacenza.jpg','Stadio Leonardo Garilli'),
('Mantova','Mantova 1911',1911,'Mantova','Stemma Mantova.jpg','Stadio Danilo Martelli');







INSERT INTO SQUADRA (
nome_squadra, nome_squadra_per_intero,
data_fondazione,anno_fondazione,
citta, stemma_squadra, stadio)
VALUES
('Pescara','Delfino Pescara 1936','1936-7-4',1936,'Pescara','Stemma Pescara.jpg','Stadio Adriatico-Giovanni Cornacchia'),
('Lecco','Calcio Lecco 1912','1912-12-22',1912,'Lecco','Stemma Lecco.jpg','Stadio Mario Rigamonti-Mario Ceppi'),
('Spezia','Spezia Calcio','1906-10-10',1906,'La Spezia','Stemma Spezia.jpg','Stadio Alberto Picco'),
('Benevento','Benevento Calcio','1929-9-6',1929,'Benevento','Stemma Benevento.jpg','Stadio Ciro Vigorito'),
('Ternana','Ternana Calcio','1925-10-2',1925,'Terni','Stemma Ternana.jpg','Stadio Libero Liberati');





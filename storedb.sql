-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mag 06, 2016 alle 23:14
-- Versione del server: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `storedb`
--

-- --------------------------------------------------------

--
-- Struttura della tabella `anagrafica`
--

CREATE TABLE IF NOT EXISTS `anagrafica` (
  `ID` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `nome` varchar(30) NOT NULL,
  `cognome` varchar(30) NOT NULL,
  `password` varchar(30) DEFAULT NULL,
  `ruolo` varchar(30) DEFAULT NULL,
  `connected` tinyint(1) NOT NULL DEFAULT '0',
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=27 ;

--
-- Dump dei dati per la tabella `anagrafica`
--

INSERT INTO `anagrafica` (`ID`, `nome`, `cognome`, `password`, `ruolo`, `connected`, `timestamp`) VALUES
(1, 'admin ', '', 'ciao', 'Amministratore', 0, '2016-01-21 21:47:40'),
(21, 'super ', '', 'ciao', 'SuperUser', 0, '2016-03-21 21:47:40'),
(22, 'user1 ', '', 'ciao', 'Utente Registrato', 0, '2016-03-23 11:46:52'),
(23, 'user2 ', '', 'ciao', 'Utente Registrato', 0, '2016-03-24 14:25:56');

-- --------------------------------------------------------

--
-- Struttura della tabella `articoli`
--

CREATE TABLE IF NOT EXISTS `articoli` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `data` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `titolo` varchar(50) NOT NULL,
  `sottotitolo` varchar(100) DEFAULT NULL,
  `testo` varchar(5000) DEFAULT NULL,
  `prezzo` int(11) NOT NULL,
  `foto` varchar(50) DEFAULT NULL,
  `categoria` varchar(30) DEFAULT NULL,
  `status` varchar(30) NOT NULL DEFAULT 'Pubblicato',
  `posti_disponibili` int(11) NOT NULL DEFAULT '250',
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=101 ;

--
-- Dump dei dati per la tabella `articoli`
--

INSERT INTO `articoli` (`ID`, `data`, `titolo`, `sottotitolo`, `testo`, `prezzo`, `foto`, `categoria`, `status`, `posti_disponibili`) VALUES
(20, '2015-10-13 19:31:44', 'La CittÃ  di Carta         ', 'A cura di Marco Nateri', 'Con la partecipazione per la realizzazione di alcuni cittadini Sanluresi\r\n\r\n \r\n\r\nIl progetto nasce da un laboratorio e dallâ€™esigenza di valorizzare la cultura del Comune di Sanluri e del proprio territorio. Attraverso la guida di Marco Nateri, costumista e scenografo di livello internazionale, i cittadini di Sanluri, che hanno partecipato al laboratorio, alla â€œriscopertaâ€ del territorio, hanno realizzato, delle vere e proprie sculture di carta che rappresentano i luoghi e i monumenti piÃ¹ significativi di Sanluri, utilizzando materiali cartacei di riciclo. Le opere resteranno esposte in teatro per tutta la Stagione Zefiro.         ', 0, 'IMG-20150918-WA0001.jpg', NULL, 'Pubblicato', 250),
(69, '2015-10-13 22:09:31', 'EDITH, la Voce dellâ€™Anima    ', 'OffininAcustica', 'Con: Anna Lisa Mameli (voce e recitazione)\r\n\r\nCorrado Aragoni (pianoforte)\r\nRemigio Pili (fisarmonica)\r\n\r\n \r\n\r\nNel centenario della nascita dellâ€™artista, leggenda e icona della musica francese, il suo mito rivive nella nuova produzione di OFFICINACUSTICA : â€œ Edith, la voce dellâ€™animaâ€ Dai sobborghi di Parigi allâ€™Olympia, fino alle tournÃ©e in America, Edith Piaf ha stregato ilmondo con la sua voce â€œinsanguinataâ€, che nemmeno lâ€™alcool e la malattia hanno potuto incrinare.\r\n\r\nEdith Piaf, una vita a voce spiegata, spinta fino allâ€™ultimo respiro. Lo spettacolo Ã¨ un ritratto  musicale  e poetico dellâ€™artista  francese. Eâ€™  una  passeggiata  a  piedi  nudi  per i  marciapiedi  di  Parigi,  alla  ricerca dei  luoghi  dellâ€™anima  che  la  sua  voce e  le  sue  canzoni  hanno  saputo cosÃ¬ bene raccontare, dipingere, illuminare.\r\n \r\n\r\nGenere: Musica e Teatro   ', 5, 'Foto Edith la voce dell''Anima 1.jpg', NULL, 'Pubblica', 250),
(81, '2015-10-13 22:44:51', 'Anime da un Villaggio Scomparso    ', 'Di Abaco Teatro -  Con  Rosalba Piras, Tiziano Polese, Luana Maoddi, Laura Ortu', 'Lo Spettacolo e il video, dedicati alla Sardegna dei dimenticati, affronta il tema dellâ€™estinzione per fame, dovuta allâ€™arroganza umana. Un percorso che fotografa fra le altre storie quelle di  quei sardi sconosciuti e riemersi dallâ€™oblio del tempo grazie ai versi tratti dallâ€™opera â€œMemorare, omaggio ai dimenticatiâ€ di Franco Sonis. Storico e poeta nativo  di Mogoro,  ha concentrato la sua ricerca su Sitzamus, piccolo villaggio della Marmilla,  che sorgeva ai bordi di una palude. Come testimoniato da Atti notarili e da documenti  trovati nellâ€™Archivio Storico di Cagliari, la fine della piccola comunitÃ  fu tragica, infatti venne completamente abbandonata e scomparse dalla faccia della terra alla fine del 1729 a causa dei pesanti tributi feudali imposti dai signorotti spagnoli, dellâ€™endemica  povertÃ , delle carestie e per la grande peste. Lâ€™opera nasce dal desiderio di dar voce a tutte quelle donne e quegli uomini dimenticati dalla storia. Lo spettacolo si conclude infatti con il corto firmato da Giovanni Coda, prodotto da Abaco, e realizzato nei luoghi dove sorgeva Sitzamus.\r\n\r\nImmagini oniriche di tre anime femminili portano indietro nel tempo a scoprire personaggi dimenticati.\r\n\r\n \r\n\r\nGenere â€“ Teatro e Video      ', 8, 'Foto Anime 4.bmp', NULL, 'Pubblicato', 250),
(82, '2015-10-14 14:16:15', 'Polvere di Stelle   ', 'Teatro Dâ€™Inverno', 'Di e con Lucia Dore e Giuseppe Ligios\r\n\r\n \r\n\r\nIspirato al film  â€œPolvere di Stelleâ€, scritto e diretto nel â€˜73 da Alberto Sordi,  â€œPolvere di Stelleâ€ illustra, in un clima prettamente cabarettistico tipico del varietÃ   anni cinquanta, la vita scombinata e precaria di due artisti, Dea Dani e Mimmo Adami, coppia non solo nel teatro ma anche nella vita, che per far fronte alla povertÃ  girano per le piazze delle cittÃ  senza fama nÃ© gloria. Lâ€™allestimento si snoda tra dialoghi canzoni e sketches che rendono omaggio a personaggi, non solo del panorama italiano, che hanno segnato unâ€™epoca.\r\n\r\nDal Quartetto Cetra alla sceneggiata napoletana, dallâ€™eleganza di Edith Piaf fino allâ€™Opera da Tre Soldi di Bertolt Brecht, gli interpreti si cimentano nei ruoli di cantanti, attori e ballerini, strizzando lâ€™occhio agli artisti dai quali prendono Ispirazione.\r\n\r\n \r\n\r\nGenere: VarietÃ    ', 5, 'Foto Polvere di Stelle 4.jpg', NULL, 'Pubblicato', 235),
(83, '2015-10-14 17:40:55', 'Giovanna detta anche primavera   ', 'di Valentino Mannias', 'Produzione Sardegna Teatro con il sostegno della Rete #giovanidee\r\n\r\nCon: Valentino Mannias, Giaime Mannias, Luca Spanu\r\n\r\n \r\n\r\nGiovanna non Ã¨ uno spettacolo ma una storia che mi ha raccontato mia nonna affinchÃ© sposassi la persona giusta, cosÃ¬ la racconto spesso per non sbagliare. Riscoprendo questa funzione antica del teatro, nella trasmissione orale di storie,ho deciso di fare un esperimento con la storia di Giovanna. Cugina di mia nonna, era la sedicenne piÃ¹ bella di Serramanna (il mio paesino) e viveva una storia dâ€™amore fantastica con Paolo, interrotta dalla sua chiamata alle armi per la seconda Guerra Mondiale. Tra gli uomini che tornano dal fronte câ€™Ã¨ Carlo, un ufficiale sulla trentina che vedendo Giovanna se ne innamora e decide arbitrariamente di sposarla. Ma ci sarÃ  il ritorno di Paolo, il pianto negli occhi e nel cuore di lei e il conseguente esodo dalla propria terra per lâ€™impossibilita di continuare a vivere li, il matrimonio con lâ€™ufficiale e iparenti di lui. Quello stesso silenzio di Giovanna Ã¨ sempre stato, per me autore, un segno di identitÃ . Dal gelo che provoca questo silenzio nasce la parola, la musica, il teatro.\r\n\r\n \r\n\r\nGenere: Teatro e Musica   ', 5, 'Foto spett. Giovanna... (Valentino Mannais).jpg', NULL, 'Pubblicato', 250),
(84, '2015-10-14 17:47:25', 'Due rapinatori entrano in... ', '', 'Due rapinatori entrano in gioielleria e iniziano a sparare alla cieca\r\n\r\nDomani i funerali della poveretta ', 10, 'tizivari.png', NULL, 'Pubblicato', 250),
(96, '2015-10-21 12:48:37', 'POLVERE DI STELLE    ', 'Teatro Dâ€™Inverno', 'POLVERE DI STELLE\r\nTeatro Dâ€™Inverno\r\n\r\nDi e con Lucia Dore e Giuseppe Ligios\r\n\r\nÂ \r\n\r\nIspirato al filmÂ  â€œPolvere di Stelleâ€, scritto e diretto nel â€˜73 da Alberto Sordi,Â  â€œPolvere di Stelleâ€ illustra, in un clima prettamente cabarettistico tipico del varietÃ Â  anni cinquanta, la vita scombinata e precaria di due artisti, Dea Dani e Mimmo Adami, coppia non solo nel teatro ma anche nella vita, che per far fronte alla povertÃ  girano per le piazze delle cittÃ  senza fama nÃ© gloria. Lâ€™allestimento si snoda tra dialoghi canzoni e sketches che rendono omaggio a personaggi, non solo del panorama italiano, che hanno segnato unâ€™epoca.\r\n\r\n\r\nDal Quartetto Cetra alla sceneggiata napoletana, dallâ€™eleganza di Edith Piaf fino allâ€™Opera da Tre Soldi di Bertolt Brecht, gli interpreti si cimentano nei ruoli di cantanti, attori e ballerini, strizzando lâ€™ occhio agli artisti dai quali prendono Ispirazione.\r\n\r\nÂ \r\n\r\nGenere: VarietÃ     ', 5, 'Foto Polvere di Stelle 4.jpg', NULL, 'Eliminato', 250),
(97, '2016-03-25 16:35:17', 'Marcia per il mondo  ', 'Lo conquisteremo insieme', 'Marciando si impara  ', 45, 'secondarytile.png', NULL, 'Pubblicato', 250);

-- --------------------------------------------------------

--
-- Struttura della tabella `prenota`
--

CREATE TABLE IF NOT EXISTS `prenota` (
  `utente` int(11) NOT NULL DEFAULT '0',
  `articolo` int(11) NOT NULL DEFAULT '0',
  `num_biglietti` int(11) NOT NULL DEFAULT '0',
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`utente`,`articolo`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dump dei dati per la tabella `prenota`
--

INSERT INTO `prenota` (`utente`, `articolo`, `num_biglietti`, `timestamp`) VALUES
(22, 82, 15, '2016-05-06 18:27:39');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

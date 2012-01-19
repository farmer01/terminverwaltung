-- phpMyAdmin SQL Dump
-- version 3.3.7deb6
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Erstellungszeit: 19. Januar 2012 um 15:10
-- Server Version: 5.1.49
-- PHP-Version: 5.3.3-7+squeeze3

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Datenbank: `qv`
--

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `abschlussart`
--

CREATE TABLE IF NOT EXISTS `abschlussart` (
  `abschlussartID` int(16) NOT NULL,
  `abschlussartbezeichung` varchar(100) NOT NULL,
  PRIMARY KEY (`abschlussartID`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `kaufvertrag`
--

CREATE TABLE IF NOT EXISTS `kaufvertrag` (
  `vertragID` int(16) NOT NULL AUTO_INCREMENT,
  `zahlungsart` int(16) NOT NULL,
  PRIMARY KEY (`vertragID`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `kunde`
--

CREATE TABLE IF NOT EXISTS `kunde` (
  `kundenID` int(16) NOT NULL AUTO_INCREMENT,
  `anrede` varchar(10) NOT NULL,
  `titel` varchar(20) DEFAULT NULL,
  `vorname` varchar(50) NOT NULL,
  `nachname` varchar(50) NOT NULL,
  `strasse` varchar(100) NOT NULL,
  `ort` varchar(100) NOT NULL,
  `plz` varchar(15) NOT NULL,
  `mobil` varchar(20) DEFAULT NULL,
  `festnetz` varchar(20) DEFAULT NULL,
  `beruf` varchar(50) DEFAULT NULL,
  `bemerkung` varchar(1000) DEFAULT NULL,
  PRIMARY KEY (`kundenID`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `produkt`
--

CREATE TABLE IF NOT EXISTS `produkt` (
  `produktID` int(2) NOT NULL,
  `produktname` varchar(50) NOT NULL,
  `preis` int(10) NOT NULL,
  PRIMARY KEY (`produktID`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `quelle`
--

CREATE TABLE IF NOT EXISTS `quelle` (
  `quellenID` int(16) NOT NULL,
  `quellenbezeichnung` varchar(100) NOT NULL,
  PRIMARY KEY (`quellenID`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `termin`
--

CREATE TABLE IF NOT EXISTS `termin` (
  `terminID` int(16) NOT NULL AUTO_INCREMENT,
  `mitarbeiterID` varchar(50) NOT NULL,
  `kundenID` int(16) NOT NULL,
  `terminart` char(1) NOT NULL,
  `termindatum` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `termindauer` int(5) NOT NULL,
  `quelle` int(16) DEFAULT NULL,
  `abschlussart` int(16) DEFAULT NULL,
  `bemerkung` varchar(1000) DEFAULT NULL,
  PRIMARY KEY (`terminID`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `username` varchar(50) NOT NULL,
  `vorname` varchar(50) NOT NULL,
  `nachname` varchar(50) NOT NULL,
  `password` char(32) NOT NULL,
  `access_level` char(1) NOT NULL,
  PRIMARY KEY (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `zahlungsart`
--

CREATE TABLE IF NOT EXISTS `zahlungsart` (
  `zahlungsartID` int(1) NOT NULL,
  `zahlungsartbezeichung` varchar(100) NOT NULL,
  PRIMARY KEY (`zahlungsartID`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

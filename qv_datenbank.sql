-- phpMyAdmin SQL Dump
-- version 3.3.9
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Erstellungszeit: 06. Oktober 2011 um 15:03
-- Server Version: 5.5.8
-- PHP-Version: 5.3.5

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Datenbank: `qv_datenbank`
--

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `abschlussart`
--

CREATE TABLE IF NOT EXISTS `abschlussart` (
  `abschlussart_id` int(16) NOT NULL,
  `abschlussart` varchar(50) NOT NULL,
  PRIMARY KEY (`abschlussart_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Daten für Tabelle `abschlussart`
--


-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `event`
--

CREATE TABLE IF NOT EXISTS `event` (
  `mitarbeiter` int(16) NOT NULL,
  `kunde` int(16) NOT NULL,
  `abschlussart` int(16) NOT NULL,
  `start` date NOT NULL,
  `ende` date NOT NULL,
  `eventID` int(16) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`eventID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Daten für Tabelle `event`
--


-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `kunde`
--

CREATE TABLE IF NOT EXISTS `kunde` (
  `kunden_id` int(16) NOT NULL,
  `vorname` varchar(50) NOT NULL,
  `nachname` varchar(50) NOT NULL,
  `geburtsdatum` date NOT NULL,
  `straße` varchar(75) NOT NULL,
  `ort` varchar(50) NOT NULL,
  `festnetz` varchar(20) NOT NULL,
  `mobil` varchar(20) NOT NULL,
  PRIMARY KEY (`kunden_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Daten für Tabelle `kunde`
--


-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `username` varchar(50) NOT NULL,
  `vorname` varchar(50) NOT NULL,
  `nachname` varchar(50) NOT NULL,
  `password` char(32) NOT NULL,
  `access_level` int(1) NOT NULL,
  PRIMARY KEY (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Daten für Tabelle `user`
--


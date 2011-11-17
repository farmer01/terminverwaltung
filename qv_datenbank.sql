CREATE TABLE IF NOT EXISTS termin(
	terminID int(16) NOT NULL,
	mitarbeiterID int(16) NOT NULL,
	kundenID Int(16) NOT NULL,
	termindatum Timestamp NOT NULL,
	termindauer	Int(5) NOT NULL,
	quelle Int(16),
	abschlussart Int(16),
	bemerkung VARCHAR(1000),
	PRIMARY KEY(terminID)); 
	
CREATE TABLE IF NOT EXISTS kunde(
	kundenID Int(16) PRIMARY KEY,
	anrede VARCHAR(10) NOT NULL,
	titel VARCHAR(20),
	vorname VARCHAR(50) NOT NULL,
	nachname VARCHAR(50) NOT NULL,
	strasse VARCHAR(100) NOT NULL,
	ort VARCHAR(100) NOT NULL,
	plz VARCHAR(15) NOT NULL,
	mobil Varchar(20),
	festnetz Varchar(20),
	beruf Varchar(50),
	bemerkung VARCHAR(1000));
	
CREATE TABLE IF NOT EXISTS kaufvertrag(
	vertragID Int(16) PRIMARY KEY,
	zahlungsart Int(16) NOT NULL);

CREATE TABLE IF NOT EXISTS systembenutzer(
	username Varchar(50) PRIMARY KEY,
	vorname VARCHAR(50) NOT NULL,
	nachname VARCHAR(50) NOT NULL,
	pwd Char(32) NOT NULL,
	access_level Char(1) NOT NULL);

CREATE TABLE IF NOT EXISTS quelle(
	quellenID Int(16) PRIMARY KEY,
	quellenbezeichnung VARCHAR(100) NOT NULL);

CREATE TABLE IF NOT EXISTS abschlussart(
	abschlussartID Int(16) PRIMARY KEY,
	abschlussartbezeichung VARCHAR(100)NOT NULL);

CREATE TABLE IF NOT EXISTS zahlungsart(
	zahlungsartID Int(1) PRIMARY KEY,
	zahlungsartbezeichung VARCHAR(100)NOT NULL);
	
CREATE TABLE IF NOT EXISTS produkt(
	produktID Int(2) PRIMARY KEY,
	produktname Varchar(50) NOT NULL,
	preis Int(10) NOT NULL);


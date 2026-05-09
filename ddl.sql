CREATE TABLE autorzy(
	id int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
    	imie varchar(20),
    	nazwisko varchar(25) NOT NULL
)

CREATE TABLE ksiazki(
	id int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
    	tytul varchar(100) NOT NULL,
)

CREATE TABLE ksiazki_autorzy(
    id int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
    id_autora int(11) NOT NULL,
    id_ksiazki int(11) NOT NULL,
    CONSTRAINT ksiazki_autorzy_autorzy FOREIGN KEY (id_autora) REFERENCES autorzy(id),
    CONSTRAINT ksiazki_autorzy_ksiazki FOREIGN KEY (id_ksiazki) REFERENCES ksiazki(id)
)

CREATE TABLE szczegoloweInformacje(
	id int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
    	id_ksiazki int(11) NOT NULL,
    	isbn varchar(17) NOT NULL,
    	opis varchar(200),
 	okladka varchar(100),
	CONSTRAINT szczegoly_ksiazki FOREIGN KEY (id_ksiazki) REFERENCES ksiazki(id)
)


CREATE TABLE magazyn(
	id int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
    	id_ksiazki int(11) NOT NULL,
    	cena decimal(3,2) NOT NULL,
    	ilosc int,
    	CONSTRAINT ksiazki_magazyn FOREIGN KEY (id_ksiazki) REFERENCES ksiazki(id)
)
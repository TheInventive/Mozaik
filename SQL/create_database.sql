CREATE DATABASE mozaik;
USE mozaik;

CREATE TABLE megyek (
    megyenev VARCHAR(50),
    megyeid INT AUTO_INCREMENT PRIMARY KEY
);

CREATE TABLE varosok (
    varosnev VARCHAR(50),
    varosid INT AUTO_INCREMENT PRIMARY KEY,
    megyeid INT,
    FOREIGN KEY (megyeid)
        REFERENCES megyek (megyeid)
);

insert into megyek (megyenev) Values ("Bács-Kiskun"),
("Baranya"),
("Békés"),
("Borsod-Abaúj-Zemplén"),
("Csongrád"),
("Fejér"),
("Győr-Moson-Sopron"),
("Hajdú-Bihar"),	
("Heves"),
("Jász-Nagykun-Szolnok"),
("Komárom-Esztergom"),
("Nógrád"),
("Pest"),
("Somogy"),
("Szabolcs-Szatmár-Bereg"),
("Tolna"),
("Vas"),
("Veszprém"),
("Zala");

insert into varosok (varosnev, megyeid) values
("Kiskunfélegyháza",1);
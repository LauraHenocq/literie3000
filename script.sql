CREATE DATABASE  IF NOT EXISTS literie3000;

use literie3000;

CREATE TABLE matelas (
    id SMALLINT PRIMARY KEY auto_increment,
    nom VARCHAR(100) not null,
    marque VARCHAR(100) not null,
    poster VARCHAR(250) not null,
    prix INT not null,
    promotion SMALLINT
);

CREATE TABLE dimensions (
    id SMALLINT PRIMARY KEY auto_increment,
    nom VARCHAR(20) not null
);

CREATE TABLE dimensions_matelas (
    dimension_id SMALLINT,
    matela_id SMALLINT,
    PRIMARY KEY (dimension_id, matela_id),
    FOREIGN KEY (dimension_id) REFERENCES dimensions(id),
    FOREIGN KEY (matela_id) REFERENCES matelas(id)
);

INSERT INTO dimensions 
(nom)
VALUES
("90x190"),
("140x190"),
("160x200"),
("180x200"),
("200x200");

INSERT INTO matelas
(nom, marque, poster, prix, promotion)
VALUES
("Matelas Tamoul", "Epeda", "https://www.maisondelaliterie.fr/1531-thickbox_default/contralto.jpg", 529, 230),
("Matelas Waldorf", "Dreamway", "https://www.maisondelaliterie.fr/5534-thickbox_default/goteborg.jpg", 709, 100),
("Matelas Joris", "Bultex", "https://www.maisondelaliterie.fr/1524-category_index/basse.jpg", 529, 230),
("Matelas Melon", "Epeda", "https://www.maisondelaliterie.fr/4437-thickbox_default/toronto.jpg", 509, 510),
("Matelas Dodo", "Dorsoline", "https://www.maisondelaliterie.fr/5571-thickbox_default/kingston.jpg", 609, 100),
("Matelas Pionce", "MemoryLine", "https://www.maisondelaliterie.fr/4203-thickbox_default/lilas.jpg", 509, 100);

INSERT INTO dimensions_matelas 
    (dimension_id, matela_id)
VALUES
(1, 1),
(2, 1),
(3, 1),
(4, 1),
(5, 1),
(1, 2),
(2, 2),
(3, 2),
(4, 2),
(1, 3),
(2, 3),
(1, 4),
(2, 4),
(3, 4),
(4, 4),
(5, 4),
(1, 5),
(2, 5),
(3, 5),
(1, 6),
(2, 6),
(3, 6),
(4, 6);

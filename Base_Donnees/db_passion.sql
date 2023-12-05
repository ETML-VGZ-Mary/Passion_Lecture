/*
* Author : Camille Déglise
* Date : 29.11.2023
* Modification : 05.12.2023 - Insert values 
* Description : File containt the script MySql for creating the data base of the application with somes basics inserts 
* for the authors, the category, the users (one is admin) and some books
*/
DROP DATABASE IF EXISTS db_passion;
CREATE DATABASE db_passion;
USE db_passion; 

CREATE TABLE t_user(
   idUser INT AUTO_INCREMENT,
   login VARCHAR(100) NOT NULL,
   firstName VARCHAR(100) NOT NULL,
   lastName VARCHAR(100) NOT NULL,
   mailAddress VARCHAR(320) NOT NULL,
   birthDate DATE,
   passWord VARCHAR(200) NOT NULL,
   isAdmin BOOLEAN NOT NULL,
   dateInscription DATETIME NOT NULL,
   PRIMARY KEY(idUser)
);

CREATE TABLE t_category(
   idCategory INT AUTO_INCREMENT,
   label VARCHAR(50) NOT NULL,
   PRIMARY KEY(idCategory)
);

CREATE TABLE t_author(
   idAuthor INT AUTO_INCREMENT,
   firstName VARCHAR(150) NOT NULL,
   lastName VARCHAR(150) NOT NULL,
   PRIMARY KEY(idAuthor)
);

CREATE TABLE t_book(
   idBook INT AUTO_INCREMENT,
   title VARCHAR(250) NOT NULL,
   nbPage INT NOT NULL,
   bookExtract VARCHAR(2083) NOT NULL,
   resume TEXT NOT NULL,
   editor VARCHAR(200) NOT NULL,
   yearEdit INT NOT NULL,
   pictureCover VARCHAR(260) NOT NULL,
   idCategory INT NOT NULL,
   idUser INT NOT NULL,
   PRIMARY KEY(idBook),
   FOREIGN KEY(idCategory) REFERENCES t_category(idCategory),
   FOREIGN KEY(idUser) REFERENCES t_user(idUser)
);

CREATE TABLE t_grade(
   idUser INT,
   idBook INT,
   evaluation TINYINT NOT NULL,
   PRIMARY KEY(idUser, idBook),
   FOREIGN KEY(idUser) REFERENCES t_user(idUser),
   FOREIGN KEY(idBook) REFERENCES t_book(idBook)
);

CREATE TABLE t_write(
   idBook INT,
   idAuthor INT,
   PRIMARY KEY(idBook, idAuthor),
   FOREIGN KEY(idBook) REFERENCES t_book(idBook),
   FOREIGN KEY(idAuthor) REFERENCES t_author(idAuthor)
);

INSERT INTO t_author (firstName, lastName)
VALUES 
 ("Emily", "Brontë"),
  ("George", "Orwell"),
  ("J.R.R.", "Tolkien"),
  ("Jane", "Austen"),
  ("Gabriel", "García Márquez"),
  ("J.K.", "Rowling"),
  ("Antoine de", "Saint-Exupéry"),
  ("Fiodor", "Dostoïevski"),
  ("Ray", "Bradbury"),
  ("George", "Bradbury");

INSERT INTO t_category (label)
VALUES 
("Romance"),
("Science-fiction"),
("Fantasy"),
("Polar"),
("Thriller"),
("Historique"),
("Horreur"),
("Biographie"), 
("Jeuness"), 
("Développement personnel"),
("Voyages"),
("Aventure"),
("Bande-Dessinée"),
("Manga"),
("Philosophie"),
("Poésie"),
("Science"),
("Cuisine"),
("Art et photographie");

INSERT INTO t_user(`login`, firstName, lastName, mailAddress, birthDate, `passWord`, isAdmin, dateInscription)
VALUES 
("johndoe", "John", "Doe", "johndoe@example.com", "1998-04-20", "toto", 0, "2023-11-29"),
("brondonadams", "Brondon", "Adams", "brondonadams@example.com", "2003-02-18", "tutu", 1, "2023-11-29");

INSERT INTO t_book (title, nbPage, bookExtract, resume, editor, yearEdit, pictureCover, idCategory, idUser)
VALUES 
("Les Hauts de Hurlevent", 342, "https://www.example.com/excerpt1", "Une histoire passionnante d""amour et de vengeance sur les landes venteuses d""Angleterre.", "Éditions Brontë", 1847, "/var/www/images/fictional_image.jpg", 1, 1 ),
("1984", 298, "https://www.example.com/excerpt2", "Dans un monde dystopique, un homme lutte contre un gouvernement totalitaire obsédé par le contrôle.", "Big Brother Books", 1949, "/var/www/images/fictional_image.jpg", 2, 1),
("Le Seigneur des Anneaux", 1024, "https://www.example.com/excerpt3", "Une épopée fantastique de hobbits, d""anneaux magiques et de batailles épiques pour sauver la Terre du Milieu.", "Middle-earth Press", 1954, "/var/www/images/fictional_image.jpg", 3, 2),
("Orgueil et Préjugés", 426, "https://www.example.com/excerpt4", "Une comédie romantique classique explorant les relations au sein de la haute société anglaise du XIXe siècle.", "Austen Publications", 1813, "/var/www/images/fictional_image.jpg", 1, 2),
("Cent ans de solitude", 368, "https://www.example.com/excerpt5", "L""histoire magique et mystique de la famille Buendía dans la ville fictive de Macondo.", "Solitude Books", 1967, "/var/www/images/fictional_image.jpg", 3, 1),
("Harry Potter à l""école des sorciers", 332, "https://www.example.com/excerpt6", "Les aventures de Harry Potter, un jeune sorcier, à l""école de sorcellerie de Poudlard.", "Sorcerer""s Stone Press", 1997, "/var/www/images/fictional_image.jpg", 9, 2),
("Le Petit Prince", 96, "https://www.example.com/excerpt7", "Les réflexions poétiques d""un petit prince voyageant à travers les planètes.", "Antoine de Saint-Exupéry Éditions", 1943, "/var/www/images/fictional_image.jpg", 15, 1),
("Crime et Châtiment", 576, "https://www.example.com/excerpt8", "L""exploration psychologique d""un crime commis par un étudiant tourmenté à Saint-Pétersbourg.", "Dostoïevski Publishing", 1866, "/var/www/images/fictional_image.jpg", 4, 2),
("Chroniques martiennes", 288, "https://www.example.com/excerpt9", "Une série de récits explorant la colonisation de Mars et ses implications sur la condition humaine.", "Ray Bradbury Press", 1950, "/var/www/images/fictional_image.jpg", 2, 1),
("Fahrenheit 451", 208, "https://www.example.com/excerpt10", "Dans une société future, les livres sont interdits, et les pompiers brûlent toute trace de littérature.", "Bradbury Books", 1953, "/var/www/images/fictional_image.jpg", 2, 1);
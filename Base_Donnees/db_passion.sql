/*
* Author : Camille Déglise
* Date : 29.11.2023
* Modification : --
* Description : File containt the script MySql for creating the data base of the application 
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

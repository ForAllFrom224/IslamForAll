DROP DATABASE IF EXISTS islampourtous ;

CREATE DATABASE islampourtous;
USE islampourtous;

CREATE TABLE users(
    id int primary key auto_increment,
    nom varchar(20) not null, 
    prenom varchar(50),
    email varchar(50) not null,
    mot_de_pass varchar(50),
    date_inscription DATETIME DEFAULT CURRENT_TIMESTAMP()
);

CREATE TABLE questions(
    id int primary key auto_increment,
    question varchar(500),
    date_demande DATETIME DEFAULT CURRENT_TIMESTAMP(),
    id_user int NULL,
    FOREIGN KEY (id_user) REFERENCES users(id)
);

CREATE TABLE answers(
    id int primary key auto_increment,
    id_question int NULL,
    reponse text(10000),
    date_reponse DATETIME DEFAULT  CURRENT_TIMESTAMP(),
    id_user int NULL,
    FOREIGN KEY (id_question) REFERENCES  questions(id),
    FOREIGN KEY (id_user) REFERENCES users(id)
);


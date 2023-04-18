DROP DATABASE IF EXISTS islampourtous ;

CREATE DATABASE islampourtous;
USE islampourtous;

CREATE TABLE users(
    id INT PRIMARY KEY auto_increment,
    nom varchar(20) not null, 
    prenom varchar(50),
    email varchar(50) not null,
    mot_de_pass varchar(50),
    date_inscription DATETIME DEFAULT CURRENT_TIMESTAMP()
);

CREATE TABLE forums(
    id INT PRIMARY KEY AUTO_INCREMENT,
    titre VARCHAR(100),
    date_creation DATETIME DEFAULT CURRENT_TIMESTAMP()
);

CREATE TABLE questions(
    id INT PRIMARY KEY auto_increment,
    question varchar(500),
    date_demande DATETIME DEFAULT CURRENT_TIMESTAMP(),
    id_user INT,
    FOREIGN KEY (id_user) REFERENCES users(id) ON DELETE SET NULL
);

CREATE TABLE answers(
    id INT PRIMARY KEY auto_increment,
    id_question INT,
    reponse TEXT(10000),
    date_reponse DATETIME DEFAULT  CURRENT_TIMESTAMP(),
    id_user INT,
    FOREIGN KEY (id_question) REFERENCES  questions(id) ON DELETE SET NULL,
    FOREIGN KEY (id_user) REFERENCES users(id)
);

-- DROP DATABASE IF EXISTS islampourtous ;

-- CREATE DATABASE islampourtous;
-- USE islampourtous;

-- CREATE TABLE users(
--     id INT PRIMARY KEY auto_increment,
--     nom VARCHAR(20) not null, 
--     prenom VARCHAR(50),
--     email VARCHAR(50) not null,
--     mot_de_pass VARCHAR(50),
--     date_inscription DATETIME DEFAULT CURRENT_TIMESTAMP()
-- );


-- CREATE TABLE questions(
--     id INT PRIMARY KEY auto_increment,
--     question varchar(500),
--     date_demande DATETIME DEFAULT CURRENT_TIMESTAMP(),
-- );

-- CREATE TABLE answers(
--     id INT auto_increment,
--     INT id_question NOT NULL,
--     INT id_user NOT NULL,    
--     reponse TEXT(10000),
--     date_reponse DATETIME DEFAULT  CURRENT_TIMESTAMP(),  
--     CONSTRAINT PK_ans PRIMARY KEY(id_user,id_question)
-- );



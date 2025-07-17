CREATE DATABASE gerenciamento_bibi;

USE gerenciamento_bibi;


CREATE TABLE livros (
    id_livro INT PRIMARY KEY AUTO_INCREMENT,
    titulo VARCHAR(150) NOT NULL,
    autor VARCHAR(100),
    editora VARCHAR(100),
    ano_publicacao YEAR
);


CREATE TABLE revistas (
    id_revista INT PRIMARY KEY AUTO_INCREMENT,
    titulo VARCHAR(150) NOT NULL,
    volume VARCHAR(50),
    numero VARCHAR(50),
    editora VARCHAR(100),
    ano_publicacao YEAR
);

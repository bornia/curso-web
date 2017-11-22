-- Criação do banco de dados do curso de desenvolvimento web.

CREATE DATABASE db_curso_web;

USE db_curso_web;

CREATE TABLE tb_cursos (
	id_curso INT NOT NULL AUTO_INCREMENT,
	nome_curso VARCHAR(100) NOT NULL,
	resumo TEXT NULL,
	data_inicio DATE NOT NULL,
	ativo_sn CHAR(1) NOT NULL DEFAULT "S",
	investimento FLOAT NOT NULL DEFAULT 0,

	PRIMARY KEY (id_curso)
);

-- Criação do banco de dados do curso de desenvolvimento web.
-- Author: Guilherme Bornia Miranda
-- Email: guilhermeborniamiranda@gmail.com
-- Date: 22/11/2017

CREATE DATABASE db_curso_web;

USE db_curso_web;

-- CREATE TABLE
CREATE TABLE tb_cursos (
	id_curso INT NOT NULL AUTO_INCREMENT,
	nome_curso VARCHAR(100) NOT NULL,
	resumo TEXT NULL,
	data_inicio DATE NOT NULL,
	ativo_sn CHAR(1) NOT NULL DEFAULT "S",
	investimento FLOAT NOT NULL DEFAULT 0,

	PRIMARY KEY (id_curso)
);

-- ALTER TABLE
ALTER TABLE tb_cursos ADD COLUMN carga_hora CHAR(4) NULL;
ALTER TABLE tb_cursos CHANGE carga_hora carga_horaria INT NULL;
ALTER TABLE tb_cursos DROP carga_horaria;
ALTER TABLE tb_cursos ADD COLUMN carga_horaria INT NULL;

-- INSERINDO DADO EM TABELA
INSERT INTO tb_cursos(id_curso, nome_curso, resumo, data_inicio, ativo_sn, investimento) VALUES(1, "Curso de HTML", "Desenvolvimento WEB", CURRENT_DATE())

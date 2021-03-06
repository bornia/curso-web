CREATE DATABASE twitter_clone;

USE twitter_clone;

CREATE TABLE usuarios (
	id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
	usuario VARCHAR(50) NOT NULL,
	email VARCHAR(100) NOT NULL,
	senha VARCHAR(32) NOT NULL
);

CREATE TABLE tweet (
	id_tweet INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
	id_usuario INT NOT NULL,
	tweet VARCHAR(140) NOT NULL,
	data_inclusao DATETIME DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE usuarios_seguidores (
	id_usuario_seguidor INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
	id_usuario INT NOT NULL,
	seguindo_id_usuario INT NOT NULL,
	data_registro DATETIME DEFAULT CURRENT_TIMESTAMP
);
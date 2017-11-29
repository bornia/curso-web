-- Relacionamento 1-1

CREATE TABLE tb_funcionarios (
	id_funcionario INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
	matricula VARCHAR(20),
	data_admissao DATETIME,
	idade INT,
	sexo CHAR(1)
);

CREATE TABLE tb_funcionarios_dados_contato (
	id_funcionario_dados_contato INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
	id_funcionario INT NOT NULL,
	telefone_fixo VARCHAR(20),
	telefone_celular VARCHAR(20),

	FOREIGN KEY (id_funcionario) REFERENCES tb_funcionarios(id_funcionario)
);

CREATE TABLE tb_funcionarios_dados_endereco (
	id_funcionario_dados_endereco INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
	id_funcionario INT NOT NULL,
	endereco VARCHAR(100),
	cidade VARCHAR(50),
	bairro VARCHAR(50),
	cep VARCHAR(20),
	uf CHAR(2),

	FOREIGN KEY (id_funcionario) REFERENCES tb_funcionarios(id_funcionario)
);

alter table tb_funcionarios add column nome varchar(100);

INSERT INTO tb_funcionarios (data_admissao,idade,matricula,nome,sexo) VALUES
("2016-07-13",19,"1672","Fernando Silva", "M"),
("2016-11-09",25,"1805","Maria Rosa", "F"),
("2016-04-14",34,"1953","Carlos Alberto", "M"),
("2016-09-03",23,"1691","Henrique Oliveira", "M"),
("2016-09-22",49,"1159","Juliana Torres", "F"),
("2015-06-10",38,"1089","Marcos Lopes", "M"),
("2016-10-30",33,"1475","Bruno Alencar", "M"),
("2016-10-15",39,"1948","Eliana Rocha", "F"),
("2016-07-31",56,"1577","Júlio Cruz", "M"),
("2015-08-17",47,"1381","Fátima Santana", "F");

INSERT INTO tb_funcionarios_dados_contato (id_funcionario, telefone_celular, telefone_fixo) VALUES
(1, "1195533-3355", "113362-2236"),
(10, "1199933-3665", "115566-2236"),
(3, "1196578-2542", "115485-5566"),
(6, "1198754-6541", "113321-6654"),
(8, "1195533-3547", "113335-2547"),
(4, "1193697-7412", "113367-4236"),
(2, "1196593-4565", "115756-8485"),
(7, "1197777-4433", "113777-2278"),
(9, "1197853-3355", "115362-5678"),
(5, "1194578-3254", "113462-5536");

INSERT INTO tb_funcionarios_dados_endereco (id_funcionario, endereco, bairro, cidade, cep, uf) VALUES
(4, "Rua dos autonomistas", "Jd Conceição", "São Paulo", "03355-045", "SP"),
(3, "Rua Dr. Arnaldo", "Parque Fortes", "Alto Rio Doce", "00348-500", "MG"),
(7, "Avenida Glória", "São Tomé das Letras", "Cuiabá", "66633-148", "MT"),
(1, "Rua das flores", "Jd Amélia", "São Paulo", "04848-048", "SP"),
(10, "Rua Alencar de Souza", "Sítio açu", "Caicó", "33001-000", "RN"),
(5, "Avenida Guararapes", "Cruzeiro do Sul", "Curitiba", "15435-222", "PR"),
(2, "Avenida dos caçadores", "Santa Luz", "Rio de Janeiro", "03520-001", "RJ"),
(8, "Avenida Esperança", "Goiânia", "Goiânia", "04558-010", "GO"),
(6, "Rua dos Vingadores", "Santo Amaro", "São Paulo", "55634-001", "SP"),
(9, "Rua Aclimação", "Abaré", "Salvador", "00133-333", "BA");

-- SELECT com LEFT JOIN

-- Une as informações de todas as tabelas em uma única tabela
SELECT * FROM tb_funcionarios AS f
LEFT JOIN tb_funcionarios_dados_contato as fc
	ON (f.id_funcionario = fc.id_funcionario)
LEFT JOIN tb_funcionarios_dados_endereco as fe
	ON (f.id_funcionario = fe.id_funcionario);

-- Filtra as informações de todas as tabelas e as mostra em uma única
SELECT f.nome, f.matricula, fc.telefone_fixo, fc.telefone_celular, fe.endereco, fe.uf FROM tb_funcionarios AS f
LEFT JOIN tb_funcionarios_dados_contato as fc
        ON (f.id_funcionario = fc.id_funcionario)
LEFT JOIN tb_funcionarios_dados_endereco as fe
        ON (f.id_funcionario = fe.id_funcionario);

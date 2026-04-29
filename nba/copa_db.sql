CREATE DATABASE IF NOT EXISTS copa_db;
USE copa_db ;

CREATE TABLE IF NOT EXISTS selecoes(
	id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100) NOT NULL,
    grupo VARCHAR(100) NOT NULL,
    titulos INT NOT NULL,
	criado_em DATETIME DEFAULT CURRENT_TIMESTAMP
    
);

SELECT * FROM selecoes;


ALTER TABLE selecoes MODIFY COLUMN titulos VARCHAR(255);

ALTER TABLE selecoes ADD COLUMN bandeira VARCHAR(500) AFTER titulos;

DESCRIBE selecoes;

ALTER TABLE selecoes ADD UNIQUE (nome);

CREATE TABLE jogadores (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100) NOT NULL,
    posicao VARCHAR(50) NOT NULL,
    numero_camisa INT NOT NULL,
    selecao_id INT NOT NULL,
    FOREIGN KEY (selecao_id) REFERENCES selecoes(id)
        ON DELETE CASCADE
        ON UPDATE CASCADE
);

DROP TABLE IF EXISTS jogadores;
DROP TABLE IF EXISTS selecoes;

CREATE TABLE selecoes (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100) NOT NULL UNIQUE,
    conferencia VARCHAR(100) NOT NULL,
    divisao VARCHAR(100) NOT NULL,
    titulos INT NOT NULL DEFAULT 0,
    bandeira VARCHAR(500),
    criado_em DATETIME DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE jogadores (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100) NOT NULL,
    posicao VARCHAR(50) NOT NULL,
    numero_camisa INT NOT NULL,
    selecao_id INT NOT NULL,
    FOREIGN KEY (selecao_id) REFERENCES selecoes(id)
        ON DELETE CASCADE
        ON UPDATE CASCADE
);

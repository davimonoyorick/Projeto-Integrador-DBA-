BANCO DE DADOS: 

CREATE DATABASE banco_de_sangue;
USE banco_de_sangue;

-- Tabela pessoal
CREATE TABLE pessoal (
    id INT AUTO_INCREMENT PRIMARY KEY,
    first_name VARCHAR(50) NOT NULL,
    last_name VARCHAR(50) NOT NULL,
    data_nascimento VARCHAR(10) NOT NULL,
    tipo_sangue VARCHAR(5) NOT NULL,
	sexo varchar(50) NOT NULL,
    data_envio TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
-- Tabela contato_pessoal
CREATE TABLE contato_pessoal (
    id INT AUTO_INCREMENT PRIMARY KEY,
    doador_id INT NOT NULL,
    phone VARCHAR(20) NOT NULL,
    email VARCHAR(100) NOT NULL,
    FOREIGN KEY (doador_id) REFERENCES pessoal(id)
);
-- Tabela identidade
CREATE TABLE identidade (
    id INT AUTO_INCREMENT PRIMARY KEY,
    doador_id INT NOT NULL,
    rg VARCHAR(20) NOT NULL,
    cpf VARCHAR(20) NOT NULL,
    FOREIGN KEY (doador_id) REFERENCES pessoal(id)
);

CREATE TABLE funcionario(
id int auto_increment primary key,
nome varchar(100) not null,
email varchar(255) not null unique,
senha varchar(20) not null
);

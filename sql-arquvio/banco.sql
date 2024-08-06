CREATE DATABASE banco_de_sangue_01;
USE banco_de_sangue_01;

-- Tabela pessoal
CREATE TABLE pessoal (
    id INT AUTO_INCREMENT PRIMARY KEY,
    first_name VARCHAR(50) NOT NULL,
    last_name VARCHAR(50) NOT NULL,
    data_nascimento VARCHAR(10) NOT NULL,
    tipo_sangue VARCHAR(5) NOT NULL,
    sexo VARCHAR(50) NOT NULL,
    peso DECIMAL(5,2), -- Novo campo
    altura DECIMAL(5,2), -- Novo campo
    historico_medico TEXT, -- Novo campo
    consentimento TINYINT(1) DEFAULT 0, -- Novo campo
    data_envio TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    email varchar(255) not null unique,
    senha varchar(20)
);

insert into pessoal(first_name,last_name,data_nascimento,tipo_sangue,sexo,email,senha)value
("mateus","monteiro","15/05/1998","A","Masculino","mateus@gmail.com","mateus123");


-- Tabela contato_pessoal
CREATE TABLE contato_pessoal (
    id INT AUTO_INCREMENT PRIMARY KEY,
    doador_id INT NOT NULL,
    phone VARCHAR(20) NOT NULL,
    phone_secundario VARCHAR(20), -- Novo campo
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

-- Tabela funcionario
CREATE TABLE funcionario (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100) NOT NULL,
    email VARCHAR(255) NOT NULL UNIQUE,
    senha VARCHAR(255) NOT NULL,
    ultimo_acesso TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);


INSERT INTO funcionario(nome, email, senha) VALUES
("admin", "admin@gmail.com", "123");

INSERT INTO funcionario(nome,email,senha)VALUES
("Davi","davi@gmail.com","davi123");


select * from funcionario;
select * from pessoal;

select * from contato_pessoal;
select * from identidade;
CREATE DATABASE locadora;

USE locadora;

CREATE TABLE cliente (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(150) NOT NULL,
    cpf VARCHAR(14) NOT NULL UNIQUE,
    cnh VARCHAR(20) NOT NULL UNIQUE,
    telefone VARCHAR(20),
    email VARCHAR(150)
);

CREATE TABLE carro (
    id INT AUTO_INCREMENT PRIMARY KEY,
    marca VARCHAR(80) NOT NULL,
    modelo VARCHAR(80) NOT NULL,
    placa VARCHAR(10) NOT NULL UNIQUE,
    categoria VARCHAR(50) NOT NULL,
    valor_diaria DECIMAL(10, 2) NOT NULL,
    status VARCHAR(20) NOT NULL DEFAULT 'disponivel'
);

CREATE TABLE locacao (
    id INT AUTO_INCREMENT PRIMARY KEY,
    cliente_id INT NOT NULL,
    carro_id INT NOT NULL,
    data_inicio DATE NOT NULL,
    data_fim DATE NOT NULL,
    valor_total DECIMAL(10, 2) NOT NULL,
    status VARCHAR(20) NOT NULL DEFAULT 'aberta',

    FOREIGN KEY (cliente_id) REFERENCES cliente(id),
    FOREIGN KEY (carro_id) REFERENCES carro(id)
);

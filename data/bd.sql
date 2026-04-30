CREATE DATABASE studioflow;

USE studioflow;

CREATE TABLE cliente (
    id_cliente INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100) NOT NULL,
    contato_cliente VARCHAR(20) NOT NULL,
    data_nasc DATE NOT NULL
);

CREATE TABLE profissional (
    id_profissional INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100) NOT NULL,
    contato_prof VARCHAR(20) NOT NULL,
    email VARCHAR(100) NOT NULL UNIQUE,
    senha VARCHAR(255) NOT NULL,
    especialidade VARCHAR(255) NOT NULL,
    status_profissional ENUM('ativo', 'inativo') DEFAULT 'ativo'
);

CREATE TABLE servicos (
    id_servicos INT AUTO_INCREMENT PRIMARY KEY,
    tipo_servico ENUM('tatuagem', 'piercing') NOT NULL,
    estilo ENUM('fineline','realista','old_school','flash_tattoo','anime','lettering','blackout','cobertura'),
    regiao VARCHAR(50) NOT NULL
);

CREATE TABLE agendamento (
    id_agendamento INT AUTO_INCREMENT PRIMARY KEY,
    id_cliente INT NOT NULL,
    id_profissional INT NOT NULL,
    id_servicos INT NOT NULL,
    data_agen DATE NOT NULL,
    horario TIME NOT NULL,
    status_agendamento ENUM('pendente', 'confirmado', 'cancelado', 'finalizado') 
        DEFAULT 'pendente',

    FOREIGN KEY (id_cliente) REFERENCES cliente(id_cliente),
    FOREIGN KEY (id_profissional) REFERENCES profissional(id_profissional),
    FOREIGN KEY (id_servicos) REFERENCES servicos(id_servicos)
);
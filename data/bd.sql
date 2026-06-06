CREATE DATABASE studioflow;

USE studioflow;

CREATE TABLE cliente (
    id_cliente INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100) NOT NULL,
    contato_cliente VARCHAR(11) NOT NULL,
    data_nasc DATE NOT NULL
);

CREATE TABLE profissional (
    id_profissional INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100) NOT NULL,
    contato_prof VARCHAR(11) NOT NULL,
    email VARCHAR(100) NOT NULL UNIQUE,
    senha VARCHAR(255) NOT NULL,
    especialidade VARCHAR(255) NOT NULL,
    status_profissional ENUM('ativo', 'inativo') DEFAULT 'ativo'
);

CREATE TABLE servicos (
    id_servicos INT AUTO_INCREMENT PRIMARY KEY,
    tipo_servico ENUM('tatuagem', 'piercing') NOT NULL,
    estilo ENUM('fineline','realista','old_school','flash_tattoo','anime','lettering','blackout','cobertura'),
    regiao VARCHAR(20) NOT NULL,
    quantidade INT
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

/*INSERTS*/

-- ADMIN
INSERT INTO profissional (nome, contato_prof, email, senha, especialidade, status_profissional) VALUES
('Admin', '11987546321 ', 'admin@studioflow.com', 'admin123', 'Administrador', 'ativo');

-- CLIENTES
INSERT INTO cliente (nome, contato_cliente, data_nasc) VALUES
('Davi Xavier', '11954321098', '1997-01-18'),
('Giovanna Rodrigues', '11921098765', '1999-12-20'),
('Kauany Oliveira', '11877665544', '1998-10-03'),
('Paulo Henrique', '11722110099', '1994-11-29');


-- PROFISSIONAIS
INSERT INTO profissional (nome, contato_prof, email, senha, especialidade, status_profissional) VALUES
('Carlos Ink', '11990001111', 'carlos@studioflow.com', '123456', 'Realismo', 'ativo'),
('Julia Tattoo', '11990002222', 'julia@studioflow.com', '123456', 'Fineline', 'ativo'),
('Marcos Piercer', '11990003333', 'marcos@studioflow.com', '123456', 'Piercing Corporal', 'ativo'),
('Fernanda Art', '11990004444', 'fernanda@studioflow.com', '123456', 'Anime', 'ativo');

-- SERVIÇOS
INSERT INTO servicos (tipo_servico, estilo, regiao, quantidade) VALUES
('tatuagem', 'fineline', 'Antebraço', 1),
('tatuagem', 'realista', 'Costas', 1),
('piercing', NULL, 'Orelha', 2),
('tatuagem', 'anime', 'Braço', 1);

-- AGENDAMENTOS
INSERT INTO agendamento
(id_cliente, id_profissional, id_servicos, data_agen, horario, status_agendamento)
VALUES
(1, 2, 1, '2026-06-01', '10:00:00', 'confirmado'),
(2, 1, 2, '2026-06-02', '14:00:00', 'pendente'),
(3, 3, 3, '2026-06-03', '11:00:00', 'confirmado'),
(4, 4, 4, '2026-06-04', '15:00:00', 'finalizado');
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

-- CLIENTES
INSERT INTO cliente (nome, contato_cliente, data_nasc) VALUES
('Ana Souza', '11987654321', '1998-03-15'),
('Bruno Lima', '11976543210', '1995-07-22'),
('Carla Mendes', '11965432109', '2000-11-05'),
('Davi Xavier', '11954321098', '1997-01-18'),
('Eduarda Silva', '11943210987', '2002-09-30'),
('Felipe Rocha', '11932109876', '1994-06-11'),
('Giovanna Rodrigues', '11921098765', '1999-12-20'),
('Henrique Martins', '11910987654', '1996-08-14'),
('Isabela Ferreira', '11899887766', '2001-05-09'),
('João Pedro', '11888776655', '1993-04-27'),
('Kauany Oliveira', '11877665544', '1998-10-03'),
('Lucas Santos', '11866554433', '2000-02-17'),
('Mariana Ribeiro', '11855443322', '1997-07-25'),
('Nicolas Gomes', '11844332211', '1995-09-12'),
('Olivia Teixeira', '11833221100', '2001-01-08'),
('Paulo Henrique', '11722110099', '1994-11-29'),
('Quezia Almeida', '11711009988', '1999-06-16'),
('Rafael Barros', '11600998877', '1996-03-21'),
('Sabrina Lopes', '11599887766', '2002-08-04'),
('Thiago Moreira', '11488776655', '1998-12-13');

-- PROFISSIONAIS
INSERT INTO profissional (nome, contato_prof, email, senha, especialidade, status_profissional) VALUES
('Carlos Ink', '11990001111', 'carlos@studioflow.com', '123456', 'Realismo', 'ativo'),
('Julia Tattoo', '11990002222', 'julia@studioflow.com', '123456', 'Fineline', 'ativo'),
('Marcos Piercer', '11990003333', 'marcos@studioflow.com', '123456', 'Piercing Corporal', 'ativo'),
('Fernanda Art', '11990004444', 'fernanda@studioflow.com', '123456', 'Anime', 'ativo'),
('Ricardo Black', '11990005555', 'ricardo@studioflow.com', '123456', 'Blackout', 'ativo'),
('Amanda Cover', '11990006666', 'amanda@studioflow.com', '123456', 'Cobertura', 'ativo'),
('Pedro Flash', '11990007777', 'pedro@studioflow.com', '123456', 'Flash Tattoo', 'ativo'),
('Bianca Letter', '11990008888', 'bianca@studioflow.com', '123456', 'Lettering', 'ativo'),
('Lucas Real', '11990009999', 'lucas@studioflow.com', '123456', 'Realismo', 'ativo'),
('Camila Fine', '11991110000', 'camila@studioflow.com', '123456', 'Fineline', 'ativo'),
('Gustavo Ink', '11992221111', 'gustavo@studioflow.com', '123456', 'Old School', 'ativo'),
('Larissa Art', '11993332222', 'larissa@studioflow.com', '123456', 'Anime', 'ativo'),
('Mateus Piercer', '11994443333', 'mateus@studioflow.com', '123456', 'Piercing Facial', 'ativo'),
('Patricia Tattoo', '11995554444', 'patricia@studioflow.com', '123456', 'Lettering', 'ativo'),
('Roberto Black', '11996665555', 'roberto@studioflow.com', '123456', 'Blackout', 'inativo'),
('Vanessa Cover', '11997776666', 'vanessa@studioflow.com', '123456', 'Cobertura', 'ativo'),
('Tiago Flash', '11998887777', 'tiago@studioflow.com', '123456', 'Flash Tattoo', 'ativo'),
('Bruna Fine', '11999998888', 'bruna@studioflow.com', '123456', 'Fineline', 'ativo'),
('Eduardo Real', '11888889999', 'eduardo@studioflow.com', '123456', 'Realismo', 'ativo'),
('Nicole Piercer', '11777778888', 'nicole@studioflow.com', '123456', 'Piercing Corporal', 'ativo');

-- SERVIÇOS
INSERT INTO servicos (tipo_servico, estilo, regiao, quantidade) VALUES
('tatuagem', 'fineline', 'Antebraço', 1),
('tatuagem', 'realista', 'Costas', 1),
('piercing', NULL, 'Orelha', 2),
('tatuagem', 'anime', 'Braço', 1),
('tatuagem', 'old_school', 'Perna', 1),
('piercing', NULL, 'Nariz', 1),
('tatuagem', 'lettering', 'Pulso', 1),
('tatuagem', 'blackout', 'Braço Fechado', 1),
('piercing', NULL, 'Umbigo', 1),
('tatuagem', 'flash_tattoo', 'Tornozelo', 1),
('tatuagem', 'cobertura', 'Ombro', 1),
('piercing', NULL, 'Lábio', 1),
('tatuagem', 'realista', 'Peito', 1),
('tatuagem', 'fineline', 'Costela', 1),
('piercing', NULL, 'Sobrancelha', 1),
('tatuagem', 'anime', 'Panturrilha', 1),
('tatuagem', 'lettering', 'Pescoço', 1),
('piercing', NULL, 'Mamilo', 2),
('tatuagem', 'old_school', 'Coxa', 1),
('tatuagem', 'flash_tattoo', 'Mão', 1);

-- AGENDAMENTOS
INSERT INTO agendamento
(id_cliente, id_profissional, id_servicos, data_agen, horario, status_agendamento)
VALUES
(1, 2, 1, '2026-06-01', '10:00:00', 'confirmado'),
(2, 1, 2, '2026-06-02', '14:00:00', 'pendente'),
(3, 3, 3, '2026-06-03', '11:00:00', 'confirmado'),
(4, 4, 4, '2026-06-04', '15:00:00', 'finalizado'),
(5, 5, 5, '2026-06-05', '09:00:00', 'confirmado'),
(6, 13, 6, '2026-06-06', '16:00:00', 'pendente'),
(7, 8, 7, '2026-06-07', '13:30:00', 'finalizado'),
(8, 15, 8, '2026-06-08', '17:00:00', 'cancelado'),
(9, 20, 9, '2026-06-09', '10:30:00', 'confirmado'),
(10, 7, 10, '2026-06-10', '14:30:00', 'pendente'),
(11, 6, 11, '2026-06-11', '11:30:00', 'confirmado'),
(12, 3, 12, '2026-06-12', '15:30:00', 'finalizado'),
(13, 9, 13, '2026-06-13', '09:30:00', 'confirmado'),
(14, 10, 14, '2026-06-14', '16:30:00', 'pendente'),
(15, 13, 15, '2026-06-15', '12:00:00', 'confirmado'),
(16, 12, 16, '2026-06-16', '18:00:00', 'finalizado'),
(17, 14, 17, '2026-06-17', '10:00:00', 'cancelado'),
(18, 20, 18, '2026-06-18', '14:00:00', 'confirmado'),
(19, 11, 19, '2026-06-19', '13:00:00', 'pendente'),
(20, 17, 20, '2026-06-20', '15:00:00', 'confirmado');
DROP DATABASE IF EXISTS codeigniter;

CREATE DATABASE codeigniter;

\c codeigniter;

CREATE TABLE setor (
    id serial primary key,
    nome text not null,
    email text,
    endereco text,
    telefone text
);

INSERT INTO setor (nome) VALUES 
('SAÚDE'), 
('COMIDA');

CREATE TABLE usuario (
    id serial primary key,
    nome text not null,
    email text not null,
    senha text not null,
    eh_admin integer DEFAULT 0,
    setor_id integer references setor (id),
    unique (email)
);
INSERT INTO usuario (nome, email, senha, setor_id, eh_admin) VALUES 
('JOÃO', 'joao@joao.com', md5('123'), 1, 1);

INSERT INTO usuario (nome, email, senha, setor_id, eh_admin) VALUES 
('JOSÉ', 'jose@jose.com', md5('123'), 1, 0);

CREATE TABLE pessoa (
    id serial primary key,
    nome text,
    data_nascimento date,
    sexo character(1),
    cpf character(11),
    rg text,
    rua text,
    numero text,
    bairro text,
    complemento text,
    cep text,
    foto text
);

INSERT INTO pessoa (nome) VALUES 
('Pedro');

CREATE TABLE documento (
    id serial primary key,
    nome text,
    arquivo text NOT NULL,
    pessoa_id integer references pessoa (id) ON DELETE CASCADE
);

CREATE TABLE atendimento (
    id serial primary key,
    data_hora timestamp default current_timestamp,
    observacao text,
    usuario_id integer references usuario (id),
    pessoa_id integer references pessoa (id) ON DELETE CASCADE
);

CREATE TABLE arquivo (
    id serial primary key,
    nome text,
    arquivo text NOT NULL,
    atendimento_id integer references atendimento (id) ON DELETE CASCADE
);

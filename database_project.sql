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


CREATE TABLE usuario (
    id serial primary key,
    nome text not null,
    email text not null,
    senha text not null,
    setor_id integer references setor (id),
    unique (email)
);

CREATE TABLE perfil (
    id serial primary key,
    nome text not null,
    adicionar boolean DEFAULT FALSE,
    visualizar boolean DEFAULT FALSE,
    editar boolean DEFAULT FALSE,
    remover boolean DEFAULT FALSE,
);

CREATE TABLE usuario_perfil (
    usuario_id integer references usuario (id),
    perfil_id integer references perfil (id),
    primary key (usuario_id, perfil_id)
);

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

CREATE TABLE pessoa_arquivo (
    id serial primary key,
    nome text,
    arquivo text,
    pessoa_id integer references pessoa (id)
);

CREATE TABLE atendimento (
    id serial primary key,
    data_hora timestamp default current_timestamp,
    observacao text,
    usuario_id integer references usuario (id),
    pessoa_id integer references pessoa (id)
);

CREATE TABLE atendimento_arquivo (
    id serial primary key,
    nome text,
    arquivo text,
    atendimento_id integer references atendimento (id)
);

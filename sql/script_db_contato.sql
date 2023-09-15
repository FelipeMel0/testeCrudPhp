create database db_contato;
use db_contato;

create table tbl_contato (
	id_contato int not null auto_increment,
    nome varchar(200) not null,
    data_nascimento date not null,
    email varchar(200) not null,
    profissao varchar(200) not null,
    telefone_contato varchar(200),
    celular_contato varchar(200) not null,
    celular_tem_whatsapp boolean not null,
    notificacoes_email boolean not null,
    notificacoes_sms boolean not null,
    PRIMARY KEY (`id_contato`),
	UNIQUE INDEX `id_contato_UNIQUE` (`id_contato` ASC) VISIBLE);
    SELECT * FROM tbl_contato WHERE id_contato = 1;

insert into tbl_contato (nome, data_nascimento, email, profissao, telefone_contato, celular_contato, celular_tem_whatsapp, notificacoes_email, notificacoes_sms) values ('Thomas Costa', '1992-11-29', 'thomas@gmail.com', 'Desenvolvedor Mobile', '(11)2048-7896','(11)91500-2077', 1, 1, 0);

    
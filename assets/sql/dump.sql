create table if not exists aluno (
	id_aluno integer not null auto_increment,
	nome_aluno varchar(50) not null,
	nome_usuario varchar(20) not null,
	email_aluno varchar(50) not null unique,
	senha varchar(64) not null, -- bcrypt, SHA-256
	data_cadastro date not null,
	status boolean,
	primary key (id_aluno)
) default charset = utf8

create table if not exists perfil_se (
	id_perfilse integer not null,
	id_aluno integer not null,
	ano_nascimento year(4) not null,
	sexo ENUM('Feminino', 'Masculino', 'Prefiro não informar') not null,
	etnia ENUM('Branco', 'Preto', 'Pardo', 'Amarelo', 'Indígena') not null,
	tipo_instituicao varchar(10) not null,
	ano_escolar varchar(10) not null,
	opiniao_desempenho boolean,
	primary key (id_perfilse),
	constraint fk_aluno_perfilse foreign key (id_aluno) references aluno (id_aluno)
) default charset = utf8
;
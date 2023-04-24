create table if not exists student (
	id_student integer not null auto_increment,
	student_name varchar(35) not null,
	user_name varchar(20) not null,
	email_student varchar(50) not null unique,
	password varchar(64) not null,
	registration_date date not null,
	email_status boolean,
	primary key (id_student)
) default charset = utf8;

create table if not exists profile_se (
	id_profilese integer not null,
	id_student integer not null,
	birth_year year(4) not null,
	sex ENUM('Feminino', 'Masculino', 'Não-binário', 'Prefiro não informar') not null,
	ethnicity ENUM('Branco', 'Preto', 'Pardo', 'Amarelo', 'Indígena') not null,
	institution_type varchar(10) not null,
	school_year varchar(10) not null,
	performance_opinion boolean,
	primary key (id_profilese),
	constraint fk_student_profilese foreign key (id_student) references student (id_student)
) default charset = utf8;

create table if not exists teacher (
	id_teacher integer not null,
	teacher_name varchar(50) not null,
	teacher_surname varchar(20) null,
	email_teacher varchar(50) not null unique,
	password varchar(64) not null,
	primary key (id_teacher)
) default charset = utf8;

create table if not exists activities (
	id_activity integer not null auto_increment,
	notebook tinyint unsigned not null,
	sequence tinyint unsigned not null,
	activity tinyint unsigned not null,
	item varchar(2) null,
	parameters json null, 
	primary key (id_activity)
) default charset = utf8;

/*

create table if not exists depara_elemento (
	cod_elemento tinyint unsigned not null,
	elemento varchar(100) not null,
	primary key (cod_elemento)
) default charset = utf8;

insert into depara_elemento values (101, 'Figura');
insert into depara_elemento values (102, 'Fração');
insert into depara_elemento values (103, 'Conjunto de Figuras');
insert into depara_elemento values (104, 'Conjunto Contornado de Figuras Sólidas');
insert into depara_elemento values (105, 'Conjunto e Subconjunto de Figuras Sólidas');
insert into depara_elemento values (106, 'Subconjunto e Contorno');
insert into depara_elemento values (107, 'Linha Segmentada');
insert into depara_elemento values (108, 'Linha com Segmento Destacado');
insert into depara_elemento values (109, 'Conjunto de Frações');
insert into depara_elemento values (110, 'Linha Segmentada e Retângulo Isomorfo Destacado');
insert into depara_elemento values (111, 'Conjunto de Figuras Sólidas');
insert into depara_elemento values (112, 'Fração e Linha Segmentada Equivalente');
insert into depara_elemento values (113, 'Fração Imprópria');
insert into depara_elemento values (114, 'Fração Mista');
insert into depara_elemento values (115, 'Figura e Fração Equivalente');
insert into depara_elemento values (116, 'Subconjunto Contornado de Figuras Sólidas');
insert into depara_elemento values (117, 'Conjunto de Frações por Extenso');
insert into depara_elemento values (118, 'Conjunto de Pontos');
insert into depara_elemento values (119, 'Conjunto de Frações e Lacuna');
insert into depara_elemento values (120, 'Conjunto Resultante e Fração');
insert into depara_elemento values (121, 'Régua Segmentada');
insert into depara_elemento values (122, 'Lacuna');

create table if not exists depara_exercicio (
	cod_exercicio tinyint unsigned not null,
	exercicio varchar(100) not null,
	primary key (cod_exercicio)
) default charset = utf8;

insert into depara_exercicio values (101, 'Preencher Fração');
insert into depara_exercicio values (102, 'Hachurar Figura');
insert into depara_exercicio values (103, 'Associar');
insert into depara_exercicio values (104, 'Associar e Preencher Fração');
insert into depara_exercicio values (105, 'Contar Figuras Sólidas por Conjunto');
insert into depara_exercicio values (106, 'Contar Figuras Sólidas por Conjunto e por Tipo');
insert into depara_exercicio values (107, 'Preencher Subconjuntos de Acordo com Fração');
insert into depara_exercicio values (108, 'Contornar Subconjuntos de Acordo com Fração');
insert into depara_exercicio values (109, 'Preencher Fração de Acordo com a Relação Subconjunto-conjunto');
insert into depara_exercicio values (110, 'Preencher o Contorno com Subconjuntos de Acordo com a Fração');
insert into depara_exercicio values (111, 'Dividir e Hachurar Figuras');
insert into depara_exercicio values (112, 'Contornar Pontos');
insert into depara_exercicio values (113, 'Contornar Pontos e Preencher Fração');
insert into depara_exercicio values (114, 'Preencher Frações por Tipo e Lacuna com o Total');
insert into depara_exercicio values (115, 'Hachurar Figuras e Preencher Fração');
insert into depara_exercicio values (116, 'Somar Frações');
insert into depara_exercicio values (117, 'Somar Frações e Preencher Linha Segmentada');
insert into depara_exercicio values (118, 'Subtrair Frações');
insert into depara_exercicio values (119, 'Subtrair Frações e Preencher Linha Segmentada');
insert into depara_exercicio values (120, 'Preencher Fração Mista');
insert into depara_exercicio values (121, 'Preencher Fração Mista e Fração por Extenso');
insert into depara_exercicio values (122, 'Preencher Lacunas e Fração Mista');
insert into depara_exercicio values (123, 'Hachurar Figuras e Circular Sinal da Desigualdade');
insert into depara_exercicio values (124, 'Selecionar Desigualdade');
insert into depara_exercicio values (125, 'Conjunto de Frações');
insert into depara_exercicio values (126, 'Seccionar e Hachurar as Figuras e Circular Sinal da Desigualdade');
insert into depara_exercicio values (127, 'Associar e Selecionar Desigualdades');

*/
create table if not exists student (
	id_student integer not null auto_increment,
	student_name varchar(35) not null,
	username varchar(20) not null unique,
	email_student varchar(50) not null unique,
	password varchar(64) not null,
	registration_date date not null,
	email_status boolean,
	primary key (id_student)
) default charset = utf8;

create table if not exists profile_se (
	id_profilese integer not null auto_increment,
	id_student integer not null,
	birth_year year(4) not null,
	sex ENUM('Feminino', 'Masculino', 'Não-binário', 'Prefiro não informar') not null,
	ethnicity ENUM('Branco', 'Preto', 'Pardo', 'Amarelo', 'Indígena') not null,
	institution_type varchar(30) not null,
	school_year varchar(30) not null,
	performance_opinion integer not null,
	primary key (id_profilese),
	constraint fk_student_profilese foreign key (id_student) references student (id_student)
) default charset = utf8;

create table if not exists teacher (
	id_teacher integer not null auto_increment,
	teacher_name varchar(35) not null,
	surname varchar(20) null,
	username varchar(20) not null unique,
	email_teacher varchar(50) not null unique,
	password varchar(64) not null,
	registration_date date not null,
	email_status boolean,
	primary key (id_teacher)
) default charset = utf8;

create table if not exists activities (
	id_activity integer not null auto_increment,
	notebook tinyint unsigned not null,
	sequence tinyint unsigned not null,
	activity tinyint not null,
	item varchar(2) null,
	parameters longtext not null, 
	primary key (id_activity)
) default charset = utf8;

create table if not exists inputs_temp (
	id_input_temp integer not null auto_increment,
	id_activity integer not null,
	id_student integer not null,
	input_name varchar(255),
  	input_value varchar(255),
  	register_date timestamp,
	primary key (id_input_temp),
	constraint fk_student_inputstemp foreign key (id_student) references student (id_student),
	constraint fk_activities_inputstemp foreign key (id_activity) references activities (id_activity)
) default charset = utf8;

create table if not exists inputs_def (
	id_input_def integer not null auto_increment,
	id_activity integer not null,
	id_student integer not null,
	input_name varchar(255),
  	input_value varchar(255),
	primary key (id_input),
	constraint fk_student_inputsdef foreign key (id_student) references student (id_student),
	constraint fk_activities_inputsdef foreign key (id_activity) references activities (id_activity)
) default charset = utf8;
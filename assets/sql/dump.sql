-- Complete create database fracoes

CREATE TABLE IF NOT EXISTS `fracoes`.`teacher` (
  `id_teacher` INT NOT NULL AUTO_INCREMENT,
  `teacher_name` VARCHAR(255) NOT NULL,
  `surname` VARCHAR(255) NULL,
  `username` VARCHAR(255) NOT NULL,
  `email_teacher` VARCHAR(255) NOT NULL,
  `password` VARCHAR(255) NOT NULL,
  `registration_date` DATE NOT NULL,
  `email_status` BOOLEAN NULL DEFAULT 0,
  PRIMARY KEY (`id_teacher`),
  UNIQUE INDEX `email_professor_UNIQUE` (`email_teacher` ASC),
  UNIQUE INDEX `username_UNIQUE` (`username` ASC)
) DEFAULT charset = utf8;

CREATE TABLE IF NOT EXISTS `fracoes`.`form_questions` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `type_question` VARCHAR(45) NOT NULL,
  `title_question` VARCHAR(255) NOT NULL,
  `options_question` JSON NOT NULL,
  `values_question` JSON NOT NULL,
  PRIMARY KEY (`id`)
) DEFAULT charset = utf8;

CREATE TABLE IF NOT EXISTS `fracoes`.`school` (
  `cod_inep` INT NOT NULL,
  `name_school` VARCHAR(255) NOT NULL,
  `type_school` VARCHAR(255) NOT NULL,
  `city_school` VARCHAR(255) NOT NULL,
  `state_school` VARCHAR(255) NOT NULL,
  PRIMARY KEY (`cod_inep`)
) DEFAULT charset = utf8;

CREATE TABLE IF NOT EXISTS `fracoes`.`register_school` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `school_cod_inep` INT NOT NULL,
  `teacher_id_teacher` INT NOT NULL,
  INDEX `fk_register_school_teacher1_idx` (`teacher_id_teacher` ASC),
  INDEX `fk_register_school_school1_idx` (`school_cod_inep` ASC),
  PRIMARY KEY (`id`),
  CONSTRAINT `fk_register_school_school1`
    FOREIGN KEY (`school_cod_inep`)
    REFERENCES `fracoes`.`school` (`cod_inep`)
    ON DELETE RESTRICT
    ON UPDATE RESTRICT,
  CONSTRAINT `fk_register_school_teacher1`
    FOREIGN KEY (`teacher_id_teacher`)
    REFERENCES `fracoes`.`teacher` (`id_teacher`)
    ON DELETE CASCADE
    ON UPDATE CASCADE
) DEFAULT charset = utf8;

CREATE TABLE IF NOT EXISTS `fracoes`.`class` (
  `cod_class` VARCHAR(6) NOT NULL,
  `name_class` VARCHAR(255) NOT NULL,
  `school_year` VARCHAR(45) NOT NULL,
  `register_school_id` INT NOT NULL,
  PRIMARY KEY (`cod_class`),
  INDEX `fk_class_register_school1_idx` (`register_school_id` ASC),
  CONSTRAINT `fk_class_register_school1`
    FOREIGN KEY (`register_school_id`)
    REFERENCES `fracoes`.`register_school` (`id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE
) DEFAULT charset = utf8;

CREATE TABLE IF NOT EXISTS `fracoes`.`student` (
  `id_student` INT NOT NULL AUTO_INCREMENT,
  `student_name` VARCHAR(255) NOT NULL,
  `username` VARCHAR(255) NOT NULL,
  `email_student` VARCHAR(255) NOT NULL,
  `password` VARCHAR(255) NOT NULL,
  `registration_date` DATE NOT NULL,
  `email_status` BOOLEAN NULL DEFAULT 0,
  `class_cod_class` VARCHAR(6) NULL,
  PRIMARY KEY (`id_student`),
  UNIQUE INDEX `username_UNIQUE` (`username` ASC),
  UNIQUE INDEX `email_student_UNIQUE` (`email_student` ASC),
  INDEX `fk_student_class1_idx` (`class_cod_class` ASC),
  CONSTRAINT `fk_student_class1`
    FOREIGN KEY (`class_cod_class`)
    REFERENCES `fracoes`.`class` (`cod_class`)
    ON DELETE SET NULL
    ON UPDATE CASCADE
) DEFAULT charset = utf8;

CREATE TABLE IF NOT EXISTS `fracoes`.`form_answers` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `user` VARCHAR(45) NOT NULL,
  `birth_year` YEAR NOT NULL,
  `sex` VARCHAR(45) NOT NULL,
  `question_4` VARCHAR(45) NULL,
  `question_5` VARCHAR(255) NULL,
  `question_6` VARCHAR(255) NULL,
  `question_7` VARCHAR(45) NULL,
  `question_8` VARCHAR(255) NULL,
  `question_9` VARCHAR(45) NULL,
  `question_10` VARCHAR(45) NULL,
  `question_11` VARCHAR(255) NULL,
  `question_12` VARCHAR(45) NULL,
  `question_13` VARCHAR(45) NULL,
  `question_14` VARCHAR(45) NULL,
  `question_15` VARCHAR(45) NULL,
  `question_16` VARCHAR(45) NULL,
  `question_17` VARCHAR(45) NULL,
  `question_18` INT NULL,
  `student_id_student` INT NULL,
  `teacher_id_teacher` INT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_form_answers_student1_idx` (`student_id_student` ASC),
  INDEX `fk_form_answers_teacher1_idx` (`teacher_id_teacher` ASC),
  CONSTRAINT `fk_form_answers_student1`
    FOREIGN KEY (`student_id_student`)
    REFERENCES `fracoes`.`student` (`id_student`)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT `fk_form_answers_teacher1`
    FOREIGN KEY (`teacher_id_teacher`)
    REFERENCES `fracoes`.`teacher` (`id_teacher`)
    ON DELETE CASCADE
    ON UPDATE CASCADE
) DEFAULT charset = utf8;

CREATE TABLE IF NOT EXISTS `fracoes`.`sequences` (
  `id` INT UNSIGNED NOT NULL,
  `short_description` VARCHAR(255) NOT NULL,
  `long_description` VARCHAR(1000) NOT NULL,
  `number_activities` INT NOT NULL,
  PRIMARY KEY (`id`)
) DEFAULT charset = utf8;

CREATE TABLE IF NOT EXISTS `fracoes`.`activities` (
  `id_activity` INT NOT NULL AUTO_INCREMENT,
  `notebook` INT UNSIGNED NOT NULL,
  `sequence` INT UNSIGNED NOT NULL,
  `activity` INT NOT NULL,
  `item` VARCHAR(2) NULL,
  `parameters` JSON NOT NULL,
  `correction` VARCHAR(255) NOT NULL,
  PRIMARY KEY (`id_activity`),
  INDEX `fk_activities_sequences1_idx` (`sequence` ASC),
  CONSTRAINT `fk_activities_sequences1`
    FOREIGN KEY (`sequence`)
    REFERENCES `fracoes`.`sequences` (`id`)
    ON DELETE RESTRICT
    ON UPDATE RESTRICT
) DEFAULT charset = utf8;

CREATE TABLE IF NOT EXISTS `fracoes`.`sequences_answers` (
  `id` INT NOT NULL,
  `student_id_student` INT NOT NULL,
  `sequences_id` INT UNSIGNED NOT NULL,
  `answers` JSON NOT NULL,
  `correction` JSON NOT NULL,
  `start_session` TIMESTAMP NOT NULL,
  `end_session` TIMESTAMP NOT NULL,
  `completed` TINYINT NOT NULL DEFAULT 0,
  `attemp` INT NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`),
  INDEX `fk_sequences_answers_student1_idx` (`student_id_student` ASC),
  INDEX `fk_sequences_answers_sequences1_idx` (`sequences_id` ASC),
  CONSTRAINT `fk_sequences_answers_student1`
    FOREIGN KEY (`student_id_student`)
    REFERENCES `fracoes`.`student` (`id_student`)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT `fk_sequences_answers_sequences1`
    FOREIGN KEY (`sequences_id`)
    REFERENCES `fracoes`.`sequences` (`id`)
    ON DELETE RESTRICT
    ON UPDATE RESTRICT
) DEFAULT charset = utf8;

CREATE TABLE IF NOT EXISTS `fracoes`.`student_reports` (
  `student_id_student` INT NOT NULL,
  `completed_activities` INT NOT NULL,
  `correct_activities` INT NOT NULL,
  `finished_sequences` JSON NOT NULL,
  `constancy` INT NOT NULL,
  `last_update` TIMESTAMP NOT NULL,
  PRIMARY KEY (`student_id_student`),
  CONSTRAINT `fk_student_reports_student1`
    FOREIGN KEY (`student_id_student`)
    REFERENCES `fracoes`.`student` (`id_student`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION
) DEFAULT charset = utf8;

-- Inserts questions form
INSERT INTO `fracoes`.`form_questions` (`type_question`, `title_question`, `options_question`, `values_question`) VALUES ('radio', 'Você é: <strong>*</strong>', '[\"Professor\",\"Aluno\",\"Outro\"]', '[\"Professor\",\"Aluno\",\"Outro\"]');
INSERT INTO `fracoes`.`form_questions` (`type_question`, `title_question`, `options_question`, `values_question`) VALUES ('select', 'Ano de nascimento: <strong>*</strong>', '[\"Selecione\"]', '[\"none\"]');
INSERT INTO `fracoes`.`form_questions` (`type_question`, `title_question`, `options_question`, `values_question`) VALUES ('radio', 'Sexo: <strong>*</strong>', '[\"Feminino\",\"Masculino\",\"Prefiro não informar\"]', '[\"F\",\"M\",\"Não informado\"]');
INSERT INTO `fracoes`.`form_questions` (`type_question`, `title_question`, `options_question`, `values_question`) VALUES ('radio', 'Você é professor de matemática ou professor de anos iniciais (1º a 5º ano)? <strong>*</strong>', '[\"Professor de matemática\",\"Professor de anos iniciais\"]', '[\"MAT\",\"AI\"]');
INSERT INTO `fracoes`.`form_questions` (`type_question`, `title_question`, `options_question`, `values_question`) VALUES ('checkbox', 'Quais anos você leciona? <strong>*</strong>', '[\"1º ano do Ensino Fundamental\",\"2º ano do Ensino Fundamental\",\"3º ano do Ensino Fundamental\",\"4º ano do Ensino Fundamental\",\"5º ano do Ensino Fundamental\"]', '[\"1EF\",\"2EF\",\"3EF\",\"4EF\",\"5EF\"]');
INSERT INTO `fracoes`.`form_questions` (`type_question`, `title_question`, `options_question`, `values_question`) VALUES ('checkbox', 'Quais anos você leciona? <strong>*</strong>', '[\"6º ano do Ensino Fundamental\",\"7º ano do Ensino Fundamental\",\"8º ano do Ensino Fundamental\",\"9º ano do Ensino Fundamental\",\"1º ano do Ensino Médio\",\"2º ano do Ensino Médio\",\"3º ano do Ensino Médio\",\"Educação de Jovens Adultos\"]', '[\"6EF\",\"7EF\",\"8EF\",\"9EF\",\"1EM\",\"2EM\",\"3EM\",\"EJA\"]');
INSERT INTO `fracoes`.`form_questions` (`type_question`, `title_question`, `options_question`, `values_question`) VALUES ('radio', 'Em quantas escolas você leciona? <strong>*</strong>', '[\"1\",\"2\",\"3+\"]', '[\"1\",\"2\",\"3+\"]');
INSERT INTO `fracoes`.`form_questions` (`type_question`, `title_question`, `options_question`, `values_question`) VALUES ('checkbox', 'Selecione todos os tipos de instituição: <strong>*</strong>', '[\"Pública Municipal com Processo Seletivo\",\"Pública Estadual com Processo Seletivo\",\"Pública Federal com Processo Seletivo\",\"Pública Municipal sem Processo Seletivo\",\"Pública Estadual sem Processo Seletivo\",\"Pública Federal sem Processo Seletivo\",\"Privada\"]', '[\"Municipal com PS\",\"Estadual com PS\",\"Federal com PS\",\"Municipal sem PS\",\"Estadual sem PS\",\"Federal sem PS\",\"Privada\"]');
INSERT INTO `fracoes`.`form_questions` (`type_question`, `title_question`, `options_question`, `values_question`) VALUES ('radio', 'Há quantos anos você é professor? <strong>*</strong>', '[\"Menos de 2 anos\",\"2 a 5 anos\",\"5 a 10 anos\",\"10 a 20 anos\",\"Mais de 20 anos\"]', '[\"-2\",\"2-5\",\"5-10\",\"10-20\",\"20+\"]');
INSERT INTO `fracoes`.`form_questions` (`type_question`, `title_question`, `options_question`, `values_question`) VALUES ('radio', 'Você possui curso de graduação completo? <strong>*</strong>', '[\"Sim\",\"Não\"]', '[\"Sim\",\"Não\"]');
INSERT INTO `fracoes`.`form_questions` (`type_question`, `title_question`, `options_question`, `values_question`) VALUES ('checkbox', 'Em qual(is) curso(s) você possui graduação completa? <strong>*</strong>', '[\"Pedagogia\",\"Licenciatura em Matemática\",\"Licenciatura em outro curso\",\"Bacharelado em Matemática ou Matemática Aplicada\",\"Outro\"]', '[\"Pedagogia\",\"Ldo Matemática\",\"Ldo outro curso\",\"BSc Matemática/MatAplicada\",\"Outro\"]');
INSERT INTO `fracoes`.`form_questions` (`type_question`, `title_question`, `options_question`, `values_question`) VALUES ('radio', 'Selecione o tipo de instituição para cada graduação completa:', '[\"Municipal\",\"Estadual\",\"Federal\",\"Privada\"]', '[\"Municipal\",\"Estadual\",\"Federal\",\"Privada\"]');
INSERT INTO `fracoes`.`form_questions` (`type_question`, `title_question`, `options_question`, `values_question`) VALUES ('radio', 'Selecione a modalidade de ensino para cada graduação completa:', '[\"Presencial\",\"Ensino a distância\"]', '[\"PRE\",\"EAD\"]');
INSERT INTO `fracoes`.`form_questions` (`type_question`, `title_question`, `options_question`, `values_question`) VALUES ('radio', 'Qual é a sua titulação máxima? <strong>*</strong>', '[\"Graduação\",\"Mestrado\",\"Doutorado\"]', '[\"Graduação\",\"Mestrado\",\"Doutorado\"]');
INSERT INTO `fracoes`.`form_questions` (`type_question`, `title_question`, `options_question`, `values_question`) VALUES ('radio', 'Raça/Cor: <strong>*</strong>', '[\"Branco\",\"Preto\",\"Pardo\",\"Amarelo\",\"Indígena\"]', '[\"Branco\",\"Preto\",\"Pardo\",\"Amarelo\",\"Indígena\"]');
INSERT INTO `fracoes`.`form_questions` (`type_question`, `title_question`, `options_question`, `values_question`) VALUES ('radio', 'Você estuda em uma escola: <strong>*</strong>', '[\"Pública Municipal\",\"Pública Estadual\",\"Pública Federal\",\"Privada\"]', '[\"Pública Municipal\",\"Pública Estadual\",\"Pública Federal\",\"Privada\"]');
INSERT INTO `fracoes`.`form_questions` (`type_question`, `title_question`, `options_question`, `values_question`) VALUES ('select', 'Selecione o seu ano escolar: <strong>*</strong>', '[\"Selecione\",\"1º ano do Ensino Fundamental\",\"2º ano do Ensino Fundamental\",\"3º ano do Ensino Fundamental\",\"4º ano do Ensino Fundamental\",\"5º ano do Ensino Fundamental\",\"6º ano do Ensino Fundamental\",\"7º ano do Ensino Fundamental\",\"8º ano do Ensino Fundamental\",\"9º ano do Ensino Fundamental\",\"1º ano do Ensino Médio\",\"2º ano do Ensino Médio\",\"3º ano do Ensino Médio\",\"Educação de Jovens Adultos\"]', '[\"none\",\"1EF\",\"2EF\",\"3EF\",\"4EF\",\"5EF\",\"6EF\",\"7EF\",\"8EF\",\"9EF\",\"1EM\",\"2EM\",\"3EM\",\"EJA\"]');
INSERT INTO `fracoes`.`form_questions` (`type_question`, `title_question`, `options_question`, `values_question`) VALUES ('range', 'Você se considera bom em matemática? <strong>*</strong>', '[\"1\",\"2\",\"3\",\"4\",\"5\"]', '[1,2,3,4,5]');

-- Inserts sequences here


-- Inserts activities here

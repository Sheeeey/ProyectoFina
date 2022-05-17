create database bd_escuela;
use bd_escuela;

CREATE TABLE tbl_admin(
    id_admin int(5) NOT NULL PRIMARY KEY AUTO_INCREMENT,
    email_admin varchar(50) NULL,
    passwd_admin varchar(40) NULL
);

CREATE TABLE IF NOT EXISTS tbl_professor(
	id_professor int(5) NOT NULL AUTO_INCREMENT,
	nom_prof varchar (20) NOT NULL,
	cognom1_prof varchar (20) NULL,
	cognom2_prof varchar (20) NULL,
	email_prof varchar(50) NULL,
	telf varchar (5) NULL, /* Son les extensions, per exemple: 32256*/
	dept int(5) NOT NULL,
    passwd_prof varchar(50) NULL,
	constraint pk_professor PRIMARY KEY (id_professor)
);

CREATE TABLE IF NOT EXISTS tbl_classe (
	id_classe int(5) NOT NULL AUTO_INCREMENT,
	codi_classe varchar(5) NOT NULL,
	nom_classe varchar(25) NULL,
	tutor int(5) NOT NULL,
	constraint pk_consta PRIMARY KEY (id_classe)
);

CREATE TABLE IF NOT EXISTS tbl_alumne(
	id_alumne int(10) NOT NULL AUTO_INCREMENT,
	dni_alu varchar(9) NULL,
	nom_alu varchar(20) NOT NULL,
	cognom1_alu varchar(20) NULL,
	cognom2_alu varchar(20) NULL,
	telf_alu varchar(9) NULL,
	email_alu varchar(50) NULL,
	classe int(5) NOT NULL,
    passwd_alu varchar(40) NULL,
	constraint pk_alumne PRIMARY KEY (id_alumne)
);

CREATE TABLE IF NOT EXISTS tbl_dept(
	id_dept int(5) NOT NULL AUTO_INCREMENT,
	codi_dept varchar(5) NOT NULL,
	nom_dept varchar(25) NULL,
	constraint pk_imparteix PRIMARY KEY (id_dept)
);

/* Modificacions de les taules per cració de les FK*/

ALTER TABLE tbl_alumne
    ADD CONSTRAINT alumne_classe_fk FOREIGN KEY (classe)
    REFERENCES tbl_classe(id_classe);
	
ALTER TABLE tbl_classe
    ADD CONSTRAINT classe_prof_fk FOREIGN KEY (tutor)
    REFERENCES tbl_professor(id_professor);

ALTER TABLE tbl_professor
    ADD CONSTRAINT prof_dept_fk FOREIGN KEY (dept)
    REFERENCES tbl_dept(id_dept);

	



/*INSERT ALUMNOS*/
INSERT INTO tbl_admin(`email_admin`, `passwd_admin`) VALUES ("admin@admin.com","asdASD123");



INSERT INTO tbl_alumne(`dni_alu`,`nom_alu`,`cognom1_alu`,`cognom2_alu`, `telf_alu`,`email_alu`,`classe`,`passwd_alu`) VALUES("	47269199J	","	Juan	","	García	","	Sánchez	","	648351293	","	Juan@gmail.com	",5,"	1234	");
INSERT INTO tbl_alumne(`dni_alu`,`nom_alu`,`cognom1_alu`,`cognom2_alu`, `telf_alu`,`email_alu`,`classe`,`passwd_alu`) VALUES("	26437959B	","	Antonio	","	Cruz	","	Álvarez	","	678713292	","	Antonio@gmail.com	",1,"	1234	");
INSERT INTO tbl_alumne(`dni_alu`,`nom_alu`,`cognom1_alu`,`cognom2_alu`, `telf_alu`,`email_alu`,`classe`,`passwd_alu`) VALUES("	28315818N	","	Mario	","	Sánchez	","	Ruiz	","	683765412	","	Mario@gmail.com	",4,"	1234	");
INSERT INTO tbl_alumne(`dni_alu`,`nom_alu`,`cognom1_alu`,`cognom2_alu`, `telf_alu`,`email_alu`,`classe`,`passwd_alu`) VALUES("	88981651X	","	Sheila	","	Ruiz	","	Cruz	","	693946317	","	Sheila@gmail.com	",3,"	1234	");
INSERT INTO tbl_alumne(`dni_alu`,`nom_alu`,`cognom1_alu`,`cognom2_alu`, `telf_alu`,`email_alu`,`classe`,`passwd_alu`) VALUES("	16977586K	","	Hugo	","	Álvarez	","	Gómez	","	636412153	","	Hugo@gmail.com	",5,"	1234	");
INSERT INTO tbl_alumne(`dni_alu`,`nom_alu`,`cognom1_alu`,`cognom2_alu`, `telf_alu`,`email_alu`,`classe`,`passwd_alu`) VALUES("	57391621C	","	Carla	","	Martínez	","	García	","	647197637	","	Carla@gmail.com	",2,"	1234	");
INSERT INTO tbl_alumne(`dni_alu`,`nom_alu`,`cognom1_alu`,`cognom2_alu`, `telf_alu`,`email_alu`,`classe`,`passwd_alu`) VALUES("	21669439N	","	Lola	","	Martínez	","	García	","	634798119	","	Lola@gmail.com	",1,"	1234	");
INSERT INTO tbl_alumne(`dni_alu`,`nom_alu`,`cognom1_alu`,`cognom2_alu`, `telf_alu`,`email_alu`,`classe`,`passwd_alu`) VALUES("	95566362M	","	Carlos	","	Jimenez	","	Cruz	","	652693926	","	Carlos@gmail.com	",5,"	1234	");
INSERT INTO tbl_alumne(`dni_alu`,`nom_alu`,`cognom1_alu`,`cognom2_alu`, `telf_alu`,`email_alu`,`classe`,`passwd_alu`) VALUES("	78147933M	","	Andrés	","	Martínez	","	Jimenez	","	656656868	","	Andrés@gmail.com	",2,"	1234	");
INSERT INTO tbl_alumne(`dni_alu`,`nom_alu`,`cognom1_alu`,`cognom2_alu`, `telf_alu`,`email_alu`,`classe`,`passwd_alu`) VALUES("	15516884A	","	Pol	","	Gómez	","	Jimenez	","	661114253	","	Pol@gmail.com	",3,"	1234	");
INSERT INTO tbl_alumne(`dni_alu`,`nom_alu`,`cognom1_alu`,`cognom2_alu`, `telf_alu`,`email_alu`,`classe`,`passwd_alu`) VALUES("	69423329Z	","	Sergio	","	Ruiz	","	Fernández	","	647243678	","	Sergio@gmail.com	",4,"	1234	");
INSERT INTO tbl_alumne(`dni_alu`,`nom_alu`,`cognom1_alu`,`cognom2_alu`, `telf_alu`,`email_alu`,`classe`,`passwd_alu`) VALUES("	22648944Q	","	David	","	Gómez	","	Fernández	","	647695444	","	David@gmail.com	",3,"	1234	");
INSERT INTO tbl_alumne(`dni_alu`,`nom_alu`,`cognom1_alu`,`cognom2_alu`, `telf_alu`,`email_alu`,`classe`,`passwd_alu`) VALUES("	14841385Z	","	Héctor	","	Álvarez	","	Fernández	","	678761978	","	Héctor@gmail.com	",4,"	1234	");
INSERT INTO tbl_alumne(`dni_alu`,`nom_alu`,`cognom1_alu`,`cognom2_alu`, `telf_alu`,`email_alu`,`classe`,`passwd_alu`) VALUES("	82755225Y	","	Guillem	","	Jimenez	","	Martínez	","	679672391	","	Guillem@gmail.com	",2,"	1234	");
INSERT INTO tbl_alumne(`dni_alu`,`nom_alu`,`cognom1_alu`,`cognom2_alu`, `telf_alu`,`email_alu`,`classe`,`passwd_alu`) VALUES("	31161225C	","	Alex	","	Jimenez	","	Ruiz	","	665213711	","	Alex@gmail.com	",2	,"	1234	");
INSERT INTO tbl_alumne(`dni_alu`,`nom_alu`,`cognom1_alu`,`cognom2_alu`, `telf_alu`,`email_alu`,`classe`,`passwd_alu`) VALUES("	27472486K	","	Raúl	","	Ruiz	","	García	","	631945713	","	Raúl@gmail.com	",	3	,"	1234	");
INSERT INTO tbl_alumne(`dni_alu`,`nom_alu`,`cognom1_alu`,`cognom2_alu`, `telf_alu`,`email_alu`,`classe`,`passwd_alu`) VALUES("	34367215V	","	Wilson	","	Ruiz	","	Sánchez	","	625997525	","	Wilson@gmail.com	",	1	,"	1234	");
INSERT INTO tbl_alumne(`dni_alu`,`nom_alu`,`cognom1_alu`,`cognom2_alu`, `telf_alu`,`email_alu`,`classe`,`passwd_alu`) VALUES("	48558345D	","	Jin	","	Gómez	","	Martínez	","	652862954	","	Jin@gmail.com	",2	,"	1234	");
INSERT INTO tbl_alumne(`dni_alu`,`nom_alu`,`cognom1_alu`,`cognom2_alu`, `telf_alu`,`email_alu`,`classe`,`passwd_alu`) VALUES("	82541427Q	","	Pablo	","	Gómez	","	Ruiz	","	669726756	","	Pablo@gmail.com	",3	,"	1234	");
INSERT INTO tbl_alumne(`dni_alu`,`nom_alu`,`cognom1_alu`,`cognom2_alu`, `telf_alu`,`email_alu`,`classe`,`passwd_alu`) VALUES("	19816914E	","	Ricardo	","	Jimenez	","	Álvarez	","	621619237	","	Ricardo@gmail.com	",	3	,"	1234	");
INSERT INTO tbl_alumne(`dni_alu`,`nom_alu`,`cognom1_alu`,`cognom2_alu`, `telf_alu`,`email_alu`,`classe`,`passwd_alu`) VALUES("	96599783J	","	Joel	","	Cruz	","	Martínez	","	692846446	","	Joel@gmail.com	",	1	,"	1234	");
INSERT INTO tbl_alumne(`dni_alu`,`nom_alu`,`cognom1_alu`,`cognom2_alu`, `telf_alu`,`email_alu`,`classe`,`passwd_alu`) VALUES("	35795377V	","	Lucas	","	Fernández	","	Sánchez	","	693866863	","	Lucas@gmail.com	",	3	,"	1234	");
INSERT INTO tbl_alumne(`dni_alu`,`nom_alu`,`cognom1_alu`,`cognom2_alu`, `telf_alu`,`email_alu`,`classe`,`passwd_alu`) VALUES("	25437931T	","	Alvaro	","	Cruz	","	Sánchez	","	644563886	","	Alvaro@gmail.com	",	4	,"	1234	");
INSERT INTO tbl_alumne(`dni_alu`,`nom_alu`,`cognom1_alu`,`cognom2_alu`, `telf_alu`,`email_alu`,`classe`,`passwd_alu`) VALUES("	53728717G	","	María	","	Martínez	","	Martínez	","	667717945	","	María@gmail.com	",	3	,"	1234	");
INSERT INTO tbl_alumne(`dni_alu`,`nom_alu`,`cognom1_alu`,`cognom2_alu`, `telf_alu`,`email_alu`,`classe`,`passwd_alu`) VALUES("	24141393H	","	Alex	","	Gómez	","	Sánchez	","	624634588	","	Alex@gmail.com	",	1	,"	1234	");
INSERT INTO tbl_alumne(`dni_alu`,`nom_alu`,`cognom1_alu`,`cognom2_alu`, `telf_alu`,`email_alu`,`classe`,`passwd_alu`) VALUES("	49735464B	","	Paula	","	Ruiz	","	Ruiz	","	698743886	","	Paula@gmail.com	",	5	,"	1234	");
INSERT INTO tbl_alumne(`dni_alu`,`nom_alu`,`cognom1_alu`,`cognom2_alu`, `telf_alu`,`email_alu`,`classe`,`passwd_alu`) VALUES("	65422556E	","	Judit	","	Gómez	","	Sánchez	","	667749886	","	Judit@gmail.com	",	4	,"	1234	");
INSERT INTO tbl_alumne(`dni_alu`,`nom_alu`,`cognom1_alu`,`cognom2_alu`, `telf_alu`,`email_alu`,`classe`,`passwd_alu`) VALUES("	77296539W	","	Ian	","	Jimenez	","	Álvarez	","	672949423	","	Ian@gmail.com	",	1	,"	1234	");
INSERT INTO tbl_alumne(`dni_alu`,`nom_alu`,`cognom1_alu`,`cognom2_alu`, `telf_alu`,`email_alu`,`classe`,`passwd_alu`) VALUES("	29721929H	","	Adrián	","	Ruiz	","	Ruiz	","	672482268	","	Adrián@gmail.com	",	5	,"	1234	");
INSERT INTO tbl_alumne(`dni_alu`,`nom_alu`,`cognom1_alu`,`cognom2_alu`, `telf_alu`,`email_alu`,`classe`,`passwd_alu`) VALUES("	36996188K	","	Manel	","	Martínez	","	López	","	647544656	","	Manel@gmail.com	",	4	,"	1234	");
INSERT INTO tbl_alumne(`dni_alu`,`nom_alu`,`cognom1_alu`,`cognom2_alu`, `telf_alu`,`email_alu`,`classe`,`passwd_alu`) VALUES("	31633695R	","	Oriol	","	Jimenez	","	Fernández	","	643769747	","	Oriol@gmail.com	",	5	,"	1234	");



INSERT INTO tbl_classe(`codi_classe`,`nom_classe`,`tutor`) VALUES("1000","ASIX1",1);
INSERT INTO tbl_classe(`codi_classe`,`nom_classe`,`tutor`) VALUES("1001","ASIX2",1);
INSERT INTO tbl_classe(`codi_classe`,`nom_classe`,`tutor`) VALUES("1002","SMX1",3);
INSERT INTO tbl_classe(`codi_classe`,`nom_classe`,`tutor`) VALUES("1003","DAW2",2);
INSERT INTO tbl_classe(`codi_classe`,`nom_classe`,`tutor`) VALUES("1004","SMX2",3);

INSERT INTO tbl_professor(`nom_prof`,`cognom1_prof`,`cognom2_prof`,`email_prof`,`telf`,`dept`,`passwd_prof`) VALUES("Ricardo","Martínez","Jimenez","Ricardo@gmail.com","82756",1,"1234");
INSERT INTO tbl_professor(`nom_prof`,`cognom1_prof`,`cognom2_prof`,`email_prof`,`telf`,`dept`,`passwd_prof`) VALUES("Oriol","Jimenez","Martínez","Oriol@gmail.com","32256",1,"1234");
INSERT INTO tbl_professor(`nom_prof`,`cognom1_prof`,`cognom2_prof`,`email_prof`,`telf`,`dept`,`passwd_prof`) VALUES("Joel","Cruz","Álvarez","Joel@gmail.com","79250",2,"1234");
INSERT INTO tbl_professor(`nom_prof`,`cognom1_prof`,`cognom2_prof`,`email_prof`,`telf`,`dept`,`passwd_prof`) VALUES("David","Álvarez","Gómez","David@gmail.com",3,"98255","1234");
INSERT INTO tbl_professor(`nom_prof`,`cognom1_prof`,`cognom2_prof`,`email_prof`,`telf`,`dept`,`passwd_prof`) VALUES("Ian","Gómez","Cruz","Ian@gmail.com","67906",3,"1234");




INSERT INTO tbl_dept(`codi_dept`,`nom_dept`) VALUES("2000","ASIX");
INSERT INTO tbl_dept(`codi_dept`,`nom_dept`) VALUES("2001","DAW");
INSERT INTO tbl_dept(`codi_dept`,`nom_dept`) VALUES("2002","SMX");
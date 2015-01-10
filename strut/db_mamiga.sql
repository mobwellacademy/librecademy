-- ALTER TABLE user ADD (type INT, 
--	photo 		TINYTEXT, 
--	phone1 		TINYTEXT,
--	phone2 		TINYTEXT,
--	address		MEDIUMTEXT,
--	email		TINYTEXT,
--	skype		TINYTEXT
-- );

-- pwd: m4migmin
INSERT INTO user(name, login, password) VALUES ('admin', 'admin', '4b66858b903b13f539dc0ac5731a5e8d');
UPDATE user SET sal='3d9ebc104219b2a4f8806cfef9fa8e0e' WHERE login = 'admin';

CREATE TABLE IF NOT EXISTS molduramiga (
	id_mamiga	INT AUTO_INCREMENT,
	nserie		TINYTEXT,
	version		VARCHAR(5),
	details		LONGTEXT,
	PRIMARY KEY (id_mamiga));

 -- If the parent of a record is <> -1, the manager is actualy a co-manager, 
 -- that cannot create managers, and can only manage user modules
CREATE TABLE IF NOT EXISTS manager ( 
	id_parent	INT,
	id_manager	INT AUTO_INCREMENT,
	id_user		INT,
	nome		TINYTEXT,
	address		TINYTEXT,
	fiscaln		INT,
	phone		TINYTEXT,
	photo		TINYTEXT,
	email		TINYTEXT,
	details		LONGTEXT,
	PRIMARY KEY (id_manager),
	FOREIGN KEY (id_user) REFERENCES user(id_user) ON DELETE CASCADE ON UPDATE CASCADE,
	FOREIGN KEY (id_parent) REFERENCES manager(id_manager) ON UPDATE CASCADE
	);


CREATE TABLE IF NOT EXISTS molduser (
	id_molduser	INT AUTO_INCREMENT,
	id_user		INT,
	name		TINYTEXT,
	photo 		TINYTEXT, 
	phone1 		TINYTEXT,
	phone2 		TINYTEXT,
	address		MEDIUMTEXT,
	email		TINYTEXT,
	skype		TINYTEXT,
	twilContact	TINYTEXT,
	details		LONGTEXT,
	favorite	BOOLEAN,
	emergency	BOOLEAN,
	FOREIGN KEY (id_user) REFERENCES user(id_user) ON DELETE CASCADE ON UPDATE CASCADE, 
	PRIMARY KEY (id_molduser));

CREATE TABLE IF NOT EXISTS molduser_friends (
	id_molduser INT,
	id_userfriend INT,
	state 	VARCHAR(1),
	FOREIGN KEY (id_molduser) REFERENCES molduser(id_molduser) ON DELETE CASCADE ON UPDATE CASCADE, 
	FOREIGN KEY (id_userfriend) REFERENCES molduser(id_molduser) ON DELETE CASCADE ON UPDATE CASCADE,
	PRIMARY KEY (id_molduser, id_userfriend));

INSERT INTO manager (nome) VALUES ('Root Manager');

CREATE TABLE manager_molduser (
	id_manager INT,
	id_molduser INT,
	FOREIGN KEY (id_manager) REFERENCES manager(id_manager) ON DELETE CASCADE ON UPDATE CASCADE,
	FOREIGN KEY (id_molduser) REFERENCES molduser(id_molduser) ON DELETE CASCADE ON UPDATE CASCADE
);

CREATE TABLE IF NOT EXISTS contact (
	id_contact	INT AUTO_INCREMENT,
	id_molduser	INT,
	name		TINYTEXT,
	photo 		TINYTEXT, 
	phone1 		TINYTEXT,
	phone2 		TINYTEXT,
	address		MEDIUMTEXT,
	email		TINYTEXT,
	skype		TINYTEXT,
	twilContact	TINYTEXT,
	details		LONGTEXT,
	favorite	BOOLEAN,
	emergency	BOOLEAN,
	FOREIGN KEY (id_molduser) REFERENCES molduser(id_molduser) ON DELETE CASCADE ON UPDATE CASCADE, 
	PRIMARY KEY (id_contact));

CREATE TABLE IF NOT EXISTS photo ( 
	id_molduser INT, 
	id_photo INT AUTO_INCREMENT, 
	titulo TINYTEXT, 
	descricao MEDIUMTEXT, 
	data DATETIME, 
	filename VARCHAR(100),
	FOREIGN KEY (id_molduser) REFERENCES molduser(id_molduser) ON DELETE CASCADE ON UPDATE CASCADE, 
	PRIMARY KEY (id_photo));

 CREATE TABLE IF NOT EXISTS session ( 
	id_session INT NOT NULL AUTO_INCREMENT, 
	id_user INT NOT NULL, 
	otok_session INT, 
	createdin DATETIME, 
	PRIMARY KEY (id_session), 
	FOREIGN KEY FKID_USER (id_user) REFERENCES user(id_user));

CREATE TABLE IF NOT EXISTS session_user (
	id_session INT, 
	id_user INT, 
	token TINYTEXT, 
	joinin DATETIME, 
	photo	TINYTEXT,
	phone	TINYTEXT,
	PRIMARY KEY(id_session, id_user), 
	FOREIGN KEY fkid_session (id_session) REFERENCES session(id_session), 
	FOREIGN KEY fkid_user (id_user) REFERENCES user(id_user));

CREATE OR REPLACE VIEW vfriends AS SELECT molduser.id_user, molduser.name, molduser.photo, molduser.phone1, molduser.phone2, molduser.address, molduser.twilContact, molduser.skype, molduser.email, molduser.details FROM molduser inner join molduser_friends F ON F.id_userfriend = molduser.id_molduser;


CREATE TABLE IF NOT EXISTS medication(
	id_medication	INT NOT NULL AUTO_INCREMENT,
	id_molduser	INT,
	name	TINYTEXT,
	notes	MEDIUMTEXT,
	photo	TINYTEXT,
	PRIMARY KEY (id_medication),
	FOREIGN KEY FKID_MOLDUSER (id_molduser) REFERENCES molduser(id_molduser)
);


CREATE TABLE IF NOT EXISTS toma(
	id_toma 	INT NOT NULL AUTO_INCREMENT,
	id_molduser	INT,
	hora		TINYTEXT,
	diatoma		DATE,
	PRIMARY KEY (id_toma),
	FOREIGN KEY FKID_TOMA (id_molduser) REFERENCES molduser(id_molduser) ON DELETE CASCADE
	);

CREATE TABLE IF NOT EXISTS toma_medication(
	id_toma			INT,
	id_medication	INT,
	numComprimidos	TINYINT,
	FOREIGN KEY FKID_TOMAMED (id_toma) REFERENCES toma(id_toma) ON DELETE CASCADE,
	FOREIGN KEY FKID_TOMAMOLD (id_medication) REFERENCES medication(id_medication) ON DELETE CASCADE);



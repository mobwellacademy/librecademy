CREATE TABLE IF NOT EXISTS post (
	id_post		INT AUTO_INCREMENT,
	id_parent	INT,
	id_user		INT,
	title		TEXT,
	description	TEXT,
	publishedin	TIMESTAMP,
	PRIMARY KEY (id_post, id_parent, id_user)
);
-- CREATE TRIGGER `postdate` BEFORE INSERT ON `post` FOR EACH ROW SET NEW.publishedin = NOW();

-- INSERT INTO post(id_post, id_parent, id_user, title, description) VALUES (
--	1,
--	1,
--	1,
--	'Root',
--	'');


CREATE TABLE IF NOT EXISTS files (
	id_file		INT,
	id_user		INT,
	name		TINYTEXT,
	location	TINYTEXT,
	filesize	INT,
	uploadin	TIMESTAMP,
	PRIMARY KEY (id_file, id_user)
);
-- CREATE TRIGGER `filedate` BEFORE INSERT ON `files` FOR EACH ROW SET NEW.uploadin= NOW();


CREATE TABLE IF NOT EXISTS post_files (
	id_file		INT AUTO_INCREMENT,
	id_post		INT,
	PRIMARY KEY(id_file, id_post),
	FOREIGN KEY fkpfiles (id_file) REFERENCES files(id_file) ON DELETE CASCADE,
	FOREIGN KEY fkppost (id_post) REFERENCES post(id_post) ON DELETE CASCADE
);


CREATE TABLE IF NOT EXISTS session (
	id_session	INT	AUTO_INCREMENT,
	name		TINYTEXT,
	description	TEXT,
	startedin	TIMESTAMP,
	endtime		TIMESTAMP,
	yt_link		TINYTEXT,
	imp_link	TINYTEXT,
	draw_id		TINYTEXT,
	primary key (id_session)
	);


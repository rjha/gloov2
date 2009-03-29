
-- 
-- server database is gloodb
-- user gloo
-- password 8L
-- 
-- 

-- 
-- take dump from master database and create for others 
-- mysqldump --no-data  cricket -u root -p > schema.sql
-- mysqldump --no-create-info  cricket -u root -p > data.sql
--
-- create database gloo;
-- grant all privileges on gloo.*
-- to 'snoopy'@'localhost' identified by 'peanuts'
-- with grant option;
--
--
-- @see also 
-- http://rjha94.blogspot.com/search/label/mysql%20dump%20user%20analyze
-- 





--
-- DB for gloov2  application 
-- 
-- 
drop table if exists sa_organization;
create table sa_organization(
	id int(11) NOT NULL auto_increment,
	name varchar(128) not null UNIQUE ,
	domain varchar(64) not null UNIQUE ,
	website varchar(128) not null UNIQUE ,
	is_active int not null default 1,
	description TEXT ,
	uniqkey varchar(64) not null ,
	support_email varchar(128) ,
	created_on timestamp ,
	updated_on timestamp ,
	main_page varchar(32) ,
	PRIMARY KEY (id)) ENGINE = MYISAM;


alter table sa_organization add constraint   UNIQUE (uniqkey) ;
alter table sa_organization add constraint   UNIQUE (domain) ;
alter table sa_organization add constraint   UNIQUE (website) ;

drop table if exists sa_vault;
CREATE TABLE sa_vault ( 
	id int(11) NOT NULL auto_increment,
	login varchar(128) not null UNIQUE,
	password varchar(64) not null,
	salt varchar(16) not null,
	is_active integer not null default 1 ,
	created_on TIMESTAMP,
	updated_on TIMESTAMP,
	PRIMARY KEY (id)) ENGINE =MYISAM ;

	

	
drop table if exists gloo_vault;
CREATE TABLE gloo_vault ( 
	id int(11) NOT NULL auto_increment,
	first_name varchar(64) not null,
	last_name varchar(64) not null,
	login varchar(128) not null UNIQUE,
	password varchar(64) not null,
	is_active integer not null default 1 ,
	ORG_ID int not null,
	domain varchar(128) not null, 
	salt varchar(16) not null,
	created_on TIMESTAMP,
	updated_on TIMESTAMP,
	PRIMARY KEY (id)) ENGINE =MYISAM ;

drop table if exists gloo_note;

create table gloo_note(
	id int(11) NOT NULL auto_increment,
	org_id int not null,
	title varchar(128) not null ,
	text_content TEXT ,
	s3_image_key varchar(512),
	s3_image_bucket varchar(128),
	s3_file_key varchar(512),
	s3_file_bucket varchar(128),
	content_size int ,
	mime_type varchar(64),
	embed_code TEXT,
	note_link varchar(512),
	note_type varchar(16),
	note_group varchar(32),
	created_on timestamp ,
	updated_on timestamp ,
	PRIMARY KEY (id)) ENGINE = MYISAM ;
	

	

--
-- medium blob stores upto 16M , blob can store only 64k
-- and unless strict SQL mode is ON, mysql just truncates
-- silently!
-- 




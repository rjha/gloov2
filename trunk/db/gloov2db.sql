
-- 
-- server database is gloov2db
-- gloo/osje8L
-- 
--
-- DB for gloov2  application 
-- 
-- 


drop table if exists gloo_menu;
create table gloo_menu(
	id int(11) NOT NULL auto_increment,
	org_id int not null,
	menu_key varchar(16),
	menu_name varchar(64),
	created_on timestamp ,
	updated_on timestamp ,
	PRIMARY KEY (id)) ENGINE = MYISAM ;

drop table if exists gloo_note;

create table gloo_note(
	id int(11) NOT NULL auto_increment,
	ident_key varchar(64) NOT NULL ,
	org_id int not null,
	title varchar(128) not null ,
	note_content TEXT ,
	s3_image_key varchar(512),
	s3_image_bucket varchar(128),
	s3_file_key varchar(512),
	s3_file_bucket varchar(128),
	ui_order int ,
	ui_width int ,
	ui_height int ,
	external_link varchar(1024),
	ui_type varchar(16),
	menu_key varchar(16),
	created_on timestamp ,
	updated_on timestamp ,
	PRIMARY KEY (id)) ENGINE = MYISAM ;
	

alter table  gloo_note add constraint UNIQUE(ident_key);
--
-- MySQL data type TEXT stores up to 64K. Anything more than that is truncated silently
-- unless the strict mode is ON. I guess that 64K ought to be enough! use MYSQL in strict 
-- mode.
-- 


drop table if exists gloo_article;

create table gloo_article(
	id int(11) NOT NULL auto_increment,
	ident_key varchar(64) NOT NULL ,
	org_id int not null,
	title varchar(128) not null ,
	ui_content TEXT ,
	menu_key varchar(16),
	ui_order int ,
	ui_type varchar(16),
	created_on timestamp ,
	updated_on timestamp ,
	PRIMARY KEY (id)) ENGINE = MYISAM ;
	
alter table  gloo_article add constraint UNIQUE(ident_key);



drop table if exists gloo_content_map;

create table gloo_content_map(
	id int(11) NOT NULL auto_increment,
	org_id int not null,
	menu_key varchar(16),
	ui_order int,
	entity_type varchar(16),
	entity_key int,
	created_on timestamp ,
	updated_on timestamp ,
	PRIMARY KEY (id)) ENGINE = MYISAM ;

alter table  gloo_content_map add constraint UNIQUE(entity_key);




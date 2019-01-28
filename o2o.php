<?php


/*分类表*/
create table o2o_category(
	id   int(11) unsigned not null auto_increment,
	name varchar(30) not null default '',
	parent_id int(10) unsigned not null default 0,
	listorder int(10) unsigned not null default 0,
	status    tinyint(1)  not null default 1,
	create_time int(11) unsigned not null default 0,
	update_time int(11) unsigned not null default 0,
	primary key id(id),
	key parent_id(parent_id)
)engine=InnoDB default charset=utf8;

/*城市表*/
create table o2o_city(
	id int(11) unsigned not null auto_increment,
	name  varchar(20) not null default '',
	uname varchar(20) not null default '',
	parent_id int(10) unsigned not null default 0,
	listorder int(10) unsigned not null default 0,
	status tinyint(1) unsigned not null default 1,
	create_time int(11) unsigned not null default 0,
	update_time int(11) unsigned not null default 0,
	primary key id(id),
	key parent_id(parent_id),
	unique key uname(uname),
	unique key name(name)
)engine=InnoDB default charset=utf8;


/*商圈表*/
create table o2o_area(
	id int(11) unsigned not null auto_increment,
	name varchar(20) not null default '',
	city_id   int(11) unsigned not null default 0,
	parent_id int(11) unsigned not null default 0,
	listorder int(11) unsigned not null default 0,
	status tinyint(1) unsigned not null default 1,
	create_time int(11) unsigned not null default 0,
	update_time int(11) unsigned not null default 0,
	primary key id(id),
	key parent_id(parent_id),
	key city_id(city_id)
)engine=InnoDB default charset=utf8;


/*商户表*/
create table o2o_bis(
	id    int(11) unsigned not null auto_increment,
	name  varchar(30) not null default '',
	email varchar(200) not null default '',
	logo  varchar(255) not null default '',
	licence_logo varchar(255) not null default '',
	description text not null,
	city_id int(11) unsigned not null default 0,
	city_path varchar(30) not null default '',
	bank_info varchar(255) not null default '',
	money decimal(20,2) not null default '0.00',
	bank_name varchar(200) not null default '',
	bank_user varchar(20) not null default '',
	faren varchar(20) not null default '',
	faren_tel varchar(11) not null default '',
	listorder int(11) unsigned not null default 0,
	create_time int(11) unsigned not null default 0,
	update_time int(11) unsigned not null default 0,
	primary key id(id),
	key city_id(city_id),
	key name(name)
)engine=InnoDB default charset=utf8;


/*商户账号表*/
create table o2o_bis_account(
	id int(11) unsigned not null auto_increment,
	username varchar(30) not null default '',
	password char(32)    not null default '',
	code     varchar(10) not null default '',
	bis_id   int(11) unsigned not null default 0,
	last_login_ip    varchar(30) not null default '',
	last_login_time  int(11) unsigned not null default 0,
	is_main tinyint(1) unsigned not null default 0,
	listorder int(11) unsigned not null default 0,
	status  tinyint(1) unsigned not null default 0,
	create_time int(11) unsigned not null default 0,
	update_time int(11) unsigned not null default 0,
	primary key id(id),
	key bis_id(bis_id),
	key username(username)
)engine=InnoDB default charset=utf8;


/*商户门店表*/
create table o2o_bis_location(
	id int(11) unsigned not null auto_increment,
	name varchar(20) not null default '',
	logo varchar(30) not null default '',
	bis_id int(11) unsigned not null default 0,
	address varchar(200) not null default '',
	tel varchar(11) not null default '',
	contact varchar(30) not null default '',
	xpoint varchar(10) not null default '',
	ypoint varchar(10) not null default '',
	open_time varchar(11) not null default 0,
	is_main tinyint(1) unsigned not null default 0,
	api_address varchar(200) not null default '',
	city_id   int(11) unsigned not null default 0,
	city_path varchar(30) not null default '',
	category_id int(11) unsigned not null default 0,
	category_path varchar(30) not null default '',
	listorder int(11) unsigned not null default 0,
	status  tinyint(1) unsigned not null default 0,
	create_time int(11) unsigned not null default 0,
	update_time int(11) unsigned not null default 0,
	primary key id(id),
	key bis_id(bis_id),
	key city_id(city_id),
	key category_id(category_id),
	key name(name)
)engine=InnoDB default charset=utf8;


/*团购商品表*/
create table o2o_deal(
	id int(11) unsigned not null auto_increment,
	name varchar(30) not null default '',
	location_ids varchar(30) not null default 0,
	bis_id int(11) unsigned not null default 0,
	category_id int(11) unsigned not null default 0,
	se_category_id int(11) unsigned not null default 0,
	image varchar(200) not null default '',
	description text not null,
	start_time int(11) unsigned not null default 0,
	end_time   int(11) unsigned not null default 0,
	origin_price  decimal(20,2) unsigned not null default 0.00,
	current_price decimal(20,2) unsigned not null default 0.00,
	city_id int(11) unsigned not null default 0,
	buy_count int(10) unsigned not null default 0,
	total_count int(10) unsigned not null default 0,
	coupons_start_time int(11) unsigned not null default 0,
	coupons_end_time int(11) unsigned not null default 0,
	xpoint varchar(10) not null default '',
	ypoint varchar(10) not null default '',
	bis_account_id int(11) unsigned not null default 0,
	balance_price decimal(20,2) unsigned not null default 0.00,
	notes text not null,
	listorder int(11) unsigned not null default 0,
	status  tinyint(1) unsigned not null default 0,
	create_time int(11) unsigned not null default 0,
	update_time int(11) unsigned not null default 0,
	primary key id(id),
	key name(name),
	key category_id(category_id),
	key se_category_id(se_category_id),
	key city_id(city_id),
	key start_time(start_time),
	key end_time(end_time)
)engine=InnoDB default charset=utf8;


/*前台会员表*/
create table o2o_user(
	id int(11) unsigned not null auto_increment,
	username varchar(20) not null default '',
	password char(32) not null default '',
	code     varchar(10) not null default '',
	last_login_ip    varchar(30) not null default '',
	last_login_time  int(11) unsigned not null default 0,
	email varchar(200) not null default '',
	mobile varchar(11) not null default '',
	listorder int(11) unsigned not null default 0,
	status  tinyint(1) unsigned not null default 0,
	create_time int(11) unsigned not null default 0,
	update_time int(11) unsigned not null default 0,
	primary key id(id),
	unique key username(username),
	unique key email(email),
	unique key mobile(mobile)
)engine=InnoDB default charset=utf8;


/*推荐位*/
create table o2o_featuerd(
	id int(11) unsigned not null auto_increment,
	title varchar(30) not null default '',
	image varchar(255) not null default '',
	type tinyint(1) unsigned not null default 0,
	url varchar(255) not null default '',
	description text not null,
	listorder int(11) unsigned not null default 0,
	status  tinyint(1) unsigned not null default 0,
	create_time int(11) unsigned not null default 0,
	update_time int(11) unsigned not null default 0,
	primary key id(id)
)engine=InnoDB default charset=utf8;





































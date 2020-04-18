drop database gamebook_test;
create database gamebook_test;

create table gamebook_test.game (
    id int(10) unsigned auto_increment,
    title varchar(50),
    image_path varchar(255),
    primary key (id)
);

create table gamebook_test.user (
    id int(10) unsigned auto_increment,
    username varchar(50),
    primary key (id)
);

create table gamebook_test.rating (
    user_id int(10) unsigned,
    game_id int(10) unsigned,
    score tinyint(1),
    primary key (user_id, game_id)
);

insert into gamebook_test.user values(1, 'anna');
insert into gamebook_test.game values(1, 'Game 1', '');
insert into gamebook_test.rating values(1,1,5);
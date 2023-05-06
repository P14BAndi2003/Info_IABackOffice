create database info_ia;
create role info_ia login password 'info_ia';
alter database info_ia owner to info_ia;
\c info_ia info_ia
info_ia


create table admin(
    id serial primary key,
    email varchar(50) not null,
    mdp varchar(50) not null
);

create table auteur(
    id serial primary key,
    email varchar(50) not null,
    mdp varchar(50) not null,
    username varchar(50) not null
);

create table article(
    id serial primary key,
    idauteur int references auteur(id) not null,
    titre text not null,
    image text default null,
    datecreation date default CURRENT_TIMESTAMP,
    contenu text default '',
    statut int default 0,
    description text not null
);

insert into auteur(email,mdp,username) values ('andi@gmail.com','andi1234','Andi Rakotonirina');
insert into auteur(email,mdp,username) values ('rova@gmail.com','rova1234','Rova Robel');

insert into admin(email,mdp) values('admin@gmail.com','admin1234');
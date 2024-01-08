CREATE database wikiservice;
use wikiservice;
CREATE TABLE users(
    id int auto_increment primary key,
    username varchar(255) not null,
    email varchar(255) not null,
    password varchar(255) not null,
    role ENUM('author', 'admin') DEFAULT 'author'   
);

CREATE TABLE category(
    id int auto_increment primary key,
    nom varchar(255) not null
);

CREATE TABLE wikis(
    id int auto_increment primary key,
    title varchar(255),
    content text,
    creation_date datetime DEFAULT CURRENT_TIMESTAMP,
    UPDATE_DATE datetime,
    author_id int ,
    category_id int,
    archived bit DEFAULT 0
);

CREATE TABLE tags(
    id int auto_increment primary key,
    nom varchar(255) not null
);

CREATE TABLE wikis_tags(
    id int auto_increment primary key,
    wikis_id int,
    tag_id int
);

ALTER TABLE wikis ADD FOREIGN KEY (author_id) references users(id) on delete cascade on update cascade; 
ALTER TABLE wikis ADD FOREIGN KEY (category_id) references category(id) on delete cascade on update cascade;

ALTER table wikis_tags ADD FOREIGN KEY (wikis_id) references wikis(id) on delete cascade on update cascade;
ALTER TABLE wikis_tags ADD FOREIGN key (tag_id) references tags(id) on delete cascade on update cascade;
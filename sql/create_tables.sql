-- Lisää CREATE TABLE lauseet tähän tiedostoon

CREATE TABLE users(

id SERIAL PRIMARY KEY,
username varchar(35) NOT NULL,
password varchar(35) NOT NULL
);

CREATE TABLE tasks(

id SERIAL PRIMARY KEY,
title varchar(60) NOT NULL,
priority INTEGER NOT NULL,
done BOOLEAN,
added TIMESTAMP,
info varchar(20000) NOT NULL
);

CREATE TABLE classes(

id SERIAL PRIMARY KEY,
classname varchar(100)
);


CREATE TABLE taskclasses(

tasks_id INTEGER REFERENCES classes (id) ON DELETE CASCADE ON UPDATE CASCADE,
classes_id INTEGER REFERENCES tasks (id) ON DELETE CASCADE ON UPDATE CASCADE
);
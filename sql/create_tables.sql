-- Lisää CREATE TABLE lauseet tähän tiedostoon

CREATE TABLE users(

id SERIAL PRIMARY KEY,
username varchar(35) NOT NULL,
password varchar(35) NOT NULL,
isadmin BOOLEAN DEFAULT FALSE
);

CREATE TABLE tasks(

id SERIAL PRIMARY KEY,
users_id INTEGER REFERENCES users(id),
classname varchar(60),
-- classes_id varchar(4),
title varchar(60) NOT NULL,
priority INTEGER NOT NULL,
done BOOLEAN DEFAULT FALSE,
added TIMESTAMP,
updated TIMESTAMP,
info varchar(20000) NOT NULL
);

CREATE TABLE classes(

id SERIAL PRIMARY KEY,
classname varchar(100)
);


-- CREATE TABLE taskclasses(
-- 
-- id SERIAL PRIMARY KEY,
-- tasks_id INTEGER REFERENCES tasks (id) ON DELETE CASCADE ON UPDATE CASCADE,
-- classes_id INTEGER REFERENCES classes (id) ON DELETE CASCADE ON UPDATE CASCADE
-- );

-- CREATE TABLE taskclasses(
-- 
-- id SERIAL PRIMARY KEY,
-- classes INTEGER REFERENCES classes(id) ON DELETE CASCADE ON UPDATE CASCADE,
-- tasks INTEGER REFERENCES tasks(id) ON DELETE CASCADE ON UPDATE CASCADE
-- );
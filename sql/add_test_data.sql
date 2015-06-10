-- Lisää INSERT INTO lauseet tähän tiedostoon

INSERT INTO users (username, password, isadmin) VALUES ('jaska', 'jaska123', TRUE);

INSERT INTO users (username, password, isadmin) VALUES ('miinaharava', 'miinaharava123', FALSE);

INSERT INTO tasks (title, priority, added, info) VALUES ('Muista vääntää sitä tsohaa <<add-test-dataa>>', '1', NOW(), 'Vko 3, many-to-many esim.');

INSERT INTO tasks (title, priority, done, added, info) VALUES ('Weson reenit <<add-test-dataa>>', '2', true, NOW(), 'Vko 2 loppuun');

INSERT INTO classes (classname) VALUES ('koti');

INSERT INTO classes(classname) VALUES ('koulu');

INSERT INTO classes (classname) VALUES ('tyo');

INSERT INTO classes (classname) VALUES ('harrastus');
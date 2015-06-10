-- Lisää INSERT INTO lauseet tähän tiedostoon

INSERT INTO users (username, password, isadmin) VALUES ('jaska', 'jaska123', TRUE);

INSERT INTO users (username, password, isadmin) VALUES ('miinaharava', 'miinaharava123', FALSE);

INSERT INTO tasks (users_id, title, priority, added, info) VALUES (1, 'Muista vääntää sitä tsohaa', '1', NOW(), 'Vko 3, many-to-many esim.');

INSERT INTO tasks (users_id, title, priority, done, added, info) VALUES (1, 'Weson reenit', '2', true, NOW(), 'Vko 2 loppuun.');

INSERT INTO tasks (users_id, title, priority, added, info) VALUES (1, 'Vie roskat', '5', NOW(), 'Ne on nyt maannu viikon siinä lattialla.');

INSERT INTO tasks (users_id, title, priority, done, added, info) VALUES (1, 'Käy kaupassa', '7', true, NOW(), 'Vehnägluteiinia, leipää ja olutta.');

INSERT INTO tasks (users_id, title, priority, added, info) VALUES (2, 'Vie koira lenkille', '3', NOW(), 'Käy vaikka Pasilan koirapuistossa moikkaamassa kavereita.');

INSERT INTO tasks (users_id, title, priority, done, added, info) VALUES (2, 'Hoida se yks juttu', '5', true, NOW(), 'Lisätiedot löydät jääkaapin ovesta.');

INSERT INTO tasks (users_id, title, priority, added, info) VALUES (2, 'Käy mansikassa', '3', NOW(), 'Niit ois siisti syödä näin kesällä.');

INSERT INTO tasks (users_id, title, priority, done, added, info) VALUES (2, 'Nappaa bini', '9', true, NOW(), 'Niit ois siisti juoda näin kesällä.');

INSERT INTO tasks (users_id, title, priority, added, info) VALUES (1, 'Muista vääntää sitä tsohaa', '1', NOW(), 'Vko 3, many-to-many esim.');

INSERT INTO tasks (users_id, title, priority, done, added, info) VALUES (1, 'Weson reenit', '2', true, NOW(), 'Vko 2 loppuun.');

INSERT INTO tasks (users_id, title, priority, added, info) VALUES (1, 'Vie roskat', '5', NOW(), 'Ne on nyt maannu viikon siinä lattialla.');

INSERT INTO tasks (users_id, title, priority, done, added, info) VALUES (1, 'Käy kaupassa', '7', true, NOW(), 'Vehnägluteiinia, leipää ja olutta.');

INSERT INTO tasks (users_id, title, priority, added, info) VALUES (2, 'Vie koira lenkille', '3', NOW(), 'Käy vaikka Pasilan koirapuistossa moikkaamassa kavereita.');

INSERT INTO tasks (users_id, title, priority, done, added, info) VALUES (2, 'Hoida se yks juttu', '5', true, NOW(), 'Lisätiedot löydät jääkaapin ovesta.');

INSERT INTO tasks (users_id, title, priority, added, info) VALUES (2, 'Käy mansikassa', '3', NOW(), 'Niit ois siisti syödä näin kesällä.');

INSERT INTO tasks (users_id, title, priority, done, added, info) VALUES (2, 'Nappaa bini', '9', true, NOW(), 'Niit ois siisti juoda näin kesällä.');

INSERT INTO tasks (users_id, title, priority, added, info) VALUES (1, 'Muista vääntää sitä tsohaa', '1', NOW(), 'Vko 3, many-to-many esim.');

INSERT INTO tasks (users_id, title, priority, done, added, info) VALUES (1, 'Weson reenit', '2', true, NOW(), 'Vko 2 loppuun.');

INSERT INTO tasks (users_id, title, priority, added, info) VALUES (1, 'Vie roskat', '5', NOW(), 'Ne on nyt maannu viikon siinä lattialla.');

INSERT INTO tasks (users_id, title, priority, done, added, info) VALUES (1, 'Käy kaupassa', '7', true, NOW(), 'Vehnägluteiinia, leipää ja olutta.');

INSERT INTO tasks (users_id, title, priority, added, info) VALUES (2, 'Vie koira lenkille', '3', NOW(), 'Käy vaikka Pasilan koirapuistossa moikkaamassa kavereita.');

INSERT INTO tasks (users_id, title, priority, done, added, info) VALUES (2, 'Hoida se yks juttu', '5', true, NOW(), 'Lisätiedot löydät jääkaapin ovesta.');

INSERT INTO tasks (users_id, title, priority, added, info) VALUES (2, 'Käy mansikassa', '3', NOW(), 'Niit ois siisti syödä näin kesällä.');

INSERT INTO tasks (users_id, title, priority, done, added, info) VALUES (2, 'Nappaa bini', '9', true, NOW(), 'Niit ois siisti juoda näin kesällä.');

INSERT INTO classes (classname) VALUES ('koti');

INSERT INTO classes(classname) VALUES ('koulu');

INSERT INTO classes (classname) VALUES ('tyo');

INSERT INTO classes (classname) VALUES ('harrastus');
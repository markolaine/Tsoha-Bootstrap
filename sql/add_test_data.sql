-- Lisää INSERT INTO lauseet tähän tiedostoon

INSERT INTO users (username, password, isadmin) VALUES ('jaska', 'jaska123', TRUE);

INSERT INTO users (username, password, isadmin) VALUES ('miinaharava', 'miinaharava123', FALSE);

INSERT INTO tasks (users_id, classname, title, priority, added, info) VALUES (1, 'Koulu', 'Muista vääntää sitä tsohaa', '1', NOW(), 'Vko 3, many-to-many esim.');

INSERT INTO tasks (users_id, classname, title, priority, done, added, info) VALUES (1, 'Koulu', 'Weson reenit', '2', true, NOW(), 'Vko 2 loppuun.');

INSERT INTO tasks (users_id, classname, title, priority, added, info) VALUES (1, 'Koti', 'Vie roskat', '5', NOW(), 'Ne on nyt maannu viikon siinä lattialla.');

INSERT INTO tasks (users_id, classname, title, priority, done, added, info) VALUES (1, 'Koti', 'Käy kaupassa', '7', true, NOW(), 'Vehnägluteiinia, leipää ja olutta.');

INSERT INTO tasks (users_id, classname, title, priority, added, info) VALUES (2, 'Koti', 'Vie koira lenkille', '3', NOW(), 'Käy vaikka Pasilan koirapuistossa moikkaamassa kavereita.');

INSERT INTO tasks (users_id, classname, title, priority, done, added, info) VALUES (2, 'Harrastus', 'Hoida se yks juttu', '5', true, NOW(), 'Lisätiedot löydät jääkaapin ovesta.');

INSERT INTO tasks (users_id, classname, title, priority, added, info) VALUES (2, 'Harrastus', 'Käy mansikassa', '3', NOW(), 'Niit ois siisti syödä näin kesällä.');

INSERT INTO tasks (users_id, classname, title, priority, done, added, info) VALUES (2, 'Harrastus', 'Nappaa bini', '9', true, NOW(), 'Niit ois siisti juoda näin kesällä.');

INSERT INTO tasks (users_id, classname, title, priority, added, info) VALUES (1, 'Koulu', 'Muista vääntää sitä tsohaa', '1', NOW(), 'Vko 3, many-to-many esim.');

INSERT INTO tasks (users_id, classname, title, priority, done, added, info) VALUES (1, 'Koulu', 'Weson reenit', '2', true, NOW(), 'Vko 2 loppuun.');

INSERT INTO tasks (users_id, classname, title, priority, added, info) VALUES (1, 'Koti', 'Vie roskat', '5', NOW(), 'Ne on nyt maannu viikon siinä lattialla.');

INSERT INTO tasks (users_id, classname, title, priority, done, added, info) VALUES (1, 'Koti', 'Käy kaupassa', '7', true, NOW(), 'Vehnägluteiinia, leipää ja olutta.');

INSERT INTO tasks (users_id, classname, title, priority, added, info) VALUES (2, 'Koti', 'Vie koira lenkille', '3', NOW(), 'Käy vaikka Pasilan koirapuistossa moikkaamassa kavereita.');

INSERT INTO tasks (users_id, classname, title, priority, done, added, info) VALUES (2, 'Harrastus', 'Hoida se yks juttu', '5', true, NOW(), 'Lisätiedot löydät jääkaapin ovesta.');

INSERT INTO tasks (users_id, classname, title, priority, added, info) VALUES (2, 'Harrastus', 'Käy mansikassa', '3', NOW(), 'Niit ois siisti syödä näin kesällä.');

INSERT INTO tasks (users_id, classname, title, priority, done, added, info) VALUES (2, 'Harrastus', 'Nappaa bini', '9', true, NOW(), 'Niit ois siisti juoda näin kesällä.');

INSERT INTO tasks (users_id, classname, title, priority, added, info) VALUES (1, 'Koulu', 'Muista vääntää sitä tsohaa', '1', NOW(), 'Vko 3, many-to-many esim.');

INSERT INTO tasks (users_id, classname, title, priority, done, added, info) VALUES (1, 'Koulu', 'Weson reenit', '2', true, NOW(), 'Vko 2 loppuun.');

INSERT INTO tasks (users_id, classname, title, priority, added, info) VALUES (1, 'Koti', 'Vie roskat', '5', NOW(), 'Ne on nyt maannu viikon siinä lattialla.');

INSERT INTO tasks (users_id, classname, title, priority, done, added, info) VALUES (1, 'Koti', 'Käy kaupassa', '7', true, NOW(), 'Vehnägluteiinia, leipää ja olutta.');

INSERT INTO tasks (users_id, classname, title, priority, added, info) VALUES (2, 'Koti', 'Vie koira lenkille', '3', NOW(), 'Käy vaikka Pasilan koirapuistossa moikkaamassa kavereita.');

INSERT INTO tasks (users_id, classname, title, priority, done, added, info) VALUES (2, 'Harrastus', 'Hoida se yks juttu', '5', true, NOW(), 'Lisätiedot löydät jääkaapin ovesta.');

INSERT INTO tasks (users_id, classname, title, priority, added, info) VALUES (2, 'Harrastus', 'Käy mansikassa', '3', NOW(), 'Niit ois siisti syödä näin kesällä.');

INSERT INTO tasks (users_id, classname, title, priority, done, added, info) VALUES (2, 'Harrastus', 'Nappaa bini', '9', true, NOW(), 'Niit ois siisti juoda näin kesällä.');

INSERT INTO classes (classname) VALUES ('Koti');

INSERT INTO classes(classname) VALUES ('Koulu');

INSERT INTO classes (classname) VALUES ('Työ');

INSERT INTO classes (classname) VALUES ('Harrastus');
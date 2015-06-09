<?php

$routes->get('/', function() {
    TaskController::index();
});

$routes->get('/muistilista.html', function() {
    HelloWorldController::index();
});

$routes->get('/hiekkalaatikko', function() {
    HelloWorldController::sandbox();
});

$routes->get('/listaus', function() {
    TaskController::listaus();
});
$routes->get('/uusitehtava', function() {
    TaskController::uusitehtava();
});
$routes->get('/muokkaus', function() {
    TaskController::muokkaus();
});

$routes->get('/login', function() {
    UserController::login();
});

$routes->post('/login', function() {
    UserController::handle_login();
});

$routes->post('/tehtavalisatty', function() {
    TaskController::tehtavalisatty();
});

$routes->get('/task/:id', function($id) {
    TaskController::show($id);
});

$routes->get('/teht/:id/muokkaus', function($id) {
    // Pelin muokkauslomakkeen esittäminen
    TaskController::edit($id);
});
$routes->post('/teht/:id/muokkaus', function($id) {
    // Pelin muokkaaminen
    TaskController::update($id);
});

$routes->post('/task/:id/destroy', function($id) {
    TaskController::destroy($id);
});

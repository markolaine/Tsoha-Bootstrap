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

$routes->get('/listaus/admin', function() {
    TaskController::listausAdmin();
});

$routes->get('/listaus/suoritetut', function() {
    TaskController::listausDone();
});

$routes->get('/listaus/suorittamatta', function() {
    TaskController::listausNotDone();
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

$routes->post('/register', function() {
    UserController::store();
});

$routes->post('/logout', function() {
    UserController::logout();
});

$routes->post('/tehtavalisatty', function() {
    TaskController::tehtavalisatty();
});

//$routes->get('/task/:id', function($id) {
//    TaskController::show($id);
//});

$routes->get('/teht/:id/muokkaus', function($id) {
    TaskController::edit($id);
});
$routes->post('/teht/:id/muokkaus', function($id) {
    TaskController::update($id);
});

$routes->post('/task/:id/destroy', function($id) {
    TaskController::destroy($id);
});

$routes->post('/task/:id/done', function($id) {
    TaskController::done($id);
});

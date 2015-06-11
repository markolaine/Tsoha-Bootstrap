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

$routes->get('/admin', function() {
    TaskController::listausAdmin();
});

$routes->get('/admin/users', function() {
    UserController::listausAdmin();
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

$routes->post('/newadmin/:id', function($id) {
    UserController::newadmin($id);
});

$routes->post('/deleteadmin/:id', function($id) {
    UserController::deleteadmin($id);
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

$routes->get('/teht/:id/admin/muokkaus', function($id) {
    TaskController::adminedit($id);
});

$routes->get('/teht/:id/show', function($id) {
    TaskController::show($id);
});

$routes->get('/teht/:id/admin/show', function($id) {
    TaskController::adminshow($id);
});

$routes->post('/teht/:id/muokkaus', function($id) {
    TaskController::update($id);
});

$routes->post('/teht/:id/admin/muokkaus', function($id) {
    TaskController::adminupdate($id);
});

$routes->post('/task/:id/destroy', function($id) {
    TaskController::destroy($id);
});

$routes->post('/task/:id/admin/destroy', function($id) {
    TaskController::admindestroy($id);
});

$routes->post('/task/:id/done', function($id) {
    TaskController::done($id);
});
//
//$routes->post('/task/:id/showdone', function($id) {
//    TaskController::showdone($id);
//});

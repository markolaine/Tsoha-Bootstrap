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
    TaskController::login();
});

$routes->post('/tehtavalisatty', function() {
    TaskController::tehtavalisatty();
});

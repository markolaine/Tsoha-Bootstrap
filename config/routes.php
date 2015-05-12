<?php

  $routes->get('/', function() {
    HelloWorldController::index();
  });
  
    $routes->get('/muistilista.html', function() {
    HelloWorldController::index();
  });

  $routes->get('/hiekkalaatikko', function() {
    HelloWorldController::sandbox();
  });

  $routes->get('/listaus', function() {
  HelloWorldController::listaus();
});
$routes->get('/uusitehtava', function() {
  HelloWorldController::uusitehtava();
});
$routes->get('/muokkaus', function() {
  HelloWorldController::muokkaus();
});

$routes->get('/login', function() {
  HelloWorldController::login();
});
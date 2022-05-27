<?php

require_once("vendor/autoload.php");

use \Slim\Slim;
// use \Hcode\Page;
use Hcode\Pages;
use Hcode\PagesAdmin;

$app = new Slim();

$app->config('debug', true);

$app->get('/', function () {

	$page = new Pages();

	$page->setTpl("index");
});

$app->get('/admin', function () {

	$page = new PagesAdmin();

	$page->setTpl("index");
});

$app->run();

?>
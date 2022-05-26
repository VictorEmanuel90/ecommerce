<?php

require_once("vendor/autoload.php");

use \Slim\Slim;
use \Hcode\Page;
use Hcode\Pages;

$app = new Slim();

$app->config('debug', true);

$app->get('/', function () {

	$page = new Pages();

	$page->setTpl("index");
});

$app->run();

?>
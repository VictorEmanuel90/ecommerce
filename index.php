<?php

session_start();
require_once("vendor/autoload.php");

use \Slim\Slim;
// use \Hcode\Page;
use \Hcode\Pages;
use \Hcode\PagesAdmin;
use \Hcode\Model\User;

$app = new Slim();

$app->config('debug', true);

$app->get('/', function () {

	$page = new Pages();

	$page->setTpl("index");
});

$app->get('/admin', function () {

	User::verifyLogin();

	$page = new PagesAdmin();

	$page->setTpl("index");
});

$app->get('/admin/login', function () {

	$page = new PagesAdmin([
		"header"=>false,
		"footer"=>false
	]);

	$page->setTpl("login");

});

$app->post('/admin/login', function () {

	User::login($_POST["login"], $_POST["password"]);

	header("Location: /admin");
	exit;


});

$app->get('/admin/logout', function () {

	User::logout();

	header("Location: /admin/login");
	exit;

});

$app->run();

?>
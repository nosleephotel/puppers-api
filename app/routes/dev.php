<?php

use Puppers\User;
use Puppers\Dog;

$app->get('/dev', function($req, $res, $args){
	$users = User::all();
	return $res->withStatus(200)->withJson($users);
});

$app->get('/dev/dogs', function($req, $res, $args){
	$dogs = Dog::all();
	return $res->withStatus(200)->withJson($dogs);
});

$app->get('/dev/dogs/{dog_id}', function($req, $res, $args){
	$dogId = $args["dog_id"];
	$dogs = Dog::find($dogId);
	return $res->withStatus(200)->withJson($dogs);
});

$app->post('/dev/dogs', function($req, $res, $args){
	$post = $req->getParsedBody();
	$dogs = Puppers\Dog::create(['name' => $post["name"], 'age' => $post["age"], 'breed' => $post["breed"]]);
	return $res->withStatus(200)->withJson($post);
});

$app->delete('/dev/dogs/{dog_id}', function($req, $res, $args){
	$dogId = $args["dog_id"];
	$dogs = Dog::destroy($dogId);
	return $res->withStatus(200)->withJson($dogs);
});

$app->post('/dev/dogs/{dog_id}', function($req, $res, $args){
	$post = $req->getParsedBody();
	$dogId = $args["dog_id"];
	$dogs = Dog::find($dogId);
	$dogs->name = $post["name"];
	$dogs->age = $post["age"];
	$dogs->breed = $post["breed"];
	$dogs->save();
	return $res->withStatus(200)->withJson($dogs);
});

?>

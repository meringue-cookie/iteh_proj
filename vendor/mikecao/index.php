<?php
require 'flight/Flight.php';
require 'jsonindent.php';
Flight::register('db', 'Database', array('crm'));
Flight::route('/', function(){

	$curl = curl_init("http://api.openweathermap.org/data/2.5/weather?q=Belgrade&APPID=6ed5b817a20c9a16855a877246d38576");
	curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
	$jsonOdgovor = curl_exec($curl);
	curl_close($curl);
	echo($jsonOdgovor);
});


Flight::route('GET /kupci', function()
{
	header("Content-Type: application/json; charset=utf-8");
	$db = Flight::db();
	$db->sviKupci();

	$niz =  array();
	$iterator = 0;
	while ($red = $db->getResult()->fetch_object())
	{
		$niz[$iterator] = $red;
		$iterator += 1;
	}

	echo indent(json_encode($niz));
});
Flight::route('GET /proizvodi', function()
{
	header("Content-Type: application/json; charset=utf-8");
	$db = Flight::db();
	$db->sviProizvodi();

	$niz =  array();
	$iterator = 0;
	while ($red = $db->getResult()->fetch_object())
	{
		$niz[$iterator] = $red;
		$iterator += 1;
	}

	echo indent(json_encode($niz));
});
Flight::route('GET /kampanje', function()
{
	header("Content-Type: application/json; charset=utf-8");
	$db = Flight::db();
	$db->sveKampanje();

	$niz =  array();
	$iterator = 0;
	while ($red = $db->getResult()->fetch_object())
	{
		$niz[$iterator] = $red;
		$iterator += 1;
	}

	echo indent(json_encode($niz));
});

Flight::route('GET /proizvodi/@id', function($id)
{
	header("Content-Type: application/json; charset=utf-8");
	$db = Flight::db();
	$db->jedanProizvod($id);

	$niz =  array();
	$iterator = 0;
	while ($red = $db->getResult()->fetch_object())
	{
		$niz[$iterator] = $red;
		$iterator += 1;
	}

	echo indent(json_encode($niz));
});

Flight::start();
?>

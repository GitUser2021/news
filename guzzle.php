<?php

require 'vendor/autoload.php';

use GuzzleHttp\Client;

define("URL_API", "http://newsapi.org/");
define("ENDPOINT_1", 'v2/everything?');
define("ENDPOINT_2", 'v2/top-headlines?');
define("APIKEY", 'apiKey=xxx');
define("COUNTRY", 'ar');
define("LANGUAGE", 'es');
define('PAGE_SIZE', 10);
$news     = null;
$response = null;
$q        = urlencode($_GET['q'] ?? '');
$category = $_GET['category'] ?? 'general';
$page     = $_GET['page'] ?? 1;

$client   = new Client(['base_uri' => URL_API]);

if ($q == '')
    $response = $client->request('GET', ENDPOINT_2 . 'country=' . COUNTRY . '&category=' . $category . '&q=' . $q . '&pageSize=' . PAGE_SIZE . '&page=' . $page . '&' . APIKEY);
else
    $response = $client->request('GET', ENDPOINT_1 . '&q=' . $q . '&language=' . LANGUAGE . '&pageSize=' . PAGE_SIZE . '&page=' . $page . '&' . APIKEY);

$news = json_decode($response->getBody()->getContents());

// esto es porque algunos json vienen con errores, aca reemplazo un error que encontre  .
foreach ($news->articles as $article) {
    $article->description = str_replace('<!-- BR', '', $article->description);
}
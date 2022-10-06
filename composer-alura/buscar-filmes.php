<?php


use GuzzleHttp\Client;
use Symfony\Component\DomCrawler\Crawler;

require_once "vendor/autoload.php";

$client = new Client();
$resposta = $client->request('GET','https://filmow.com/listas/documentarios-que-vao-expandir-sua-visao-do-mundo-l10957/');

$html = $resposta->getBody();

$crawler = new  Crawler();
$crawler->addHtmlContent($html);
$filmes =$crawler->filter('span.title');

foreach($filmes as $filme){

    echo $filme->textContent ."<br>";
}
<?php


namespace App\Service;


use Symfony\Component\HttpClient\HttpClient;

class Repos
{
    private $client;

    public function __construct()
    {
        $client  = HttpClient::create();
        $this->client = $client;
    }
 public function GetRepos (){
     $endOfCycle = date("Y-m", strtotime("-1 months"));

     $response = $this->client->request(
         'GET',
         "https://api.github.com/search/repositories?q=created:>$endOfCycle&sort=stars&order=desc&per_page=100"
     );

     return $response->toArray();

 }

}
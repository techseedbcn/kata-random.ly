<?php

namespace App\Models;

use Goutte\Client;

class Scrapy 
{
   private $client;

   public function __construct()
   {
       $this->client = new Client();
   }

   public function getKatas(string $url)
   {
       $crawler = $this->client->request('GET', $url);

       $katas = [];
       $crawler->filter('div[class="media-content"] > div[class="content"] > p > a[class="title is-3"] > strong')
        ->each (function($kataNode) use (&$katas) {
            $kataTitle = $kataNode->text();
           $katas[] = $kataTitle;
         });
       
        return $katas;
   }

   
}

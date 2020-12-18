<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Scrapy;

class ScrapyTest extends TestCase
{
    public function testExample()
    {
        $scrapy = new Scrapy();

        $katas = $scrapy->getKatas('https://kata-log.rocks/');

        $this->assertEquals(31, count($katas));
        $this->assertIsArray($katas);
        $this->assertEquals('Banking Kata', $katas[0]);
        $this->assertEquals('Yatzy Kata', $katas[30]);
    }
}

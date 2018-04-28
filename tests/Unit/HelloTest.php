<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\DatabaseMigrations;

use App\Model\Item;


class HelloTest extends TestCase
{
    //↓migration機能(テーブルの自動作成、ドロップ)
    //差分が発生するのでいらないかも・・・
    //use DatabaseMigrations;
    public $item;

    public function setup()
    {
      parent::setUp();
      //データのインサート
      factory(Item::class)->create([
        'title' => 'rookeis',
        'movie_url' => 'http://www.yahoo.co.jp'
      ]);

      factory(Item::class,10)->create();
      $this->item = new Item();
    }

    /**
     * A basic test example.
     *
     * @return void
     */
    public function testExample()
    {

        $this->item->hogehoge2('aaaaa');
        $this->assertTrue(true);

    }

    public function tearDown()
    {
        $this->item->truncate();
        parent::tearDown();
    }
}

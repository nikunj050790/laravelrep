<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

use Elasticsearch\ClientBuilder;

use App\Article;

class UserTest extends TestCase
{
    
    use DatabaseTransactions;

    public function testElasticSearch()
    {
        $articles = Article::search('yoyo');
        
        $this->assertNotEquals(0, $articles->totalHits());
        
        $articles = Article::search('randomgibberish');
        
        $this->assertEquals(0, $articles->totalHits());
    }
    
    public function testElasticSearchByQuery()
    {
        $articles = Article::searchByQuery([
                                      "bool" => [
                                        'must' => [
                                          'multi_match' => [
                                            'query' => 'et',
                                            'fields' => [ "title^2", "price"]
                                          ],
                                        ],
                                        "should" => [
                                          'match' => [
                                            'tags' => [
                                              "query" => 'nulla',
                                              "type" => "phrase"
                                            ]
                                          ]
                                        ]
                                      ]
                                    ]);
        
        $this->assertNotEquals(0, $articles->totalHits());
                                            
    }    
    
    public function testAddElasticArticle()
    {
        $article = new Article;
        
        $article->title = 'kkmaca';
        $article->price = 'kkmaca content gangnam';
        $article->author = 'kkmaca';
        $article->save();
        
        $res = $article->addToIndex();

        $this->assertEquals(true, $res["created"]);

        $article->removeFromIndex();
    }
    
    public function testUpdateElasticArticle()
    {
        $article = new Article;
        
        $article->title = 'kkmaca2';
        $article->price = 'kkmaca content gangnam';
        $article->author = 'kkmaca';
        $article->save();
        
        $res = $article->addToIndex();
        
        $article->title = 'ppmaca';
        $res = $article->save();

        $this->assertEquals(1, $res);
        
        $article->removeFromIndex();
    }
    
    public function testRemoveElasticArticle()
    {
        $article = new Article;
        
        $article->title = 'kkmaca3';
        $article->price = '50';
        $article->author = 'kkmaca';
        $article->save();
        
        $article->addToIndex();
        
        $res = $article->removeFromIndex();        
        
        $this->assertEquals(1, $res["_shards"]["successful"]);
    }
}

<?php
namespace App;
use Jenssegers\Mongodb\Eloquent\Model as Eloquent;
use Elasticquent\ElasticquentTrait;
use DB;

class Article extends Eloquent
{
    use ElasticquentTrait;
    protected $connection = 'mongodb';
    protected $collection = 'Articles';
    public $fillable = ['title', 'price', 'author'];

    private $mapProps = array(
        'title' => [
          'type' => 'string',
          "analyzer" => "standard",
        ],
        'price' => [
          'type' => 'string',
          "analyzer" => "standard",
        ],
        'author' => [
          'type' => 'string',
          "analyzer" => "myAnalyzer",
        ],
    ); 
    
    private $customAnalyzer = array(
        'myAnalyzer' => [
            'type' => 'stop',
            "stopwords" => [","]
        ]        
    );

    public static function createIndexWithCustomAnalyzer($shards = null, $replicas = null)
    {
        $instance = new static;

        $client = $instance->getElasticSearchClient();

        $params = [
            'index' => 'default',
            'body' => [
                'settings' => [ 
                    'number_of_shards' => $shards,
                    'number_of_replicas' => $replicas,
                    'analysis' => [ 
                        'analyzer' => $instance->customAnalyzer,
                    ]
                ],
                'mappings' => [ 
                    'articles' => [    
                        'properties' => $instance->mapProps,
                    ],
                ]
            ]
        ];

        return $client->indices()->create($params);
    }
}

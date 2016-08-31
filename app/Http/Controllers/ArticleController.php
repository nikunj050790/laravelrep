<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Article;
use App\Http\Requests;
use Elasticsearch\ClientBuilder;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    protected $article;
    public function __construct(Article $articles)
    {
        $this->article = $articles;
        //$this->articles->addAllToIndex();
        //$this->articles->reindex();
        $client = ClientBuilder::create()->build();
        
        $params1 = [
            'index' => 'myapp',
            'type' => 'hotel',
            'id' => '1',
            'body' => [
                'name' => 'courtyard marriott',
                'company' => 'marriott',
                'location' => 'ahd',
                'floor_levels' => 10,
                'features' => ['wifi', 'pool', 'bar', 'restaurant'],
            ]
        ];

        $response1 = $client->index($params1);

        // $params = [
        //     'index' => 'articles',
        //     'type' => 'string',
        //     'body' => [
        //         'query' => [
        //             'match' => [
        //                 'title' => 'yoyo'
        //             ]
        //         ]
        //     ]
        // ];

        // $response = $client->search($params);
        // echo "<pre>"; print_r($response);

        // $params = [
        //     'index' => 'nikunj11',
        //     'type' => 'test',
        //     'id' => 'my_id'
        // ];

        // $response = $client->delete($params);
        // print_r($response);

        // $deleteParams = [
        //     'index' => 'nikunj11'
        // ];
        // $response = $client->indices()->delete($deleteParams);
        print_r($response1);

        // $art = $this->article->search('yoyo');
        // echo $art->totalHits();
        // echo "<pre>"; print_r($art);

        //$client = $instance->getElasticSearchClient();
        
    }

    public function index()
    {
        
        //$art = $this->article->searchByQuery(array('match' => array('title' => 'GOT2')));
        //return $art;

        //$art = $this->article->search('3 idiots');
        // $art->totalHits();
        //echo "<pre>"; print_r($art);
        //echo $art->shards();
        //echo $art->maxScore();
        //echo $art->took();

        //var_dump($this->article->totalHits());

        // $this->article->title = 'yoyo';
        // $this->article->price = 50;
        // $this->article->author = "nick";
        // $this->article->save();   
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

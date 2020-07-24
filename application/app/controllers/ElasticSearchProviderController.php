<?php
declare(strict_types=1);

use Phalcon\Http\Client\Request;
use Phalcon\Mvc\Controller;

class ElasticSearchProviderController extends Controller
{
    private const ES_BASE_URI = 'http://elasticsearch:9200/';
    private const ES_INDEXES_NAMES = ['company', 'security', 'company_security'];

    public function indexAction()
    {
        //Init client
        try {
            $provider = Request::getProvider();
        } catch (\Phalcon\Http\Client\Provider\Exception $e) {
            return $this->response
                ->setJsonContent("Error getting client provider, please try again...")
                ->setStatusCode(500)
                ->send()
                ;
        }
        $provider->setBaseUri(self::ES_BASE_URI);
        $provider->header->set('Accept', 'application/json');

        //Requests for indexes data
        $data = [];

        foreach (self::ES_INDEXES_NAMES as $esIndexName) {
            $response = $provider->get($esIndexName . '/_search');
            if (200 !== $response->header->statusCode) {
                return $this->response
                    ->setJsonContent("Error getting data from ElasticSearch on index $esIndexName, please try again...")
                    ->setStatusCode(500)
                    ->send()
                    ;
            }
            $responseData = json_decode($response->body, true);
            foreach ($responseData['hits']['hits'] as $hit) {
                $data[$esIndexName][] = $hit['_source'];
            }
        }

        return $this->response
            ->setJsonContent($data)
            ->setStatusCode(200)
            ->send()
            ;
    }
}


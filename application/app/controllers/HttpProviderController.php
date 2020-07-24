<?php
declare(strict_types=1);

use Phalcon\Http\Client\Request;
use Phalcon\Mvc\Controller;

class HttpProviderController extends Controller
{
    private const BASE_URI = 'https://gdh2webfgapi.webfg.com:8088/v1/';
    private const UNIQ_FIELD_TO_MERGE_SOURCES = 'codeSecurity';
    private const DATA_SOURCES = [
        [
            'endpointPath' => 'gdh/codeconverter/sab/?code_security=1829035&solution_symbol=SABWEB',
            'fieldsToKeep' => ['codeKey'],
        ],
        [
            'endpointPath' => 'gdh/marketdata/sab/?code_security=1829035&solution_symbol=SABWEB',
            'fieldsToKeep' => ['codeSecurity', 'nameAsset', 'trade'],
        ],
    ];

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
        $provider->setBaseUri(self::BASE_URI);
        $provider->header->set('Accept', 'application/json');

        $mergedData = [];

        foreach (self::DATA_SOURCES as $dataSourceConfig) {
            //Request to data source for data
            $response = $provider->get($dataSourceConfig['endpointPath']);
            $responseData = json_decode($response->body, true);
            if ('SUCCESS' !== $responseData['_meta']['status']) {
                return $this->response
                    ->setJsonContent('Error reaching information sources, please try again...')
                    ->setStatusCode(500)
                    ->send()
                    ;
            }

            //Loop source data fields and keep needed indexed by uniq field
            foreach ($responseData['records'] as $record) {
                $key = $record[self::UNIQ_FIELD_TO_MERGE_SOURCES];
                (isset($mergedData[$key])) ?: $mergedData[$key] = [];
                foreach ($dataSourceConfig['fieldsToKeep'] as $fieldToKeep) {
                    $mergedData[$key][$fieldToKeep] = $record[$fieldToKeep];
                }
            }
        }

        return $this->response
            ->setJsonContent(array_values($mergedData))
            ->setStatusCode(200)
            ->send()
            ;
    }
}

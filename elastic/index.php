<?php
    require 'vendor/autoload.php';

    $hosts = [
    'localhost:9200'
];

$client = Elasticsearch\ClientBuilder::create()
    ->setHosts($hosts)->build();
/* 
$params = [
    'index' => 'index',
    'type' => '1',
    'body' => [
        'query' => [
            'match' => [
                'Description' => 'can',
            ]
        ]
    ]
];
try {
  $docs = $client->search($params);
  print "<pre>";
  print_r($docs);
  print "</pre>";
} catch (Exception $e) {
 print "<pre>";
  print_r($e);
  print "</pre>";
} */

/* $params = [
    'message' => 'lorem ipsum'
];

$response = $client->put($params);
print_r($response); */
// $params = [
    // 'index' => 'document',
    // 'type' => '1',
    // 'id' => '1',
    // 'body' => ['testField' => 'lorem ipsum dolor ipsum']
// ];

// $response = $client->index($params);
// print "<pre>";
// print_r($response);

$params = [
    'index' => 'document',
    'type' => '1',
    'body' => [
        'query' => [
            'match' => [
                'testField' => 'abc',
            ]
        ]
    ]
];




try {
  $docs = $client->search($params);
  print "<pre>";
  print_r($docs);
  print "</pre>";
} catch (Exception $e) {
 print "<pre>";
  print_r($e);
  print "</pre>";
}

?>
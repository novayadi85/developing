<?php
require __DIR__.'/vendor/autoload.php';

use Kreait\Firebase\Factory;
use Kreait\Firebase\ServiceAccount;

$serviceAccount = ServiceAccount::fromJsonFile(__DIR__.'/Siteloom App-7480c116c797.json');

$firebase = (new Factory)
    ->withServiceAccount($serviceAccount)
    ->withDatabaseUri('https://siteloom-app.firebaseio.com')
    ->create();

$database = $firebase->getDatabase();
$collections = array(
	array(
		'id' => 1,
		'title' => 'Bundle',
		'updated' => '2018-01-01',
		'rules' => array(),
		'active' => true
	),
	array(
		'id' => 2,
		'title' => 'By One Get On Free',
		'updated' => '2018-01-01',
		'rules' => array(),
		'active' => true
	),
	array(
		'id' => 3,
		'title' => 'Valentine Offer',
		'updated' => '2018-01-01',
		'rules' => array(),
		'active' => false
	),
	
);



/*  $newPost = $database
    ->getReference('blog/posts')
    ->push(array(
			'id' => 2,
			'title' => 'Bundle',
			'updated' => '2018-01-01',
			'rules' => array(),
			'active' => true
		));  */

//$newPost->getKey(); // => -KVr5eu8gcTv7_AHb-3-
//$newPost->getUri(); // => https://my-project.firebaseio.com/blog/posts/-KVr5eu8gcTv7_AHb-3-

/* $newPost->getChild('title')->set('Changed post title');
$newPost->getValue(); // Fetches the data from the realtime database
$newPost->remove(); */

/* $snapshot = $database->getReference('blog/posts')
    // order the reference's children by their key in ascending order
    ->shallow()
    ->getSnapshot();
$values = $snapshot->getValue(); */

//$snapshot = $database->getReference('sl_offers')->getValue();

//$snapshot = $database->getReference('blog/posts')->set('-L2dSphZr3hgtiR2VKWP');
//$snapshot = $database->getReference('blog/posts')->getValue();


	
$newPost =	$database->getReference('sl_offers');
$newPost->getUri('https://siteloom-app.firebaseio.com/sl_offers/-L2ddU32iYstt3k5AqtI');
$snapshot = $newPost->getValue();
	
print "<pre>";
print_r($snapshot);



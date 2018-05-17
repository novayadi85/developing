<?php
require_once 'vendor/autoload.php';

use yuanstudio\shopifyHack\Helper as Helper;
use yuanstudio\shopifyHack\Hack as Hacking;
use App\Shopify\Debug as Debug;

print "<pre>";
$data = (['test' => 'dua']);
$data2 = (['test2']);
$debug = new App\Shopify\Debug();
$response = $debug->hirarcy();
$arraymenu = ($response);
print_r($arraymenu);
array_push($data,$data2);
print_r($data);
print "</pre>";


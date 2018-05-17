<?php 
namespace App\Shopify;

class Orders  {
	
	public $client ;
	
	function __construct($shopifyClient){
		$this->client = $shopifyClient;
	}
}
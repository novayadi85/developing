<?php 
namespace yuanstudio\shopifyHack;

class Products  {
	
	public $client ;
	
	function __construct($shopifyClient){
		$this->client = $shopifyClient;
	}
}
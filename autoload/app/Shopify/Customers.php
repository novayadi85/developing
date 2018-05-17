<?php 
namespace yuanstudio\shopifyHack;

class Customers  {
	
	public $client ;
	
	function __construct($shopifyClient){
		$this->client = $shopifyClient;
	}
}
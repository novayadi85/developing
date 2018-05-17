<?php 
$carts = array(
	"carts" => array(
		"item_count" => 10,
		"items" => array(
			array(
				"id" => 6823040024636,
				"quantity" => 3,
				"variant_id" => 6823040024636
			),
			array(
				"id" => 6823040024637,
				"quantity" => 2,
				"variant_id" => 6823040024637
			),
			array(
				"id" => 6823040024638,
				"quantity" => 4,
				"variant_id" => 6823040024638
			),
			array(
				"id" => 6823040024639,
				"quantity" => 1,
				"variant_id" => 6823040024639
			)
		)
	)
);


$offers = array(
	array(
		"id" => 1,
		"products" => array(
			array(
				"id"=> 123,
				"variant_id" => 6823040024639
			),
			array(
				"id"=> 123,
				"variant_id" => 6823040024638
			)
		),
		"quantity" => array(
			1,1
		),
		"amount" => 5
	),
	array(
		"id" => 2,
		"products" => array(
			array(
				"id"=> 124,
				"variant_id" => 6823040024636
			),
			array(
				"id"=> 124,
				"variant_id" => 6823040024637
			)
		),
		"quantity" => array(
			2,2
		),
		"amount" => 2
	)
);

$discounts = array();

foreach($offers as $offer){
	
	//start logika
	$isValid = array();
	foreach($carts["carts"]["items"]  as $key => $cart){
		if(sizeof($offer["products"])){
			foreach($offer["products"] as $k => $product){
				if($cart["variant_id"] == $product["variant_id"] && $offer["quantity"][$k] <= $carts["carts"]["items"][$key]["quantity"]){
					$isValid[] = array(
						"variant_id" => $product["variant_id"],
						"variant_id" => $product["variant_id"],
						"qty" => $offer["quantity"][$k],
						"key" => $key
					);
					$carts["carts"]["items"][$key]["quantity"] = ($carts["carts"]["items"][$key]["quantity"] - $offer["quantity"][$k]);
				}
			}

			$carts["carts"]["items"][$key]["quantity"] = $cart["quantity"];
			
			
		}
		
	}

	if(sizeof($isValid) == sizeof($offer["products"])){
		foreach($isValid as $valid){
			if(isset($carts["carts"]["items"][$valid["key"]])){
				$carts["carts"]["items"][$valid["key"]]["quantity"] = ($carts["carts"]["items"][$valid["key"]]["quantity"] - $valid["qty"]);
			}
		}
		$discounts[] = array(
			"offerId" => $offer["id"],
			"amount" => $offer["amount"]
		);
	}
	//end logika
	
	
}

print "<pre>";
print_r($carts);
print_r($discounts);
print "</pre>";

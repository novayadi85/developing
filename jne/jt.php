<?php 
/* $curl = curl_init();
$data = array
(
   'cusName' => 'HR',
   'sendSiteCode' => 'JAKARTA',
   'destAreaCode' => 'DENPASAR',
   'weight' => 1,
);
$key = "HR001188";
$data_request = array
(
   'data' => json_encode($data),
   'sign' => base64_encode(md5(json_encode($data).$key)),
);

curl_setopt_array($curl, array(
	CURLOPT_URL => "http://jk.jet.co.id:22230/jandt_track/inquiry.action",
	CURLOPT_RETURNTRANSFER => true,
	CURLOPT_ENCODING => "",
	CURLOPT_MAXREDIRS => 10,
	CURLOPT_TIMEOUT => 30,
	CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
	CURLOPT_CUSTOMREQUEST => "POST",
	CURLOPT_POSTFIELDS => $data_request,
	
));

$response = curl_exec($curl);

print "<pre>";
print_r(json_decode($response,true));
print "</pre>"; */


require_once __DIR__ . '/vendor/autoload.php';
/* $demo = new \SqlFire\SayHello();
echo $demo->world(); */
$inputFileName = "JNT kota kecamatan.xlsx";
echo 'Loading file ',pathinfo($inputFileName,PATHINFO_BASENAME),' using IOFactory to identify the format<br />';
$objPHPExcel = PHPExcel_IOFactory::load($inputFileName);

$importData = array();
$sheetData = $objPHPExcel->getActiveSheet()->toArray(null,true,true,true);
$provinces = array();
$cities = array(
	array(
		'region_code', 'city_name', 'app_id'
	)
);

$town = array(
	array(
		'region','city','subdistrict','postcode'
	)
);
if(sizeof($sheetData)){
	foreach($sheetData as $key => $data){
		if($key > 1){
			$provinces[$data["A"]] = $data["A"];
			$id = substr($data["A"], 0, 2);
			$cities[$data["B"]] = array("region_id" => $data["A"], "city_name" => ucfirst(strtolower($data["C"])) , "app_id" => $data["B"]);
			$town[] = array(
				'region' => ucfirst(strtolower($data["A"])),
				'city' => ucfirst(strtolower($data["C"])),
				'subdistrict' => ucfirst(strtolower($data["D"])),
				'postcode' => ''
			);
		}
	}
}

$i=1;
$data = array(
	array(
		'region_code', 'city_name', 'app_id'
	)
);
$rows = array(
	array(
		"country_id","code","default_name","app_id"
	)
);

if(sizeof($provinces)){
	$ids = array();
	$Dataprovinces = array();
	foreach($provinces as $key => $province){
		$i++;
		$content = preg_replace("/[^A-Za-z0-9?!]/", "", $province);
		//print $content;
		$id = substr($content, 0, 2);
		
		if(in_array($id,$ids)){
			$id = substr($id, 0, 1);
			if(strlen($i) > 1){
				$id =  $i;
			}
			else{
				$id = $id . $i;
			}
		}
		
		$rows[] = array(
			"ID",
			"ID-".$id,
			ucfirst(strtolower($province)),
			$i
		);
		$Dataprovinces[$province] = "ID-".$id;
		$ids[] = $id;
	}
}



if(sizeof($cities)){
	foreach($cities as $key => $city){
		if(isset($city["region_id"]) && isset($Dataprovinces[$city["region_id"]])){
			$cities[$key]["region_id"] = $Dataprovinces[$city["region_id"]];
		}
	}
}

$csvFile = new Keboola\Csv\CsvFile(__DIR__ . '/provinces-jt.csv');
foreach ($rows as $row) {
	$csvFile->writeRow($row);
} 

$csvFile = new Keboola\Csv\CsvFile(__DIR__ . '/cities-jt.csv');
foreach ($cities as $row) {
	$csvFile->writeRow($row);
} 

print "<pre>";
print_r($Dataprovinces);
print_r($cities);
print "</pre>"; 

<?php 
$curl = curl_init();
$data = array
(
   'cusName' => 'HR',
   'sendSiteCode' => 'JAKARTA',
   'destAreaCode' => 'SUATOR',
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

/* print "<pre>";
$body = (json_decode($response,true));
print_r(json_decode($body["content"],true));
print "</pre>"; */


$curl = curl_init();
$data_request = array
(
   'billcode' => "JNT-AWB-001",
   'lang' => 'id',
   'pictype' => 'sj,yn,lc,qs',
   'sign' => md5(date('Ymd').'YnTrackQuery'."JNT-AWB-001"),
);

curl_setopt_array($curl, array(
	CURLOPT_URL => "http://jk.jet.co.id:22230/jandt_track/trackToJson.action",
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
$body = (json_decode($response,true));
print_r($body);
print "</pre>";

$contoh = '[{
   "result" :
   {
      "traces" :
      {
         "billcode" : "JNT-AWB-001",
         "details" : 
         [
            {
               "acceptTime" : "2016-11-16 16:16:16",
               "remark" : "TerimaPaket",
               "acceptAddress" : "",
            }
            {
               "acceptTime" : "2016-11-16 17:16:16",
               "remark" : "KirimPaket",
               "acceptAddress" : "",
            }
            {
               "acceptTime" : "2016-11-16 18:16:16",
               "remark" : "Sampai",
               "acceptAddress" : "",
            }
            {
               "acceptTime" : "2016-11-16 19:16:16",
               "remark" : "Kirim",
               "acceptAddress" : "",
            }
            {
               "acceptTime" : "2016-11-16 20:16:16",
               "remark" : "TandaTerima",
               "acceptAddress" : "",
            }
         ]
      }
   }
}]';

$contoh = str_replace('"',"'",$contoh);
print_r(json_decode($contoh));
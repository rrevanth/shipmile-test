<?php

include "./vendor/autoload.php";

$apiKey = // Fill your api key here
$pickup_location = //fill your pickup location here;


$shipmileInstance = new Shipmile\Client($apiKey, array('mode' => 'test'));
//Create order:
$shipmile_order= array();
$shipmile_order["pickup_location"] = $pickup_location;
//This contains an array of orders to be pushed
$shipmile_order["shipments"] = array();
//structure of each shipment object
//$json='
$json = '{
   "reference":"WHOZHIGHHYD001",
   "payment_type":"Prepaid",
   "receiver":{
      "name1":"Karthik",
      "street1":"Add, GK1",
      "pincode":"110048",
      "city":"Delhi",
      "state":"Telangana",
      "phone":"7731826094"
   },
   "details":{
      "value":399,
      "weight":300
   },
   "invoice":{
      "items":[
        {
            "quantity":1,
            "tax_rate":5,
            "description":"Whozhigh Vneck",
            "inclusive":true,
            "gross":399,
            "net":399,
            "tax_amount":19.95,
            "discount":0
         }
      ],
      "shipping_details":{
         "tax_rate":0,
         "inclusive":false,
         "gross":0,
         "net":0,
         "tax_amount":0,
         "discount":0
      },
      "billing_date":"2015-07-22T22:36:14+05:30",
      "invoice_number":"SHML/1/1",
      "order_id":"WHOZHIGHHYD001"
   }
}';
$result = json_decode ($json);

echo "RESULT :";
array_push($shipmile_order["shipments"],$result);
$create_body = array("body" => $shipmile_order);

$response = $shipmileInstance->orders()->create($create_body);

echo $response->code;

echo print_r($response->body);
//echo print_r($shipmileInstance);
?>

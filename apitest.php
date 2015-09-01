<?php

include "shipmile_api_php/lib/Shiplmile/Client.php"

$shipmileInstance = new Shipmile\Client('', array('mode' => 'test'));
//Create order:
$shipmile_order= array();
$shipmile_order["pickup_location"] = $this->shipmile_pickup;
//This contains an array of orders to be pushed
$shipmile_order["shipments"] = array();
//structure of each shipment object
//$json='
$json = '{
    //Internal shipment reference
   "reference":"WHOZHIGHHYD001",
    //Options: "Prepaid", "Cod"
   "payment_type":"Prepaid",
   "receiver":{
      "name1":"Karthik",
      "street1":"Add, Gachibowli",
      "pincode":"500032",
      "city":"Hyderabad",
      "state":"Telangana",
      "phone":"7731826094"
   },
   "details":{

        //shipment value in Rupees
      "value":399,

        //shipment weight in gms
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
echo $result;

array_push($shipmile_order["shipments"],$result);
$create_body = array("body" => $shipmile_order);
$shipmileInstance->orders()->create($create_body);

echo $shipmileInstance;
?>

<?php

require_once '../Payone.php';

$defaultParams = [
  "aid" => '23679',//"your_account_id",
  "mid" => '14648',//"your_merchant_id",
  "portalid" => '2024191',
  "key" => hash("md5", "Payone0123456789!"), // the key has to be hashed as md5
  "mode" => "test", // can be "live" for actual transactions
  "api_version" => "3.10",
  "encoding" => "UTF-8"
];

$personalData = [
  "salutation" => "Mr.",
  "firstname" => "Henry",
  "lastname" => "Tudor", // mandatory
  "street" => "Royal Street 1",
  "zip" => "24118",
  "city" => "Kiel",
  "country" => "DE", // mandatory
  "email" => "henry.viii@tudor.gov.uk",
  "birthday" => "19700204",
  "language" => "de"
];

$paymentRequestParams = [
  "clearingtype" => "rec", // classic invoice
  "reference" => 'mytestshop-order-12', // a unique reference, e.g. order number
  "amount" => "10000", // amount in smallest currency unit, i.e. cents
  "currency" => "EUR",
  "request" => "preauthorization" // create order (but no receivable yet)
];

$request = array_merge($defaultParams, $personalData, $paymentRequestParams);

$response = Payone::sendRequest($request);

var_dump($response);
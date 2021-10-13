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

// again, the default values will be needed
$captureRequest = array(
  "request" => "capture",
  "txid" => "582917282",
  "sequencenumber" => "2", // get this from the last received transactionsstatus
  "amount" => "10000", // you can either capture the full amount of the tx, or less
  "currency" => "EUR"
);

$request = array_merge($defaultParams, $captureRequest);
$response = Payone::sendRequest($request);
if ($response["status"] == "APPROVED") {
  // amount is booked, ship the item!
  var_dump('approved');
  var_dump($response);
} else {
  var_dump('smeth went wrong?');
  var_dump($response);
}
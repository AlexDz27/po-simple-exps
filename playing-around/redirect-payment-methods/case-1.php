<?php

require_once '../../Payone.php';

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
  "lastname" => "Tudor",
  "street" => "Royal Street 1",
  "zip" => "24118",
  "city" => "Kiel",
  "country" => "DE",
  "email" => "henry.viii@tudor.gov.uk",
  "birthday" => "19700204",
  "language" => "de"
];

$paymentRequestParams = [
  "clearingtype" => "sb", // sb means online bank transfer
  "reference" => uniqid(),
  "amount" => "10000", // amount in smallest currency unit, i.e. cents
  "currency" => "EUR",
  "request" => "authorization", // create account receivable and instantly book the amount
  "onlinebanktransfertype" => "PNT", // this is the type for Sofort.com
  "bankcountry" => "DE", // we need to know the country of the customer's bank, i.e. of the invoice address
  /**
   * As of July 2016, IBAN and BIC are optional for Sofort transactions as long as we get a bankcountry
   */
  //"iban" => "DE85123456782599100003",
  //"bic" => "TESTTEST",
  "successurl" => "https://yourshop.com/payment/success?reference=your_unique_reference",
  "errorurl" => "https://yourshop.com/payment/error?reference=your_unique_reference",
  "backurl" => "https://yourshop.com/payment/back?reference=your_unique_reference"
];

$request = array_merge($defaultParams, $personalData, $paymentRequestParams);


$response = Payone::sendRequest($request);

var_dump($response);


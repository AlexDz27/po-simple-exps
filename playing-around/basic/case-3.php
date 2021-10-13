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


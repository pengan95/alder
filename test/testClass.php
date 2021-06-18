<?php
error_reporting(E_NOTICE|E_ERROR);
include_once '../vendor/autoload.php';

$client = new \GuzzleHttp\Client();


$res = $client->get('http://api.meikaiinfotech.com/?act=transaction.get_quiry&uid=61fb20f78393c53e7af7675c852dc13f&aff_name=webgains_uk&updatedate=2020-10-23');

echo $res->getBody();


const CLIENT_ID = 'extrabuxtest';
const CLIENT_SECRET = 'obuFvp>BJO#koYb)+!w+l|x5t8}3zU={';

try {
    $apiContext = new \InCommAlder\Common\ApiContext(CLIENT_ID,CLIENT_SECRET,
        [
            'log_path' => '',
            'credential_cache' => dirname(__FILE__) . DIRECTORY_SEPARATOR . "credential.json" //支持缓存api凭证
        ]);
    $apiContext->auth(new \InCommAlder\Common\RestHandler());

//    $orderObj = new \InCommAlder\Api\OrderResponse(['OrderUri' => '18P-3K-8J2']);
//    $orderObj->get($apiContext);
//
//    $cards = $orderObj->cards($apiContext);
//    var_dump($cards);
//    exit;
    $cardObj = new \InCommAlder\Api\Card(['CardUri' => '796BG4WDJR']);

    $cardObj->get($apiContext);

    echo implode(',', array_keys($cardObj->toArray()));
//echo $cardObj->toJson(JSON_PRETTY_PRINT);
//    $cardObj->toJson(JSON_PRETTY_PRINT);
    exit;
    $objProgram = new \InCommAlder\Api\Program();

    $programs = $objProgram->all($apiContext);

    $program = current($programs);

    $json_str = '{
  "PurchaseOrderNumber": "144353",
  "CatalogId": 1,
  "Metadata": "metadatabababb",
  "CustomerOrderId": "TEST202009281134",
  "EmailTheme": "",
  "Recipients": [
    {
      "ShippingMethod": "",
      "LanguageCultureCode": "zh-CN",
      "FirstName": "Hopper",
      "LastName": "Huang",
      "EmailAddress": "hopperhuang@meikaitech.com",
      "Address1": "",
      "Address2": "",
      "City": "",
      "StateProvinceCode": "",
      "PostalCode": "",
      "CountryCode": "",
      "DeliverEmail": false,
      "Products": [
        {
          "Sku": "VUSD-D-V-00",
          "Value": 25,
          "Quantity": 1,
          "EmbossedTextId": 0,
          "Packaging": "",
          "MessageText": "Thanks a lot",
          "MessageRecipientName": "HopperHuang",
          "MessageSenderName": "Extrabux"
        }
      ]
    }
  ]
}';
    $orderRequest = new \InCommAlder\Api\OrderRequest($json_str);


    $orderResponse = $orderRequest->create($program->getId(),$apiContext);

    $orderResponse->get($apiContext);

//    echo $orderResponse->toJson(JSON_PRETTY_PRINT);

    $cards = $orderResponse->cards($apiContext);

    $card = current($cards);

    $card->get($apiContext);

    $card->toJson(JSON_PRETTY_PRINT);
    exit;

    $program_catalogs = $program->catalogs($apiContext);

    $program_catalog = current($program_catalogs);

    $catalog = new \InCommAlder\Api\Catalog(['id' => $program_catalog->getId(),'programId' => $program->getId()]);

    $catalog->get($apiContext);

    foreach ($catalog->getProducts() as $product){
        echo $product->toJson().PHP_EOL;
    }
} catch (\InCommAlder\Exceptions\AlderResponseException $e) {
    echo $e->getCode() . " " . $e->getMessage().PHP_EOL;
} catch (\Exception $e) {
//    var_dump($e);
    echo $e->getCode() . " " . $e->getMessage().PHP_EOL;
}








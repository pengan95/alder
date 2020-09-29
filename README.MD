#REST API CLIENT FOR InComm Alder

* support access token cache
```php
 $apiContext = new \InCommAlder\Common\ApiContext(CLIENT_ID,CLIENT_SECRET,
        [
            'log_path' => '',
            'credential_cache' => dirname(__FILE__) . DIRECTORY_SEPARATOR . "credential.json" //支持缓存api凭证
        ]);
    $apiContext->auth(new \InCommAlder\Common\RestHandler());
```
* support init by Array, Json
```php
    $json_str = '{"PurchaseOrderNumber":"144353","CatalogId":1,"Metadata":"metadatabababb","CustomerOrderId":"TEST202009281134","EmailTheme":"","Recipients":[{"ShippingMethod":"","LanguageCultureCode":"zh-CN","FirstName":"Hopper","LastName":"Huang","EmailAddress":"hopperhuang@meikaitech.com","Address1":"","Address2":"","City":"","StateProvinceCode":"","PostalCode":"","CountryCode":"","DeliverEmail":false,"Products":[{"Sku":"VUSD-D-V-00","Value":25,"Quantity":1,"EmbossedTextId":0,"Packaging":"","MessageText":"Thanks a lot","MessageRecipientName":"HopperHuang","MessageSenderName":"Extrabux"}]}]}';
    $orderRequest = new \InCommAlder\Api\OrderRequest($json_str);

    $arr = [];
    $orderRequest = new \InCommAlder\Api\OrderRequest($arr);
```
###TODO LIST
1. add valid method for OrderRequest
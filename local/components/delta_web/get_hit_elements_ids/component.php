<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
    CModule::IncludeModule("sale");
    $obCache = new CPHPCache;
    $life_time = $arParams['CACHE_TIME'];
    $cache_id = "hit-elements-ids";
    
    $cacheData = $obCache->InitCache($life_time, $cache_id, "/");
    if ($arParams['CACHE_TYPE'] == 'N') {
        $cacheData = false;
    }

    if($cacheData):
        $vars = $obCache->GetVars();
        $res = $vars["HIT_IDS"];
    else:
        $res = array();
        $arIDs = array();
        $arBasketItems = array();
        $arFilter = array(
            "LID" => SITE_ID
        );
        if (empty($arParams["COUNT_PURCHASE"])) {
            $arParams["COUNT_PURCHASE"] = 20;
        }
        $dbBasketItems = CSaleBasket::GetList(
            array(
                "PRODUCT_ID" => "ASC",
            ),
            $arFilter,
            false,
            false,
            array("ID", "CALLBACK_FUNC", "MODULE", "PRODUCT_ID", "QUANTITY", "PRODUCT_PROVIDER_CLASS")
        );
        $parentProductId = 0;
        while ($arItem = $dbBasketItems->Fetch())
        {
            if ('' != $arItem['PRODUCT_PROVIDER_CLASS'] || '' != $arItem["CALLBACK_FUNC"])
            {
                CSaleBasket::UpdatePrice($arItems["ID"],
                    $arItem["CALLBACK_FUNC"],
                    $arItem["MODULE"],
                    $arItem["PRODUCT_ID"],
                    $arItem["QUANTITY"],
                    "N",
                    $arItem["PRODUCT_PROVIDER_CLASS"]
                );
                $parentProduct = CCatalogSKU::GetProductInfo($arItem["PRODUCT_ID"]);
                if (!$parentProduct) {
                    $parentProductId = $arItem["PRODUCT_ID"];
                } else {
                    $parentProductId = $parentProduct["ID"];
                }
                $arIDs[] = $parentProductId;
            }
        }
        $arIDs = array_count_values($arIDs);
        foreach($arIDs as $id => $count) {
            if ($count > $arParams["COUNT_PURCHASE"]) {
                $res[] = $id;
            }
        }
    endif;
    if($obCache->StartDataCache()):
      $obCache->EndDataCache(array("HIT_IDS" => $res));
    endif;
    $arResult["HIT_IDS"] = $res;
    return $arResult["HIT_IDS"];
?>
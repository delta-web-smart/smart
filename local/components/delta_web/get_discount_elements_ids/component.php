<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
    CModule::IncludeModule("iblock");
    global $DB;
    $obCache = new CPHPCache;
    $life_time = $arParams['CACHE_TIME'];
    $cache_id = "discount-elements-ids";
    $cacheData = $obCache->InitCache($life_time, $cache_id, "/");
    if ($arParams['CACHE_TYPE'] == 'N') {
        $cacheData = false;
    }

    if($cacheData):
        $vars = $obCache->GetVars();
        $arDiscountElementID = $vars["DISCOUNT_IDS"];
    else:
        $arDiscountElementID = $arDiscountSectionID = array();
        $dbProductDiscounts = CCatalogDiscount::GetList(
            array("SORT" => "ASC"),
            array(
                "ACTIVE" => "Y",
                "!>ACTIVE_FROM" => $DB->FormatDate(date("Y-m-d H:i:s"),"YYYY-MM-DD HH:MI:SS", CSite::GetDateFormat("FULL")), !$DB->FormatDate(date('Y-m-d H:i:s'), 'YYYY-MM-DD HH:MI:SS',  CSite::GetDateFormat("FULL")),
                "COUPON" => ""
            ),
            false,
            false,
            array(
                "ID", "PRODUCT_ID", "SECTION_ID"
            )
        );
        $parentProductId = 0;
        while ($arProductDiscounts = $dbProductDiscounts->Fetch()) {
            $parentProduct = CCatalogSKU::GetProductInfo($arProductDiscounts["PRODUCT_ID"]);
            if (!$parentProduct) {
                $parentProductId = $arProductDiscounts["PRODUCT_ID"];
            } else {
                $parentProductId = $parentProduct["ID"];
            }
            $arDiscountElementID[] = $parentProductId;
            if($arProductDiscounts["SECTION_ID"] && !in_array($arProductDiscounts["SECTION_ID"], $arDiscountSectionID)) {
                $arDiscountSectionID[] = $arProductDiscounts["SECTION_ID"];
            }
        }
        if ($arDiscountSectionID) {
            $arFilter = Array("SECTION_ID" => $arDiscountSectionID, "IBLOCK_ID" => $arParams["IBLOCK_ID"], "INCLUDE_SUBSECTIONS" => "Y", "ACTIVE_DATE" => "Y", "ACTIVE" => "Y");
            $arSelectFields = Array("IBLOCK_ID", "ID");
            $res = CIBlockElement::GetList(Array(), $arFilter, false, false, false, $arSelectFields );
            while($ob = $res->GetNextElement()) {
                $arFields = $ob->GetFields();
                $arDiscountElementID[] = $arFields["ID"];
            }
        }
    endif;
    if($obCache->StartDataCache()):
      $obCache->EndDataCache(array("DISCOUNT_IDS" => $arDiscountElementID));
    endif;
    $arResult["DISCOUNT_IDS"] = $arDiscountElementID;
    return $arResult["DISCOUNT_IDS"];
?>
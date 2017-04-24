<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();?>
<?
    global $APPLICATION;
    $APPLICATION->SetPageProperty("h1", "<span>РЕЗУЛЬТАТЫ ПОИСКА:</span> ".$arResult["REQUEST"]["QUERY"]);
    $APPLICATION->SetPageProperty("title", "РЕЗУЛЬТАТЫ ПОИСКА: ".$arResult["REQUEST"]["QUERY"]);
    
    $arResult["ITEM_IDS"] = array();
    foreach($arResult["SEARCH"] as $arSearch) {
        $parent = CCatalogSKU::GetProductInfo($arSearch["ITEM_ID"]);
        if (!$parent) {
            $arResult["ITEM_IDS"][] = $arSearch["ITEM_ID"];
        } else {
            $arResult["ITEM_IDS"][] = $parent["ID"];
        }
    }
?>
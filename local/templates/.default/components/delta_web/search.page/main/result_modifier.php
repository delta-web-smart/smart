<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();?>
<?
    //для SEO
    global $APPLICATION;
    $APPLICATION->SetPageProperty("h1", "<span>РЕЗУЛЬТАТЫ ПОИСКА:</span> ".$arResult["REQUEST"]["QUERY"]);
    $APPLICATION->SetPageProperty("title", "РЕЗУЛЬТАТЫ ПОИСКА: ".$arResult["REQUEST"]["QUERY"]);
    
    $parent = CCatalogSKU::GetProductInfo($arResult["SEARCH"][0]["ITEM_ID"]);
    if (!$parent) {
        $elId = $arResult["SEARCH"][0]["ITEM_ID"];
    } else {
        $elId = $parent["ID"];
    }
    $db_old_groups = CIBlockElement::GetElementGroups($elId, false);
    $ar_group = $db_old_groups->Fetch();
    $nav = CIBlockSection::GetNavChain(false, $ar_group["ID"]);
    while($arGroup = $nav->GetNext()) {
        $APPLICATION->AddChainItem($arGroup["NAME"], $arGroup["SECTION_PAGE_URL"]);
    }
    $APPLICATION->AddChainItem(GetMessage("RESULT_OF_SEARCH_TITLE"));
    
    
    
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
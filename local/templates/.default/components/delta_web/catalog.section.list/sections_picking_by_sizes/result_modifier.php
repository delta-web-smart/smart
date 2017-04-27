<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<?
    $sefRules = GetSefRules();
    $arResult["ACTIVE_SECTION"] = array();
    foreach($arResult["SECTIONS"] as $i=>$arSection) {
        $arSection["SHOW_PROPERTIES"] = array_merge($arSection["UF_PROPERTY_CATALOG"], $arSection["UF_PROPERTY_OFFER"]);
        if ($sefRules["SECTION_CODE"] == $arSection["CODE"]) {
            $arResult["ACTIVE_SECTION"] = $arSection;
        }
        $arResult["SECTIONS"][$i] = $arSection;
    }
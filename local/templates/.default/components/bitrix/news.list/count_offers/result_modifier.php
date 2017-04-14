<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<? 
    if (!empty($arResult["ITEMS"])) {
        $arResult["COUNT_OFFERS"] = FormatNumber(count($arResult["ITEMS"]));
    }
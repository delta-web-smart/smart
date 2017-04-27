<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<?
    if (!empty($arParams["SHOW_PROPERTIES"])) {
        $properties = $arParams["SHOW_PROPERTIES"];
    }
    $newItems = array();
    foreach($arResult["ITEMS"] as $i=>$arItem) {
        if(
            empty($arItem["VALUES"])
            || isset($arItem["PRICE"])
        )
            continue;

        if (
            $arItem["DISPLAY_TYPE"] == "A"
            && (
                $arItem["VALUES"]["MAX"]["VALUE"] - $arItem["VALUES"]["MIN"]["VALUE"] <= 0
            )
        )
            continue;
        if (in_array($arItem["ID"], $properties)) {
            $newItems[] = $arItem;
        }
    }
    $arResult["ITEMS"] = $newItems;
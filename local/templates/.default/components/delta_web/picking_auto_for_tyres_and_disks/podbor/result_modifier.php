<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<?
    global $APPLICATION;
    $arResult["MAIN_TITLE"] = $arResult["VALUES"]["VENDOR"]. " " .$arResult["VALUES"]["CAR"]. " " .$arResult["VALUES"]["YEAR"]. " " .$arResult["VALUES"]["MODIFICATION"];
    $APPLICATION->SetPageProperty("h1", "<span>Подбор по автомобилю:</span> ".$arResult["MAIN_TITLE"]);
    $APPLICATION->SetPageProperty("title", "Подбор по автомобилю: ".$arResult["MAIN_TITLE"]);
    
    $arResult["MULTIPLY_PROPERTIES"] = array();
    $pickingAutoForTyresAndDisks = new PickingAutoForTyresAndDisks($arParams);
    foreach($pickingAutoForTyresAndDisks->multiplyProperties as $multiplyProperty) {
        if (!empty($arResult["DATA"]["PROPERTIES"][$multiplyProperty]["VALUE"])) {
            $arResult["MULTIPLY_PROPERTIES"][$multiplyProperty] = $pickingAutoForTyresAndDisks->SetMultiplyProperty($arResult["DATA"]["PROPERTIES"][$multiplyProperty]["VALUE"], $arParams["SEF_RULE"]);
        }
    }
    $arResult["MULTIPLY_PROPERTIES"] = array_chunk($arResult["MULTIPLY_PROPERTIES"], 2, true);
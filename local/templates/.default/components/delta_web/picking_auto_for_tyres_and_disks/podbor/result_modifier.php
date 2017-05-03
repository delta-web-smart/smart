<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<?
    global $APPLICATION;
    $values = $arResult["VALUES"]["VENDOR"]. " " .$arResult["VALUES"]["CAR"]. " " .$arResult["VALUES"]["YEAR"]. " " .$arResult["VALUES"]["MODIFICATION"];
    $APPLICATION->SetPageProperty("h1", "<span>Подбор по автомобилю:</span> ".$values);
    $APPLICATION->SetPageProperty("title", "Подбор по автомобилю: ".$values);
    
    $arResult["MULTIPLY_PROPERTIES"] = array();
    $pickingAutoForTyresAndDisks = new PickingAutoForTyresAndDisks;
    foreach($pickingAutoForTyresAndDisks->multiplyProperties as $multiplyProperty) {
        if (!empty($arResult["DATA"]["PROPERTIES"][$multiplyProperty]["VALUE"])) {
            $arResult["MULTIPLY_PROPERTIES"][$multiplyProperty] = $pickingAutoForTyresAndDisks->SetMultiplyProperty($arResult["DATA"]["PROPERTIES"][$multiplyProperty]["VALUE"], $arParams["SEF_RULE"]);
        }
    }
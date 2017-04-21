<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<?
    if (!empty($arResult["SHOW_PROPERTIES"])) {
        $isAllWeather = false;
        foreach($arResult["SHOW_PROPERTIES"] as $i=>$arShowProperty) {
            if ($arShowProperty["CODE"] == "SEZON") {
                if ($arShowProperty["VALUE_ENUM_ID"] == 32) {
                    $isAllWeather = true;
                } else {
                    $isAllWeather = false;
                }
                $arShowProperty["CUSTOM_ALL_WEATHER"] = $isAllWeather;
                $arShowProperty["IS_SEZON"] = true;
            }
            $arResult["SHOW_PROPERTIES"][$i] = $arShowProperty;
        }
    }
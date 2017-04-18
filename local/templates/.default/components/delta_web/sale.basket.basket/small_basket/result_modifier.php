<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();?>
<?php
    $arResult['NUM_PRODUCTS'] = 0;
    foreach ($arResult["GRID"]["ROWS"] as $k => $arItem) {
        if ($arItem["DELAY"] == "N" && $arItem["CAN_BUY"] == "Y") {
            $arResult['NUM_PRODUCTS'] += $arItem["QUANTITY"];
        }
    }
    // $format = CCurrencyLang::GetCurrencyFormat(CSaleLang::GetLangCurrency(SITE_ID));
    // $formatString = str_replace("#", "", $format["FORMAT_STRING"]);
    // $arResult['CUSTOM_TOTAL_PRICE'] = trim(str_replace($formatString, "", $arResult['TOTAL_PRICE']));
    $arResult['CUSTOM_TOTAL_PRICE'] = FormatNumber($arResult["allSum"]);
    
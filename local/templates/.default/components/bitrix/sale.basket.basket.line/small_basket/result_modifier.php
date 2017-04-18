<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();?>
<?php
    // $currentBasket = GetCurrentBasket();
    // $arResult['NUM_PRODUCTS'] = 0;
    // foreach ($currentBasket as $arItem) {
        // $arResult['NUM_PRODUCTS'] += $arItem["QUANTITY"];
    // }
    if (empty($_SESSION["TOTAL_QUANTITY_PRODUCTS"][SITE_ID][$USER->GetID()])) {
        $arResult['NUM_PRODUCTS'] = 0;
    } else {
        $arResult['NUM_PRODUCTS'] = $_SESSION["TOTAL_QUANTITY_PRODUCTS"][SITE_ID][$USER->GetID()];
    }
    $format = CCurrencyLang::GetCurrencyFormat(CSaleLang::GetLangCurrency(SITE_ID));
    $formatString = str_replace("#", "", $format["FORMAT_STRING"]);
    $arResult['CUSTOM_TOTAL_PRICE'] = trim(str_replace($formatString, "", $arResult['TOTAL_PRICE']));
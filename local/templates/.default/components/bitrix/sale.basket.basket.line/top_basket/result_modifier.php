<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();?>
<?php
    $format = CCurrencyLang::GetCurrencyFormat(CSaleLang::GetLangCurrency(SITE_ID));
    $formatString = str_replace("#", "", $format["FORMAT_STRING"]);
    $arResult['CUSTOM_TOTAL_PRICE'] = trim(str_replace($formatString, "", $arResult['TOTAL_PRICE']));
    
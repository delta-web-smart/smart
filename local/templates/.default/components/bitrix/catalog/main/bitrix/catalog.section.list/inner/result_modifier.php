<?
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();

foreach($arResult["SECTIONS"] as $i=>$arSection) {
    $arResult['SECTIONS'][$i]["PICTURE"] = CFile::ResizeImageGet($arSection["UF_IMAGE_CATALOG"], array('width'=>105, 'height'=>40), BX_RESIZE_IMAGE_EXACT, true);
}

?>
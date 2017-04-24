<?
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();

foreach($arResult["SECTIONS"] as $i=>$arSection) {
    if ($arSection["DEPTH_LEVEL"] == 1) {
        $arResult['SECTIONS'][$i]["PICTURE"] = CFile::ResizeImageGet($arSection["PICTURE"], array('width'=>65, 'height'=>65), BX_RESIZE_IMAGE_PROPORTIONAL, true);
    }
}

?>
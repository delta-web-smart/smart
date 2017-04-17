<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<?
    foreach($arResult["SECTIONS"] as $i=>$arSection) { 
        if ($arSection["DEPTH_LEVEL"] == 1 && !empty($arSection["UF_FILE_MENU_1"])) {
            $arResult['SECTIONS'][$i]["IMAGE_1"] = CFile::ResizeImageGet($arSection["UF_FILE_MENU_1"], array('width'=>75, 'height'=>60), BX_RESIZE_IMAGE_PROPORTIONAL, true);
        }
        if ($arSection["DEPTH_LEVEL"] == 1 && !empty($arSection["UF_FILE_MENU_2"])) {
            $arResult['SECTIONS'][$i]["IMAGE_2"] = CFile::ResizeImageGet($arSection["UF_FILE_MENU_2"], array('width'=>85, 'height'=>45), BX_RESIZE_IMAGE_PROPORTIONAL, true);
        }
    }
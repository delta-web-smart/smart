<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<?
	foreach($arResult['ITEMS'] as $i=>$arItem) {
		$arResult['ITEMS'][$i]["PICTURE"] = CFile::ResizeImageGet($arItem["PREVIEW_PICTURE"]["ID"], array('width'=>75, 'height'=>100), BX_RESIZE_IMAGE_PROPORTIONAL, true);
        $arResult['ITEMS'][$i]["DATE"] = ToLower(FormatDate("d F Y", strtotime($arItem["DATE_CREATE"])));
	}
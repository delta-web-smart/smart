<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<?
	foreach($arResult['ITEMS'] as $i=>$arItem) {
		$arResult['ITEMS'][$i]["PICTURE"] = CFile::ResizeImageGet($arItem["PREVIEW_PICTURE"]["ID"], array('width'=>700, 'height'=>300), BX_RESIZE_IMAGE_PROPORTIONAL, true);
	}
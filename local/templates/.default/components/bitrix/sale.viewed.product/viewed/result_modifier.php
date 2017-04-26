<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<?
$arResult["PRODUCT_IDS"] = array(); 
foreach($arResult as $key => $val)
{
	$arResult["PRODUCT_IDS"][] = $val["PRODUCT_ID"];
}
?>
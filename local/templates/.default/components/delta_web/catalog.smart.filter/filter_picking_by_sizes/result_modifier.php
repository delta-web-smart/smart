<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<?
    foreach($arResult["ITEMS"] as $i=>$arItem) {
        foreach($arItem["VALUES"] as $j=>$ar) {
            $propEnum = CIBlockPropertyEnum::GetList(Array(), Array("IBLOCK_ID"=>$arItem["IBLOCK_ID"], "CODE"=>$arItem["CODE"], "XML_ID" => $ar["URL_ID"]))->Fetch();
            $arItem["VALUES"][$j]["PROP_ENUM"] = $propEnum;
        }
        $arResult["ITEMS"][$i] = $arItem;
    }
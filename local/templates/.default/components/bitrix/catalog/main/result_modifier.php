<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<? 
    $parentSection = SaveCacheForParentAndChildSections($arParams["IBLOCK_ID"], $arResult["VARIABLES"]["SECTION_CODE"], $arResult["VARIABLES"]["SECTION_ID"]);
    $arResult["SECTIONS"] = $parentSection;
    $this->__component->SetResultCacheKeys(array("SECTIONS"));
?>
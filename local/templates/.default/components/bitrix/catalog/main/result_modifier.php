<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<? 
    $mainDescription = GetDescriptionForSection($arParams["IBLOCK_ID"], $arResult["VARIABLES"]["SECTION_CODE"], $arResult["VARIABLES"]["SECTION_ID"]);
    $arResult["MAIN_DESCRIPTION_FOR_SECTION"] = $mainDescription;
    $this->__component->SetResultCacheKeys(array("MAIN_DESCRIPTION_FOR_SECTION"));
?>
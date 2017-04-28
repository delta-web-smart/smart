<?
if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();
if (!empty($arResult["ITEMS"])) {
    foreach($arResult["ITEMS"] as $arItem) {
        $arResult["PRODUCT_IDS"] = $arItem["ID"];
    }
    $this->__component->SetResultCacheKeys(array("ITEMS"));
}
?>
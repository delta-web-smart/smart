<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
/** @var array $arParams */
/** @var array $arResult */
/** @global CMain $APPLICATION */
/** @global CUser $USER */
/** @global CDatabase $DB */
/** @var CBitrixComponentTemplate $this */
/** @var string $templateName */
/** @var string $templateFile */
/** @var string $templateFolder */
/** @var string $componentPath */
/** @var CBitrixComponent $component */
$this->setFrameMode(true);
?>
<? if (!empty($arResult)):?>
    <?
        $APPLICATION->IncludeComponent("delta_web:templates_catalog_for_detail_product", "template_1", array(
            "RESULT" => $arResult,
            "ID" => $arResult["ID"],
            "OFFER_ID" => $_REQUEST["OFFER_ID"],
            "CACHE_TYPE" => $arParams["CACHE_TYPE"],
            "CACHE_TIME" => $arParams["CACHE_TIME"],
            "PROPERTY_FOR_GROUP_OFFERS" => "DIAMETR",
            "MASK_FOR_FULL_TEXT_SIZE_IN_TABLE" => "#SHIRINA#/#VYSOTA# R#DIAMETR#",
            "SECTION_ID" => $arResult["IBLOCK_SECTION_ID"],
            "SHOW_PROPERTIES" => array(
                "CML2_MANUFACTURER",
                "SEZON",
                "TIP_AVTO"
            )
        ));
    ?>
<? endif;?>
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
        $APPLICATION->IncludeFile(SITE_DIR."include/catalog/detail/template_for_tyres.php", array(
            "arResult" => $arResult,
            "FULL_TEXT_SIZE" => array(
                "SHIRINA",
                "VYSOTA",
                "DIAMETR"
            ),
        ));
    ?>
<? endif;?>
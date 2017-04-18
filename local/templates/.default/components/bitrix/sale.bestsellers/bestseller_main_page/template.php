<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
/** @var CBitrixComponentTemplate $this */
/** @var array $arParams */
/** @var array $arResult */
/** @global CDatabase $DB */

$this->setFrameMode(true);?>
<? if (!empty($arResult['ITEMS'])): ?>
    <ul class="catalog tabs hit">
        <?
            $APPLICATION->IncludeFile(SITE_DIR."include/catalog/products_list_main_page.php", array(
                "arResult" => $arResult,
                "LABEL_FOR_SALE" => "hit"
            ));
        ?>
    </ul>
<? endif;?>
<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
$this->setFrameMode(true);
?>
<? if (!empty($arResult['ITEMS'])):?>
    <ul class="catalog tabs <?=$arParams["LABEL_FOR_SALE"]?>">
        <?
            $APPLICATION->IncludeFile(SITE_DIR."include/catalog/products_list_main_page.php", array(
                "arResult" => $arResult, 
                "LABEL_FOR_SALE" => $arParams["LABEL_FOR_SALE"]
            ));
        ?>
    </ul>
<? endif;?>
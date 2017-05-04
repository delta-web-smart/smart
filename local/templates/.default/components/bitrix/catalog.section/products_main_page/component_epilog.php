<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<?
    use \Bitrix\Main\Localization\Loc; 
    Loc::loadLanguageFile(__FILE__);
    if (count($arResult["ITEMS"]) > 0): 
        ob_start();
        ?>  
            <li class="<?=$arParams["LABEL_FOR_SALE"]?> <? if($arParams["LABEL_FOR_SALE"] == "new"):?>active<?endif;?>">
                <a href="#"><?=GetMessage(ToUpper($arParams["LABEL_FOR_SALE"])."_TABS_PRODUCTS_TITLE")?></a>
            </li>
        <?  
        $html = ob_get_contents();
        ob_end_clean();
        $APPLICATION->AddViewContent($arParams["LABEL_FOR_SALE"]."_tabs_products", $html);
    endif;
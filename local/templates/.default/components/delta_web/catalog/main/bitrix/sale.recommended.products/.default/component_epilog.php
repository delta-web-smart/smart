<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();?>
<? 
    use \Bitrix\Main\Localization\Loc; 
    Loc::loadLanguageFile(__FILE__); 
    
    global $APPLICATION;
    if (count($arResult["ITEMS"]) > 0):
?>
    <? 
        ob_start();
    ?>
        <li>
            <a href="#"><span><?=Loc::getMessage("TAB_FOR_RECOMMNDED_PRODUCTS_TITLE")?></span></a>
        </li>
    <?
    $html = ob_get_contents();
    ob_end_clean();
    $APPLICATION->AddViewContent('TAB_FOR_RECOMMNDED_PRODUCTS', $html);
    ?>
<? endif;?>
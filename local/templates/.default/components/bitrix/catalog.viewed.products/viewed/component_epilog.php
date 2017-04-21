<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<?
    global $APPLICATION;
    if (count($arResult["ITEMS"]) > 0): 
        ob_start();
        ?>  
            <li class="viewed">
                <a href="#"><?=GetMessage("VIEWED_TABS_PRODUCTS_TITLE");?></a>
            </li>
        <?  
        $html = ob_get_contents();
        ob_end_clean();
    $APPLICATION->AddViewContent("viewed_tabs_products", $html);
    endif;